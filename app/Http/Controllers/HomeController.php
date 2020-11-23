<?php

namespace App\Http\Controllers;

use App\TripModel;
use App\TripsAndProductModel;
use App\ProductModel;
use App\ImagesProductModel;
use App\InformationModel;
use Illuminate\Http\request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = TripModel::All();
        $danhSach = TripsAndProductModel::join('products', 'idproduct', '=', 'products.id')
        ->join('trips','idtrip','=','trips.id')
        ->join('images_product','products.id','=','images_product.idproduct')
        ->select(
            'images_product.link as linkImage',
            'trips.name as nameTrip',    
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
        ->get();
        return view('customer.layouts.home', compact('danhSach','trips'));
    }
    public function cloudTrip(Request $request)
    {
        $priceSort = isset($request->priceSort)?$request->priceSort:1;
        $arrayKieu =(['0'=> 'asc','1'=>'desc']);
        $idTrip = isset($request->idTrip)?$request->idTrip:'';

        $danhSachProduct = TripsAndProductModel::join('products', 'idproduct', '=', 'products.id')
        ->join('trips','idtrip','=','trips.id')
        ->join('images_product','products.id','=','images_product.idproduct')
        ->select(
            'images_product.link as linkImage',
            'trips.name as nameTrip',    
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
        ->orderBY('priceProduct',$arrayKieu[$priceSort]);
        if(isset($request->submit)){
            if($idTrip != ''){
                $danhSachProduct = $danhSachProduct->where('trips.id',$idTrip);
            }else{
                $danhSachProduct = $danhSachProduct;
            }
        }
        $danhSachProduct = $danhSachProduct->DISTINCT()->get();
        $trips_Product = TripsAndProductModel::All();
        $tripsList = TripModel::All();
        return view('customer.templates.cloudtrip',compact('contact','danhSachBanner','danhSachProduct','trips_Product','tripsList','priceSort'));
    }
    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
