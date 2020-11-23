<?php

namespace App\Http\Controllers;

use App\ContactModel;
use App\ContactSendEmailModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactModel::find(1)->toArray();
        return view('Administrator.Templates.Quanlylienhe.index',compact('contact'));
    }
    public function ViewContact()
    {
        $contact = ContactModel::find(1)->toArray();
        return view('customer.templates.contact',compact('contact'));
    }
    public function sendMail(Request $request){
        //save database
        $saveEmailContact = new ContactSendEmailModel;
        $saveEmailContact->name = Request::get('name');
        $saveEmailContact->email = Request::get('email');
        $saveEmailContact->phone = Request::get('phone');
        $saveEmailContact->message = Request::get('your_message');
        $saveEmailContact->save();
        //send mail
        Mail::send('Customer.Templates.contactsendmailsuccess', array('name' => Request::get('name')), function($message){
            $message->to(Request::get('email'), Request::get('name'))->subject('Send mail success');
        });
        return redirect('contact')->with('thongBao','Send Success');
    }
    public function ThongTinLienHe()
    {
       $danhSach = ContactSendEmailModel::where('daXoa',0)->get();
       return view('Administrator.Templates.Quanlylienhe.thongtinlienhe',compact('danhSach'));
    }
    public function XoaThongTinLienHe($id)
    {
       $contactEmail = ContactSendEmailModel::find($id);
       $contactEmail->daXoa = 1;
       $contactEmail->save();
       return redirect('thongtinlienhe')->with('thongBao','Delete Success');
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
     * @param  \App\contactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function show(contactModel $contactModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $contact = ContactModel::find(1);
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->working_time = $request->working_time;
        $contact->link_facebook = $request->link_facebook;
        $contact->link_twitter = $request->link_twitter;
        $contact->link_Google = $request->link_Google;
        $contact->link_skype = $request->link_skype;
        $contact->link_youtube = $request->link_youtube;
        $contact->save();
        return redirect('quanlylienhe')->with('thongBao','Sửa Thành Công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactModel $contactModel)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contactModel  $contactModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactModel $contactModel)
    {
        //
    }
}
