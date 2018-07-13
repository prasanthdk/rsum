<?php

namespace App\Http\Controllers;

use App\ResumeTemplate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SelectTemplate(Request $request)
    {

        $resume_template = ResumeTemplate::where('status','=','1')->orderBy('created_at')->get();

        return view('select_template',compact('resume_template'));
    }

}
