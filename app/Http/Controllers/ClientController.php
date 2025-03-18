<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Role;
use App\Models\Upload;
use App\Validations\ClientValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::orderBy('id', 'desc')->get();

        return view('admin.users.client.index', compact('client'));
    }

    public function create()
    {
        return view('admin.users.client.create');
    }

    public function store(Request $request, ClientValidation $validation){

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
            $client = Client::create($request->all());

            DB::commit();

            notyf()->success('Client created successfully');
            return redirect()->route('admin.client');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            notyf()->error('An error occurred while creating user');
            return redirect()->back()->withInput($request->all());
      
        }
             
    }

    public function edit(Request $request){

        $client = Client::where('uuid', $request->uuid)->first();

        return view('admin.users.client.edit', compact('client'));
    }

    public function update(Request $request, ClientValidation $validation){
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
            $client = Client::where('id', $request->id)->update($request->except('_token', '_method', 'role', 'image'));

            DB::commit();

            notyf()->success('Client updated successfully');
            return redirect()->route('admin.client');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());

            notyf()->error('An error occurred while updating user');
            return redirect()->back()->withInput($request->all());
      
        }
    }

    public function delete(Request $request){
        try {
            Client::where('uuid', $request->uuid)->delete();
            notyf()->success('Client deleted successfully');
            return redirect()->route('admin.users.client');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }
}
