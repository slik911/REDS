<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\ServiceList;
use App\Models\Upload;
use App\Validations\ServiceListValidation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ServiceListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
          //only admininistrators have access to this page

    }

    public function index(Request $request)
    {
        $services = ServiceList::orderBy('id', 'desc')->get();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request, ServiceListValidation $rule): RedirectResponse
    {
        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }

        try {


            if ($request->hasFile('image')) {
                //upload image to cloudinary and returns the image url
                $image = new Functions();
                $image_url = $image->uploadImage($request->file('image'), 'services');

                //store the image url in the database
                $upload = Upload::store($image_url);
            }

            ServiceList::create([
                'uuid'=> Str::uuid(),
                'name' => $request->name,
                'slug' => Str::slug($request->name, "_"),
                'image_id' => $upload->uuid,
                'description'=> $request->description
            ]);
            notyf()->success('Service created successfully');
            return redirect()->route('admin.service');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $service = ServiceList::where('uuid',$request->uuid)->first();
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, ServiceListValidation $rule): RedirectResponse
    {
        $validated = $rule->validationRules($request, 'update');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }
        try {

            if ($request->hasFile('image')) {
                //upload image to cloudinary and returns the image url
                $image = new Functions();
                $image_url = $image->uploadImage($request->file('image'), 'users');

                //store the image url in the database
                $upload = Upload::store($image_url);
            }

            ServiceList::where('uuid', $request->uuid)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name, "_"),
                'description'=> $request->description,
                'image_id'=> $upload->uuid
            ]);
            notyf()->success('Service updated successfully');
            return redirect()->route('admin.service');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }

    }

    public function updateStatus(Request $request): RedirectResponse
    {
        try {
            $service = ServiceList::where('uuid', $request->uuid)->first();
            $service->status = !$service->status;
            $service->save();
            notyf()->success('Service status updated successfully');
            return redirect()->route('admin.service');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        try {
            ServiceList::where('uuid', $request->uuid)->delete();
            notyf()->success('Service deleted successfully');
            return redirect()->route('admin.service');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }
}
