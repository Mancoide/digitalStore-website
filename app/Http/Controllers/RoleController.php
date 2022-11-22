<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

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
        return view('pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->getPermissions();
        return view('pages.roles.create', compact('permissions'));
    }

    public function store(CreateRoleRequest $request)
    {   
        $role = Role::create([
            'display_name'  => $request->name,
            'description'   => $request->description,
            'name'          => str_replace(' ', '-', $request->name)
        ]);

        $role->attachPermissions($request->permission_ids);

        return redirect('roles');
    }

    public function edit(Role $role)
    {
        $permissions = $this->getPermissions();

        return view('pages.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role, CreateRoleRequest $request)
    {
        $role->update([
            'name' => str_slug($request->display_name),
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        $role->syncPermissions(request()->permission_ids);
        
        return redirect('roles');
    }

    private function getPermissions()
    {
        return Permission::get()->sortBy('id')->groupBy('description')->toArray();
    }
}
