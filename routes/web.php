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
	Route::get('/', 'HomeController@index')->name('home.index');
	Route::get('users', 'UserController@index')->name('users.index');
	Route::get('users/create', 'UserController@create')->name('users.create');
	Route::post('users', 'UserController@store')->name('users.store');

	Route::get('roles', 'RoleController@index')->name('roles.index');
	Route::get('roles/create', 'RoleController@create')->name('roles.create');
	Route::post('roles', 'RoleController@store')->name('roles.store');
	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
	Route::put('roles/{role}', 'RoleController@update')->name('roles.update');
});

Route::middleware(['guest'])->group(function () {
	Route::get('login', 'LoginController@index')->name('login');
	Route::post('login', 'LoginController@login')->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
});

