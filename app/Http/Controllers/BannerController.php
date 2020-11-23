<?php

namespace App\Http\Controllers;

use App\BannerModel;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phanTrang = isset($request->phanTrang)?$request->phanTrang:5;
        $danhSach = BannerModel::where('daXoa',0);
        $danhSach = $danhSach->paginate($phanTrang);
        return view('Administrator.Templates.quanlybanner.index',compact('danhSach','phanTrang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrator.Templates.quanlybanner.addbanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new BannerModel;
        $file = $request->Image;
        $file->move('images',$file->getClientOriginalName());
        $banner->link_image = $file->getClientOriginalName();
        $banner->save();
        return redirect('quanlybanner')->with('thongBao','Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function show(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerModel $bannerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BannerModel $bannerModel)
    {
        //
    }
    public function ActiveBanner($id)
    {
        $banner = BannerModel::find($id);
        if($banner->is_set == 1){
            $banner->is_set = 0 ;   
            $banner->save();
            return redirect('quanlybanner')->with('thongBao','Hủy Thành Công');
        }else{
            $banner->is_set = 1 ;   
            $banner->save();
            return redirect('quanlybanner')->with('thongBao','Kích Hoạt Thành Công');
        }

      
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BannerModel  $bannerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = BannerModel::find($id);
        $banner->daXoa = 1 ;   
        $banner->save();
        return redirect('quanlybanner')->with('thongBao','Xóa Thành Công');
    }
}
