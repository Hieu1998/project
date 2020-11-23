<?php

namespace App\Http\Controllers;

use App\CheckoutModel;
use App\BillDetailModel;
use App\BillModel;
use App\CustomerModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Mail;
use Validator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lay du lieu trong cart
        $this->data['title'] = 'Check out';
        $cart = Cart::content();
        if(count($cart) > 0){
            $this->data['cart'] = $cart;
            $this->data['total'] = Cart::total();
            return view('Customer.Templates.checkout',$this->data); 
        }else{
            return Redirect('home')->with('thongBao','Vui lòng lựa chọn trước khi thanh toán!');
        }   
    }

    public function postCheckOut(Request $request) {
        $cartInfor = Cart::content();
            // save
        $customer = new CustomerModel;
        $customer->firstname = Request::get('firstName');
        $customer->lastname = Request::get('lastName');
        $customer->email = Request::get('email');
        $customer->country = Request::get('country');
        $customer->phone_number = Request::get('phoneNumber');
        $customer->save();

        $bill = new BillModel;
        $bill->customer_id = $customer->id;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = str_replace(',', '', Cart::subtotal());
        $bill->address = Request::get('address');
        $bill->city = Request::get('city');
        $bill->postal = Request::get('postal');
        $bill->country = Request::get('countryBill');
        $bill->note = Request::get('note');
        $bill->save();

        if (count($cartInfor) > 0) {
            foreach ($cartInfor as $key => $item) {
                $billDetail = new BillDetailModel;
                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $item->id;
                $billDetail->quantity = $item->qty;
                $billDetail->price = $item->price;
                $billDetail->save();
            }
        }

        // del
        Cart::destroy();

        $customerInfo = CustomerModel::join('bills', 'customers.id', '=', 'bills.customer_id')
                        ->select('customers.*', 'bills.id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.date_order as bill_date_order','bills.address as bill_address','bills.city as bill_city','bills.country as bill_country')
                        ->where('customers.id', '=', $customer->id)
                        ->first();

        $billInfo = BillModel::join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
                    ->leftjoin('products', 'bill_details.product_id', '=', 'products.id')
                    ->where('bills.customer_id', '=', $customer->id)
                    ->select('bills.*', 'bill_details.*', 'products.name as product_name')
                    ->get();
        $thongBao = 'Checkout success!';
        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;
        $this->data['thongBao'] = $thongBao;

        //send mail
        // Mail::send('Customer.Templates.mailsuccess', array('customerInfo' => $customerInfo,'billInfo' => $billInfo), function($message){
        //     $message->to(Request::get('email'), Request::get('firstName'))->subject('Add success');
        // });

        return view('Customer.Layouts.notification',$this->data);
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
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(checkout $checkout)
    {
        //
    }
}
