<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return Inertia::render('Password/Index');
    }

    public function store(ChangePasswordRequest $request)
    {
        if($request->password == $request->ConfirmPassword){
            User::where('id', auth()->user->id)->first()->update([
                'password' => $request->password
            ]);

            auth()->logout();

            return Redirect::route('login')->with('notification', [
                'status' => 'success',
                'message'=> 'Cambiado Exitosamente',
            ]);
        } else {
            return Redirect::route('Password/Change')->with('notification', [
                'status' => 'error',
                'message'=> 'Contraseñas deben coincidir',
            ]);
        }
    }
}
