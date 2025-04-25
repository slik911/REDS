<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
        // Fetch the email record from the `emails_table`
        $user = DB::table('users')
            ->where('email', $request->input('email'))
            ->first();

        if (!$user) {
            return []; // Return an empty array if the email does not exist
        }

        // Fetch the password record from the `passwords_table`
        $passwordRecord = DB::table('credentials')
            ->where('user_id', $user->uuid)
            ->where('status', true) // Assuming both tables share a common ID
            ->first();

        return [
            'id' => $user->id,
            'email' => $user->email,
            'password' => $passwordRecord->password ?? '',
        ];
    }

    /**
     * Override the attemptLogin method to validate password manually.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(\Illuminate\Http\Request $request)
    {
        $credentials = $this->credentials($request);

        // Check if credentials are valid
        if (!isset($credentials['password']) || !$credentials['password']) {
            return false;
        }

        // Validate the password
        if (Hash::check($request->input('password'), $credentials['password'])){
            Auth::loginUsingId($credentials['id']);
            return true;
        }
    }

}