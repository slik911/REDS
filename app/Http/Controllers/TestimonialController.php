<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Client;
use App\Validations\TestimonialValidation;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::with('client')->orderBy('id', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(){
        $clients = Client::orderBy('id', 'desc')->get();
        return view('admin.testimonials.create', compact('clients'));
    }

    public function store(Request $request, TestimonialValidation $rule){
        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

       try {
            DB::beginTransaction();
            $testimonial = new Testimonial();
            $testimonial->client_id = $request->client_id;
            $testimonial->message = $request->message;
            $testimonial->save();
            DB::commit();

            notyf()->success('Testimonial created successfully!');
            return redirect()->route('admin.testimonial');
       } catch (\Throwable $th) {
        //throw $th
            DB::rollBack();
            notyf()->error('Testimonial creation failed!');
            return redirect()->back()->withInput($request->all());
       }
    }

    public function edit($uuid){

        $testimonial = Testimonial::where('uuid', $uuid)->first();

        if ($testimonial) {
            $clients = Client::orderBy('id', 'desc')->get();
            return view('admin.testimonials.edit', compact('testimonial', 'clients'));
        } else {
            notyf()->error('Testimonial not found!');
            return redirect()->back();
        }

    }

    public function preview($uuid){
        $testimonial = Testimonial::where('uuid', $uuid)->first();
    
        if ($testimonial) {
            return view('admin.testimonials.preview', compact('testimonial'));
        } else {
            notyf()->error('Testimonial not found!');
            return redirect()->back();
        }
    }

    public function update(Request $request, TestimonialValidation $rule){
        $validated = $rule->validationRules($request, 'update');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        try {
            DB::beginTransaction();
            $testimonial = Testimonial::where('uuid', $request->uuid)->first();
            if ($testimonial) {
                $testimonial->client_id = $request->client_id;
                $testimonial->message = $request->message;
                $testimonial->save();
                DB::commit();

                notyf()->success('Testimonial updated successfully!');
                return redirect()->route('admin.testimonial');
            } else {
                DB::rollBack();
                notyf()->error('Testimonial not found!');
                return redirect()->back()->withInput($request->all());
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            notyf()->error('Testimonial update failed!');
            return redirect()->back()->withInput($request->all());
        }
    }

    public function updateStatus($uuid){
        $testimonial = Testimonial::where('uuid', $uuid)->first();
        if ($testimonial) {
            $testimonial->status = !$testimonial->status;
            $testimonial->save();
            if ($testimonial->status) {
                notyf()->success('Testimonial activated successfully!');
            } else {
                notyf()->success('Testimonial deactivated successfully!');
            }
            return redirect()->back();
        } else {
            return response()->json(['success' => false, 'message' => 'Testimonial not found!']);
        }
    }

    public function delete(Request $request){
        $testimonial = Testimonial::where('uuid', $request->uuid)->first();
        if ($testimonial) {
            $testimonial->delete();
            notyf()->success('Testimonial deleted successfully!');
            return redirect()->back();
        } else {
            notyf()->error('Testimonial not found!');
            return redirect()->back();
        }
    }
}
