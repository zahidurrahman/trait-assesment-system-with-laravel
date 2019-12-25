<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assesment;
use App\Question;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('home');
        $ass = Assesment::all();

        return view('home', compact('ass'));
    }
    public function index1()
    {
        return view('respondent.survey_cpp');

    }
    public function index2()
    {
        $shares = Question::all();

        return view('respondent.cpp', compact('shares'));

    }
}
