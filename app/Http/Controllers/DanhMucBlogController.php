<?php

namespace App\Http\Controllers;

use App\DanhMucBlog;
use Illuminate\Http\Request;

class DanhMucBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhSachDanhMuc = DanhMucBlog::All()->where('daXoa',0);
        return view('Administrator.Templates.Quanlyblog.Danhsachdanhmuc',compact('danhSachDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Administrator.Templates.Quanlyblog.themdanhmucblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DanhMucBlog  $danhMucBlog
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $danhMucBlog = new DanhMucBlog;
        $danhMucBlog->tendanhmuc = $request->tendanhmuc;
        $danhMucBlog->save();
        return redirect('danhmucblog')->with('Success','Thêm thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DanhMucBlog  $danhMucBlog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhMucBlog = DanhMucBlog::find($id)->toArray();
        return view('Administrator.Templates.Quanlyblog.suadanhmucblog',compact('danhMucBlog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DanhMucBlog  $danhMucBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $danhMucBlog = DanhMucBlog::find($id);
        $danhMucBlog->tendanhmuc = $request->tendanhmuc;
        $danhMucBlog->save();
        return redirect('danhmucblog')->with('thongBao','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DanhMucBlog  $danhMucBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhMucBlog = DanhMucBlog::find($id);
        $danhMucBlog->daXoa = 1;
        $danhMucBlog->save();
        return redirect('danhmucblog')->with('thongBao','Xóa thành công!');
    }
}
