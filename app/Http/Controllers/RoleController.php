<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\RoleValidation;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use function Flasher\Notyf\Prime\notyf;
use function Flasher\Prime\flash;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('admin.roles.role', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request, RoleValidation $rule): RedirectResponse
    {
        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }

        try {
            Role::create([
                'uuid'=> Str::uuid(),
                'name' => $request->name
            ]);
            notyf()->success('Role created successfully');
            return redirect()->route('admin.role');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $role = Role::where('uuid',$request->uuid)->first();
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, RoleValidation $rule): RedirectResponse
    {
        $validated = $rule->validationRules($request, 'update');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }
        try {
            Role::where('uuid', $request->uuid)->update([
                'name' => $request->name
            ]);
            notyf()->success('Role updated successfully');
            return redirect()->route('admin.role');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }

    }

    public function delete(Request $request): RedirectResponse
    {
        try {
            Role::where('uuid', $request->uuid)->delete();
            notyf()->success('Role deleted successfully');
            return redirect()->route('admin.role');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }


}