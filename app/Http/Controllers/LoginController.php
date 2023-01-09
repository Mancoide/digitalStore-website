<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoginRequest;
use App\Providers\RouteServiceProvider;
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

    /* public function store(CreateLoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();

        return redirect(to: RouteServiceProvider::HOME);
    }

    public function destroy(Request $request){
        Auth::guard(name:'web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route(route:'login');
    } */
}
