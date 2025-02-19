<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceList;
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
          $this->middleware('AdminMiddleware');
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
            ServiceList::create([
                'uuid'=> Str::uuid(),
                'name' => $request->name,
                'slug' => Str::slug($request->name, "_"),
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
            ServiceList::where('uuid', $request->uuid)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name, "_"),
            ]);
            notyf()->success('Service updated successfully');
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
