<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
	Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
	Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
	Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
	Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
	Route::get('users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
	Route::put('users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');

	Route::get('roles', 'RoleController@index')->name('roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create');
	Route::post('roles', 'RoleController@store')->name('roles.store');
	Route::get('roles/{rol}/edit', 'RoleController@edit')->name('roles.edit');
	Route::put('roles/{rol}', 'RoleController@update')->name('roles.update');
});

Route::middleware(['guest'])->group(function () {
	Route::get('login', 'LoginController@index')->name('login');
	Route::post('login', 'LoginController@login')->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
});

