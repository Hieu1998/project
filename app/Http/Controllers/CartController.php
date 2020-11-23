<?php

namespace App\Http\Controllers;

use App\CartModel;
use App\ProductModel;
use App\ImagesProductModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;;
use Cart;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\CartModel  $cartModel
     * @return \Illuminate\Http\Response
     */
    public function show(CartModel $cartModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartModel  $cartModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CartModel $cartModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CartModel  $cartModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartModel $cartModel)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartModel  $cartModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartModel $cartModel)
    {
        Cart::destroy();
        $cart = Cart::content();
        $this->data['cart'] = $cart;
        return view('Customer.Layouts.cart',$this->data);
    }
    public function cart()
    {
       if (Request::isMethod('post')) {
            $this->data['title'] = 'Giỏ hàng của bạn';
            $product_id = Request::get('product_id');
            $product = ProductModel::find($product_id);
            $images = ImagesProductModel::All()->where('idProduct',$product_id);
            foreach($images as $item){
                $cartInfo = [
                'id' => $product_id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => '1',
                'options' => ['link' => $item->link]
            ];
            Cart::add($cartInfo);
            }
        }
        //lay du lieu trong cart
        $cart = Cart::content();
        $this->data['cart'] = $cart;
        return view('Customer.Layouts.cart',$this->data);
       
    }
    public function deleteProduct(){
        $rowId = Request::get('rowId');
        Cart::remove($rowId);
        //lay du lieu trong cart
        $cart = Cart::content();
        $this->data['cart'] = $cart;
        return view('Customer.Layouts.cart',$this->data);
    }
    public function cartQuantityUp(){
        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id === Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }
        //lay du lieu trong cart
        $cart = Cart::content();
        $this->data['cart'] = $cart;
        return view('Customer.Layouts.cart',$this->data);
    }
    public function cartQuantityDown(){
        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id === Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }
        //lay du lieu trong cart
        $cart = Cart::content();
        $this->data['cart'] = $cart;
        return view('Customer.Layouts.cart',$this->data);
    }
    public function goToCart(){
        //lay du lieu trong cart
        $cart = Cart::content();
        $this->data['cart'] = $cart;
        return view('Customer.Layouts.cart',$this->data);
    }
}
