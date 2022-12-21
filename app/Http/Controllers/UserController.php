<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::with('status')->orderBy('id', 'DESC')->paginate(30);

    	return Inertia::render('Users/Index', compact('users'));
    }

    public function create()
    {
        $roles = $this->getRoles();

    	return Inertia::render('Users/Create', compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
    	$user = User::create([
            'document_number'   => $request->document_number,
            'fullname'          => $request->fullname,
            'username'          => $request->username,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'password'          => $request->password,
            'status_id'         => 1
    	]);

        $user->attachRole($request->rol_id);

        return Redirect::route('users.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    public function edit(User $user)
    {
        $roles = $this->getRoles();
        $user->load(['roles']);

        return Inertia::render('Users/Edit', compact('roles', 'user'));
    }

    public function update(User $user, CreateUserRequest $request)
    {
        $user->update([
            'document_number'   => $request->document_number,
            'fullname'          => $request->fullname,
            'username'          => $request->username,
            'email'             => $request->email,
            'phone'             => $request->phone,
        ]);

        if($request->password) $user->update(['password' => $request->password]);

        $user->syncRoles([$request->rol_id]);

        return Redirect::route('users.index')->with('notification', [
            'status' => 'success',
            'message'=> 'Guardado Exitosamente',
        ]);
    }

    private function getRoles()
    {
        return Role::get();
    }
}
