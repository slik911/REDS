<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Credential;
use App\Models\User;
use App\Validations\UserValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $staff = User::with('role', 'image')->where('uuid', Auth::user()->uuid)->first();
        return view('admin.profile.index', compact('staff'));
    }

    public function updatePassword(Request $request, UserValidation $rule){

        $validated = $rule->validationRules($request, 'update_password');
        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }

        $user = Credential::where('user_id', Auth::user()->uuid)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        notyf()->success('Password updated successfully');
        return redirect()->back();
    }
}