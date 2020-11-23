<?php

namespace App\Http\Controllers;

use App\InformationModel;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = InformationModel::find(1)->toArray();
        return view('administrator.templates.quanlythongtin.index',compact('company'));
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
     * @param  \App\informationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function show(informationModel $informationModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\informationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(informationModel $informationModel)
    {
        $company = InformationModel::find(1);
        $contact->about = $request->about;
        $contact->location = $request->location;
        $contact->link_facebook = $request->link_facebook;
        $contact->link_instagram = $request->link_instagram;
        $contact->save();
        return redirect('quanlythongtin')->with('thongBao','Sửa Thành Công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\informationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, informationModel $informationModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\informationModel  $informationModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(informationModel $informationModel)
    {
        //
    }
}
