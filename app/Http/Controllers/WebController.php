<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Rental;
use App\Models\ServiceList;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $services = ServiceList::with('image')->get();
        $rentals =  Post::has('rental')->with('rental')->orderBy('id', 'desc')->get();

        return view('welcome', compact('services', 'rentals'));
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
