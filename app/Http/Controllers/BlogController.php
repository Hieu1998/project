<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\DanhMucBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phanTrang = isset($request->phanTrang)?$request->phanTrang:5;
        $tenTruongSapXep = isset($request->tenTruongSapXep)?$request->tenTruongSapXep:0;
        $kieuSapXep = isset($request->kieuSapXep)?$request->kieuSapXep:0;
        $timKiem = isset($request->timKiem)?$request->timKiem:'';
        $arrayTen =(['0'=> 'title','1'=> 'content']);
        $arrayKieu =(['0'=> 'asc','1'=>'desc']);
        $danhSach = BlogModel::orderBY($arrayTen[$tenTruongSapXep],$arrayKieu[$kieuSapXep]);
        if($timKiem != ''){
            $danhSach = $danhSach->Where('title', 'like','%'. $timKiem.'%');
        }
        $danhSach = $danhSach->join('danhmucblog','idDanhMuc','=','danhmucblog.id')
                            ->where('blogs.daXoa',0)
                            ->paginate($phanTrang);
        $danhSachDanhMuc = DanhMucBlog::get();
        return view('Administrator.Templates.Quanlyblog.index',compact('danhSach','danhSachDanhMuc','phanTrang','timKiem','tenTruongSapXep','kieuSapXep'));
    }
    public function ViewBlog()
    {
        $trending = BlogModel::where('is_feature',1)->where('is_publish',1) 
                                ->join('danhmucblog','idDanhMuc','=','danhmucblog.id')
                                ->get();
        $danhMucBlog = DanhMucBlog::All();
        $allBaiViet[] = '';
        $baiVietPhoBien = BlogModel::orderBy('view_count','DESC')->paginate(5);
        $baiViet = BlogModel::where('is_feature',1)->where('is_publish',1)
                            ->join('danhmucblog','idDanhMuc','=','danhmucblog.id')
                            ->select('blogs.id as id',
                                    'blogs.title as title',
                                    'blogs.content as content',
                                    'blogs.link_image as link_image',
                                    'blogs.idDanhMuc as idDanhMuc',
                                    'danhmucblog.tendanhmuc as tendanhmuc'
                                    )
                            ->get();
        for($i = 0;$i < count($baiViet);$i++){
            $allBaiViet[$i] = BlogModel::where('idDanhMuc',$i)->get();
        }
        return view('Customer.Templates.blog',compact('trending','baiViet','danhMucBlog','allBaiViet','baiVietPhoBien'));
    }
    public function ViewChiTietBlog($id)
    {
        $view_count = BlogModel::find($id);
        $view_count->view_count = $view_count->view_count + 1;
        $view_count->save();

        $chiTietBlog = BlogModel::find($id)->toArray();
        $idDanhMuc = $chiTietBlog['idDanhMuc'];
        $tenDanhMuc = DanhMucBlog::find($idDanhMuc)->toArray();
        return view('Customer.Templates.chitietblog',compact('chiTietBlog','tenDanhMuc'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhSachDanhMuc = DanhMucBlog::get();
        return view('Administrator.Templates.Quanlyblog.AddBlog',compact('danhSachDanhMuc'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new BlogModel;
        $image = $request->link_image;
        $image->move('images',$image->getClientOriginalName());
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->idDanhMuc = $request->idDanhMuc;
        $blog->is_publish = $request->is_publish;
        $blog->is_feature = $request->is_feature;
        $blog->link_image = $image->getClientOriginalName();
        $blog->save();
        return redirect('quanlyblog')->with('thongBao','Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function show(BlogModel $blogModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $danhSach = BlogModel::find($id)->toArray();
        $danhSachDanhMuc = DanhMucBlog::get();
        return view('Administrator.Templates.Quanlyblog.Suablog',compact('danhSach','danhSachDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $blog = BlogModel::find($id);
        $image = $request->link_image;
        if(isset($request->link_image)){
            $image->move('images',$image->getClientOriginalName());
            $blog->link_image = $image->getClientOriginalName();
        }
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->idDanhMuc = $request->idDanhMuc;
        $blog->is_publish = $request->is_publish;
        $blog->is_feature = $request->is_feature;
        $blog->save();
        return redirect('quanlyblog')->with('thongBao','Sửa Thành Công'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogModel  $blogModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = BlogModel::find($id);
        $blog->daXoa = 1 ;   
        $blog->save();
        return redirect('quanlylienhe')->with('thongBao','Xóa Thành Công');
    }
}
