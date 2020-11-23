<?php

namespace App\Http\Controllers;

use App\BillModel;
use App\BillDetailModel;
use App\CustomerModel;
use App\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phanTrang = isset($request->phanTrang)?$request->phanTrang:50;
        $this->data['title'] = 'Quản lý hóa đơn';
        $customers = CustomerModel::join('bills','customer_id','=','customers.id')
                    ->select('customers.*',
                        'bills.date_order as date_order',
                        'bills.id as bills_id'
                    )
                    ->where('daXoa',0)
                    ->orderBy('id', 'desc')
                    ->paginate($phanTrang);
        $this->data['customers'] = $customers;
        $this->data['phanTrang'] = $phanTrang;
        return view('administrator.templates.quanlybill.index',$this->data);
    }

    public function ViewDetail($id){
        $customerInfo = CustomerModel::join('bills', 'customers.id', '=', 'bills.customer_id')
                        ->select('customers.*', 'bills.id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.date_order as bill_date_order','bills.address as bill_address','bills.city as bill_city')
                        ->where('customers.id', '=', $id)
                        ->first();

        $billInfo = BillModel::join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
                    ->leftjoin('products', 'bill_details.product_id', '=', 'products.id')
                    ->where('bills.customer_id', '=', $id)
                    ->select('bills.*', 'bill_details.*', 'products.name as product_name')
                    ->get();
                    
        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;

        return view('Administrator.Templates.quanlybill.detailbill',$this->data);
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
     * @param  \App\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function show(OrderModel $orderModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderModel $orderModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderModel $orderModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderModel  $orderModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bills = BillModel::find($id);
        $bills->daXoa = 1;
        $bills->save(); 
        return redirect()->route('quanlybill')->with('thongBao','Xóa thành công!');
    }
}
