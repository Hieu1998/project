<?php

namespace App\Http\Controllers;

use App\TripModel;
use App\TripsAndProductModel;
use App\CounterModel;
use App\ProductModel;
use App\ImagesProductModel;
use App\CustomerReviewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phanTrang = isset($request->phanTrang)?$request->phanTrang:50;
        $tenTruongSapXep = isset($request->tenTruongSapXep)?$request->tenTruongSapXep:0;
        $kieuSapXep = isset($request->kieuSapXep)?$request->kieuSapXep:0;
        $timKiem = isset($request->timKiem)?$request->timKiem:'';
        $arrayTen =(['0'=> 'products.name','1'=> 'products.quantityperson']);
        $arrayKieu =(['0'=> 'asc','1'=>'desc']);
        $trips = TripModel::All()->where('daXoa',0);
        //default
        $danhSach = TripsAndProductModel::join('products', 'idproduct', '=', 'products.id')
        ->join('trips','idtrip','=','trips.id')
        ->join('images_product','products.id','=','images_product.idproduct')
        ->select(
            'images_product.link as linkImage',
            'trips.name as nameTrip',    
            'products.id as idProduct',
            'products.name as nameProduct',
            'products.price as priceProduct',
            'products.description as descriptionProduct',
            'products.view_count as viewCount',
            'products.quantityperson as quantityPersonProduct',
            'products.ngaybatdau as ngayBatDau',
            'products.ngayketthuc as ngayKetThuc'
        )
        ->orderBY($arrayTen[$tenTruongSapXep],$arrayKieu[$kieuSapXep]);
        //search
        if($timKiem != ''){
            $danhSach = $danhSach->Where('products.name', 'like','%'. $timKiem.'%');
        }
        $danhSach = $danhSach->where('products.daXoa',0)
        ->paginate($phanTrang);
        return view('administrator.templates.quanlysanpham.index', compact('danhSach','trips','phanTrang','timKiem','tenTruongSapXep','kieuSapXep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $is_feature = isset($request->is_feature)?$request->is_feature:0;
        //them product
        $product = new ProductModel;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantityperson = $request->quantityPerson;
        $product->ngaybatdau = $request->ngayBatDau;
        $product->ngayketthuc = $request->ngayKetThuc;
        $product->is_feature = $is_feature;
        $product->save();
        //them product and trips
        $tripsAndProduct = new TripsAndProductModel;
        $tripsAndProduct->idTrip = $request->idTrip;
        $tripsAndProduct->idproduct = $product->id;
        $tripsAndProduct->save();
        //them product and images
        $imagesAndProduct = new ImagesProductModel;
        $file = $request->Image;
        $file->move('images',$file->getClientOriginalName());
        $imagesAndProduct->link = $file->getClientOriginalName();
        $imagesAndProduct->idproduct = $product->id;
        $imagesAndProduct->save();
        //return view index
        $trips = TripModel::All()->where('daXoa',0);
        $danhsach = ProductModel::All()->where('daXoa',0);
        return redirect()->route('quanlysanpham',compact('danhsach','trips'))->with('Success','Thêm thành công!');
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
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProductModel $productModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tripsAndProduct = TripsAndProductModel::All()->where('idproduct',$id);
        $trips = TripModel::All()->where('daXoa',0);
        $getProductEdit = TripsAndProductModel::join('products', 'idproduct', '=', 'products.id')
        ->join('trips','idtrip','=','trips.id')
        ->join('images_product','products.id','=','images_product.idproduct')
        ->select(
            'images_product.link as linkImage',
            'trips.name as nameTrip',    
            'products.id as idProduct',
            'products.name as nameProduct',
            'products.price as priceProduct',
            'products.description as descriptionProduct',
            'products.view_count as viewCount',
            'products.quantityperson as quantityPersonProduct',
            'products.ngaybatdau as ngayBatDau',
            'products.ngayketthuc as ngayKetThuc'
        )
        ->where('products.id',$id)
        ->get();
        return view('Administrator.Templates.quanlysanpham.edit',compact('getProductEdit','trips','tripsAndProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductModel $productModel)
    {
        //edit table product
        $editProduct = ProductModel::find($request->id);
        $editProduct->name = $request->name;
        $editProduct->price = $request->price;
        $editProduct->description = $request->description;
        $editProduct->quantityperson = $request->quantityPerson;
        $editProduct->ngaybatdau = $request->ngayBatDau;
        $editProduct->ngayketthuc = $request->ngayKetThuc;
        $editProduct->save();
        //edit table trips_product
        $tripsAndProduct = TripsAndProductModel::All()->where('idproduct',$request->id);
        foreach ($tripsAndProduct as $value) {
            $idTripsAndProduct = $value->id;
            $editTripsAndProduct = TripsAndProductModel::find($idTripsAndProduct);
            $editTripsAndProduct->idtrip = $request->idTrip;
            $editTripsAndProduct->idproduct = $request->id;
            $editTripsAndProduct->save();
        }
        //edit table images_product
        $imagesAndProduct = ImagesProductModel::All()->where('idProduct',$request->id);
        if($request->Image == ''){
            foreach ($imagesAndProduct as $key => $value) {
            $idImagesAndProduct = $value->id;
            $imagesAndProducts = ImagesProductModel::find($idImagesAndProduct);
            $imagesAndProducts->link = $value->link;
            $imagesAndProducts->save();
            }
        }else{
            foreach ($imagesAndProduct as $key => $value) {
            $idImagesAndProduct = $value->id;
            $imagesAndProducts = ImagesProductModel::find($idImagesAndProduct);
            $file = $request->Image;
            $file->move('images',$file->getClientOriginalName());
            $imagesAndProducts->link = $file->getClientOriginalName();
            $imagesAndProducts->save();
            }
        }
        //return ve index
        $trips = TripModel::All()->where('daXoa',0);
        $danhsach = ProductModel::All()->where('daXoa',0);
        return redirect()->route('quanlysanpham',compact('danhsach','trips','imagesAndProduct'))->with('Success','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductModel  $productModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //bang product
        $product = ProductModel::find($id);
        $product->daXoa = 1;
        $product->save();
        //bang trip and product
        $tripsAndProduct = TripsAndProductModel::All()->where('idproduct',$id);
        foreach ($tripsAndProduct as $value) {
            $idTripsAndProduct = $value->id;
            $SaveTripsAndProduct = TripsAndProductModel::find($idTripsAndProduct);
            $SaveTripsAndProduct->daXoa = 1;
            $SaveTripsAndProduct->save();
        }
        $imagesAndProduct = ImagesProductModel::All()->where('idproduct',$id);
        foreach ($imagesAndProduct as $value) {
            $idImagesAndProduct = $value->id;
            $SaveImagesAndProduct = ImagesProductModel::find($idImagesAndProduct);
            $SaveImagesAndProduct->daXoa = 1;
            $SaveImagesAndProduct->save();
        }
        //return ve index
        $trips = TripModel::All()->where('daXoa',0);
        $danhsach = ProductModel::All()->where('daXoa',0);
        return redirect()->route('quanlysanpham',compact('danhsach','trips'))->with('Success','Xóa thành công!');
    }

    public function ViewDetail($id){
        $danhSach = TripsAndProductModel::join('products', 'idproduct', '=', 'products.id')
        ->join('trips','idtrip','=','trips.id')
        ->join('images_product','products.id','=','images_product.idproduct')
        ->select(
            'images_product.link as linkImage',
            'trips.name as nameTrip',    
            'trips.songay as soNgay',    
            'trips.sodem as soDem',    
            'trips.id as idTrip',    
            'products.id as idProduct',
            'products.name as nameProduct',
            'products.price as priceProduct',
            'products.description as descriptionProduct',
            'products.view_count as viewCount',
            'products.quantityperson as quantityPersonProduct',
            'products.ngaybatdau as ngayBatDau',
            'products.ngayketthuc as ngayKetThuc'
        )
        ->where('products.id',$id)
        ->get();
        $reviews = CustomerReviewModel::where('product_id',$id)->paginate(2);
        return view('customer.templates.detailproduct',compact('danhSach','reviews'));
    }
    public function reviewDetailProduct(Request $request){
        $reviews = new CustomerReviewModel;
        $reviews->product_id = $request->product_id;
        $reviews->name = $request->name;
        $reviews->email = $request->email;
        $reviews->reviews = $request->your_reviews;
        $reviews->save();
        //tro lai trang detail
        $product_id = $request->product_id;
        return redirect()->route('detailproduct',compact('product_id'))->with('thongBao','Submit a rating of success!');
    }
}
