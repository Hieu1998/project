<?php
namespace App\Http\Controllers;
use App\ImageModel;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhSach = ImageModel::All()->where('daXoa',0);
        return view('Administrator.Templates.Quanlyhinhanh.index',compact('danhSach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Administrator.Templates.Quanlyhinhanh.addImage');
    }
    public function upLoad(Request $request)
    {
        $image = new ImageModel;
        $file = $request->Image;
        $file->move('images',$file->getClientOriginalName());
        $image->link = $file->getClientOriginalName();
        $image->save();
        return redirect('quanlyhinhanh')->with('thongBao','Thêm Thành Công');
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
     * @param  \App\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function show(ImageModel $imageModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhSach = ImageModel::find(1)->get();
        return view('Administrator.Templates.Quanlyhinhanh.editImage',compact('danhSach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageModel $imageModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageModel  $imageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = ImageModel::find($id);
        $image->daXoa = 1 ;   
        $image->save();
        return redirect('quanlyhinhanh')->with('thongBao','Xóa Thành Công');
    }
}
