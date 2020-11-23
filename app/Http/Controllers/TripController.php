<?php

namespace App\Http\Controllers;

use App\TripModel;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhSach = TripModel::All()->where('daXoa',0);
        return view('Administrator.Templates.quanlytrip.index',compact('danhSach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //save
        $trip = new TripModel;
        $trip->name = $request->name;
        $trip->songay = $request->soNgay;
        $trip->sodem = $request->soDem;
        $trip->save();

        return redirect()->route('quanlytrip')->with('thongBao','Thêm thành công!');
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
     * @param  \App\TripModel  $tripModel
     * @return \Illuminate\Http\Response
     */
    public function show(TripModel $tripModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TripModel  $tripModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getTripEdit = TripModel::find($id)->toArray();
        return view('Administrator.Templates.quanlytrip.edit',compact('getTripEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TripModel  $tripModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TripModel $TripModel)
    {
        //save
        $trip = TripModel::find($request->id);
        $trip->name = $request->name;
        $trip->songay = $request->soNgay;
        $trip->sodem = $request->soDem;
        $trip->save();

        return redirect()->route('quanlytrip')->with('thongBao','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TripModel  $tripModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //save
        $trip = TripModel::find($id);
        $trip->daXoa = 1;
        $trip->save();

        return redirect()->route('quanlytrip')->with('thongBao','Xóa thành công!');
    }
}
