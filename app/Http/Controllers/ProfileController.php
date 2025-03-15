<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $staff = User::with('role', 'image')->where('uuid', Auth::user()->uuid)->first();
        return view('admin.profile.index', compact('staff'));
    }
}
