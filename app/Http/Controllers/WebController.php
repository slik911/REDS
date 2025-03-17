<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function about(){
        return view('web.about');
    }

    public function rental(){
        return view('web.rental');
    }

    public function reno(){
        return view('web.renovation');
    }

    public function project(){
        return view('web.project');
    }

    public function contact(){
        return view('web.contact');
    }

    public function quote(){
        return view('web.rfq');
    }
}
