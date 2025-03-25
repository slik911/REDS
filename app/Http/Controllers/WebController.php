<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Rental;
use App\Models\ServiceList;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class WebController extends Controller
{
    public function index(){
        $services = ServiceList::with('image')->limit(4)->get();
        $rentals =  Post::has('rental')->with('rental')->orderBy('id', 'desc')->where('status', true)->get();

        return view('welcome', compact('services', 'rentals'));
    }

    public function about(){
        return view('web.about');
    }

    public function rental(){
        $rentals =  Post::has('rental')->with('rental')->orderBy('id', 'desc')->where('status', true)->paginate(12);
        return view('web.rental', compact('rentals'));
    }

    public function rentalPreview($uuid){
        $rental =  Post::has('rental')->with('rental')->orderBy('id', 'desc')->where('uuid', $uuid)->first();
        // dd(json_decode($rental->rental->meta_data));
        return view('web.rentalPreview', compact('rental'));
    }

    public function rentalView(){
        return view('web.rentalPreview');
    }

    public function reno(){
        $services = ServiceList::with('image')->paginate(12);
        return view('web.renovation', compact('services'));
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
