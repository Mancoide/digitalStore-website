<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles.index');
    }

    public function index()
    {
        $roles = Role::orderBy('name', 'ASC');

        if(request()->search)
        {
            $roles = $roles->where('name', 'like', '%'. request()->search .'%');
        }

        $roles = $roles->paginate(20);
        return Inertia::render('Roles/Index', compact('roles'));
    }

    public function create()
    {
        $this->middleware('permission:roles.create');
        $permissions = $this->getPermissions();
        $definitions = config('constants.definitions');
        return Inertia::render('Roles/Create', compact('permissions', 'definitions'));
    }

    public function store(CreateRoleRequest $request)
    {
        $this->middleware('permission:roles.create');
        $role = Role::create([
            'display_name'  => $request->name,
            'description'   => $request->description,
            'name'          => str_replace(' ', '-', $request->name)
        ]);

        $role->attachPermissions($request->permissions);

        return Redirect::route('roles.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    public function edit(Role $role)
    {
        $this->middleware('permission:roles.edit');
        $permissions = $this->getPermissions();
        $role->load(['permissions']);
        $definitions = config('constants.definitions');

        return Inertia::render('Roles/Edit', compact('permissions', 'role', 'definitions'));
    }

    public function update(Role $role, CreateRoleRequest $request)
    {
        $this->middleware('permission:roles.edit');
        $role->update([
            'name' => str_replace(' ', '-', $request->name),
            'display_name' => $request->name,
            'description' => $request->description
        ]);

        $role->syncPermissions(request()->permissions);

        return Redirect::route('roles.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    private function getPermissions()
    {
        return Permission::get()->sortBy('id')->groupBy('description');
    }
}
