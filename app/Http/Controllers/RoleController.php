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
        $permissions = $this->getPermissions();
        return Inertia::render('Roles/Create', compact('permissions'));
    }

    public function store(CreateRoleRequest $request)
    {   
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
        $permissions = $this->getPermissions();
        $role->load(['permissions']);

        return Inertia::render('Roles/Edit', compact('permissions', 'role'));
    }

    public function update(Role $role, CreateRoleRequest $request)
    {
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
