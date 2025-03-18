<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;
use App\Models\Quotation;
use App\Models\RFQ;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::whereNull('deleted_at')->count();
        $rfq = RFQ::whereNull('deleted_at')->count();
        $quotation = Quotation::whereNull('deleted_at')->where('status', '!=', 'draft')->count();
        $post = Post::where('status', true)->whereNull('deleted_at')->count();

        $followUp = Quotation::with('client')->where('status', 'sent')->orderBy('id', 'asc')->get();
        $pendingRfq = RFQ::with('client')->where('is_quotation_sent', false)->orderBy('id', 'asc')->get();

  
        return view('home', compact('clients', 'rfq', 'quotation', 'post', 'followUp', 'pendingRfq'));
    }
}
