<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ChangePasswordController extends Controller
{
    /*public function index()
    {
        $user = User::find(auth()->user()->id);
        return Inertia::render('Password/Changue',compact('user'));
    }

    public function update(User $user, ChangePasswordRequest $request)
    {
        if($request->password == $request->ConfirmPassword){
            $user = User::find(auth()->user()->id);

            $user->update([
                'password' => $request->password
            ]);

            return Redirect::route('login')->with('notification', [
                'status' => 'success',
                'message'=> 'Cambiado Exitosamente',
            ]);

            auth()->logout();
        } else {
            return Redirect::route('Password/Change')->with('notification', [
                'status' => 'error',
                'message'=> 'Contraseñas deben coincidir',
            ]);
        }
    }*/
}
