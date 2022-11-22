<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id', 'DESC')->paginate(30);

    	return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->getRoles()->pluck('display_name', 'id');

    	return view('pages.users.create', compact('roles'));
    }

    public function store(CreateUserRequest $request)
    {
    	User::create([
            'document_number'   => $request->document_number,
    		'name'              => $request->name,
            'last_name'         => $request->last_name,
            'fullname'          => $request->name. ' ' . $request->last_name,
            'username'          => $request->username,
            'email'             => $request->email,
            'password'          => $request->password,
    	]);

        return redirect('users');
    }

    private function getRoles()
    {
        return Role::get();
    }
}
