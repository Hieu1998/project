<?php

namespace App\Http\Controllers;

use App\MenuModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhSachMenu = MenuModel::GetMenuByChaId(0,1,0);
        $danhSach = MenuModel::GetMenuByChaId(1,1,0);
        return view('administrator.templates.quanlymenu.index', compact('danhSach','danhSachMenu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu = new MenuModel;
        $menu->chaId = $request->chaId;
        $menu->ten = $request->ten;
        $menu->url = $request->url;
        $menu->save();
        $danhSach = MenuModel::GetMenuByChaId(0,1,0);
        return redirect('quanlymenu')->with('Success','Thêm thành công!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuModel  $menuModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuModel  $menuModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getMenu = MenuModel::All();
        $danhSach = MenuModel::GetMenuByChaId(0,1,$id);
        $getMenuGroup = MenuModel::find($id)->toArray(); //tìm id và đưa tất cả ra 1 mảng
        return view('administrator.templates.quanlymenu.edit',compact('getMenuGroup','danhSach','getMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuModel  $menuModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuModel $menuModel)
    {
        $allRequest =  $request->all();
        $id = $allRequest['id'];
        $chaId = $allRequest['chaId'];
        $ten = $allRequest['ten'];
        $url = $allRequest['url'];
        
        $Menu = MenuModel::find($id);
        $Menu->chaId = $chaId;
        $Menu->ten =  $ten;
        $Menu->url =  $url;   
        $Menu->save(); 
        //tra ve trang edit
        return redirect()->action('MenuController@edit', compact('id'))->with('Success','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuModel  $menuModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = MenuModel::find($id);
        $menu->daXoa = 1;
        $menu->save();
        $danhSach = MenuModel::GetMenuByChaId(0,1,0);
        return redirect('quanlymenu')->with('Success','Xóa thành công!');
    }
}
