<?php

namespace App\Http\Controllers;

use App\AboutModel;
use App\AboutElementModel;
use App\AboutQuestionModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.templates.about');
    }
    public function ViewAbout()
    {
        $about = AboutModel::find(1)->toArray();
        $aboutElementor = AboutElementModel::All(); 
        $questions = AboutQuestionModel::Where('daXoa',0)->get();
        return view('customer.templates.about',compact('about','aboutElementor','questions'));
    }
    public function About(Request $request)
    {
        $aboutElementor = AboutModel::find(1);
        if(isset($request->title) || isset($request->content) || isset($request->link_youtube)){
            $aboutElementor->title = $request->title;
            $aboutElementor->content = $request->content;
            $aboutElementor->link_youtube = $request->link_youtube;
            $aboutElementor->save();
        }
        return view('Administrator.Templates.Quanlyabout.suaabout',compact('aboutElementor'));
    }

    public function AboutElementor(Request $request)
    {
        $aboutElementor = AboutElementModel::All();
        return view('Administrator.Templates.Quanlyabout.elementor',compact('aboutElementor'));
    }
    public function SuaAboutElementor(Request $request,$id)
    {
        $aboutElementor = AboutElementModel::find($id);
        return view('Administrator.Templates.Quanlyabout.suaelementor',compact('aboutElementor'));
    }

    public function PostAboutElementor(Request $request)
    {
                $id = $request->id;
                $aboutElementor = AboutElementModel::find($id);
                $aboutElementor->title = $request->title;
                $aboutElementor->content = $request->content;
                $aboutElementor->save();
                return redirect('elementor')->with('thongBao','Sửa Thành Công');
    }
    public function AboutQuestion(Request $request)
    {
        $questions = AboutQuestionModel::Where('daXoa',0)->get();
        return view('Administrator.Templates.Quanlyabout.question',compact('questions'));
    
    }
    public function AddAboutQuestion(Request $request)
    {
        $question = new AboutQuestionModel();
        $question->title = $request->title;
        $question->content = $request->content;
        $question->save();
        return redirect('questions')->with('thongBao','Thêm Thành Công');
    
    }
    public function EditQuestion($id)
    {
        $question = AboutQuestionModel::find($id)->toArray();
        return view('Administrator.Templates.Quanlyabout.suaquestion',compact('question'));
    
    }
    public function SqlEditQuestion(Request $request)
    {
        $id = $request->id;
        $question = AboutQuestionModel::find($id);
        $question->title = $request->title;
        $question->content = $request->content;
        $question->save();
        return redirect('questions')->with('thongBao','Sửa Thành Công');
    
    }
    public function DeleteQuestion($id)
    {
        $question = AboutQuestionModel::find($id);
        $question->daXoa = 1;
        $question->save();
        return redirect('questions')->with('thongBao','XóaThành Công');
    
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
     * @param  \App\AboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function show(AboutModel $aboutModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutModel $aboutModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutModel $aboutModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutModel  $aboutModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutModel $aboutModel)
    {
        //
    }
}
