<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Validations\CategoryValidation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
          //only admininistrators have access to this page
          $this->middleware('AdminMiddleware');
    }

    public function index(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->get();    
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request, CategoryValidation $rule): RedirectResponse
    {
        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }

        try {
            Category::create([
                'uuid'=> Str::uuid(),
                'name' => $request->name,
                'slug' => Str::slug($request->name, "_"),
            ]);
            notyf()->success('Category created successfully');
            return redirect()->route('admin.category');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $category = Category::where('uuid',$request->uuid)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, CategoryValidation $rule): RedirectResponse
    {
        $validated = $rule->validationRules($request, 'update');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }
        try {
            Category::where('uuid', $request->uuid)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name, "_"),
            ]);
            notyf()->success('Category updated successfully');
            return redirect()->route('admin.category');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }

    }

    public function delete(Request $request): RedirectResponse
    {
        try {
            Category::where('uuid', $request->uuid)->delete();
            notyf()->success('category deleted successfully');
            return redirect()->route('admin.category');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }
}
