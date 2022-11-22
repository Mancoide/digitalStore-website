<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('pages.login');
    }
    
    public function login(CreateLoginRequest $request)
    {
        if(Auth::check() || Auth::attempt(['username' => $request->username, 'password' => $request->password])) 
        {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return redirect('login')
            ->withErrors('Datos incorrectos')
            ->withInput($request->only('username'));;
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}
