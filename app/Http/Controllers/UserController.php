<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Credential;
use App\Models\Role;
use App\Models\Upload;
use App\Models\User;
use App\Models\UserRoles;
use App\Validations\UserValidation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        //only admininistrators have access to this page

    }

    public function index()
    {

        if(Auth::user()->role->name == 'super-admin' || Auth::user()->role->name == 'super admin'){
            $staff = User::with('credential')->whereHas('role', function ($query) {
                $query->whereNotIn('name', ['super admin']);
            })->with('role')->get();
        }
        else{
            $staff = User::whereHas('role', function ($query) {
                $query->whereNotIn('name', ['admin','super admin']);
            })->with('role')->get();
        }


        return view('admin.users.staff.index', compact('staff'));
    }

    public function create()
    {
        $roles = Role::where('id', '!=', 1)->get();
        return view('admin.users.staff.create', compact('roles'));
    }

    public function store(Request $request, UserValidation $validation){

        $validated = $validation->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        try {

            if ($request->hasFile('image')) {
                //upload image to cloudinary and returns the image url
                $image = new Functions();
                $image_url = $image->uploadImage($request->file('image'), 'users');

                //store the image url in the database
                $upload = Upload::store($image_url);

                //merge the image id to the request
                $request->merge(['image_id' => $upload->uuid]);
            }


            DB::beginTransaction();

            //store the user details in the database
            $user = User::create($request->all());

            //store user in credential table if admin role
            if($request->role  == 2){
                Credential::create([
                    'user_id' => $user->uuid,
                    'password' => bcrypt('password'),
                ]);
            }

            //Assign user to role
            UserRoles::create(['user_id' => $user->id, 'role_id' => $request->role]);

            DB::commit();

            notyf()->success('User created successfully');
            return redirect()->route('admin.staff');

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            notyf()->error('An error occurred while creating user');
            return redirect()->back()->withInput($request->all());

        }

    }

    public function updateStatus(Request $request){
        try {
            $user = Credential::where('user_id', $request->uuid)->first();
            if ($user->status == 1) {
                $user->status = 0;
                $user->save();
                notyf()->success('User login deactivated successfully');
            } else {
                $user->status = 1;
                $user->save();
                notyf()->success('User login activated successfully');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request){

        $staff = User::with('role', 'image')->where('uuid', $request->uuid)->first();
        $roles = Role::all();

        return view('admin.users.staff.edit', compact('staff', 'roles'));
    }

    public function update(Request $request, UserValidation $validation){
        $validated = $validation->validationRules($request, 'update');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        try {

            if ($request->hasFile('image')) {
                //upload image to cloudinary and returns the image url
                $image = new Functions();
                $image_url = $image->uploadImage($request->file('image'), 'users');

                //store the image url in the database
                $upload = Upload::store($image_url);

                //merge the image id to the request
                $request->merge(['image_id' => $upload->uuid]);
            }


            DB::beginTransaction();

            //update the user details in the database
            $user = User::where('id', $request->id)->update($request->except('_token', '_method', 'role', 'image'));

            //Assign user to role
            UserRoles::where('user_id', $request->id)->update(['role_id' => $request->role]);

            DB::commit();

            notyf()->success('User updated successfully');
            return redirect()->route('admin.staff');

        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            notyf()->error('An error occurred while updating user');
            return redirect()->back()->withInput($request->all());

        }
    }

    public function delete(Request $request){
        try {
            User::where('uuid', $request->uuid)->delete();
            notyf()->success('Staff deleted successfully');
            return redirect()->route('admin.users.staff');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }
}
