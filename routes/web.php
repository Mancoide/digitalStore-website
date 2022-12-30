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
	Route::resource('users', \App\Http\Controllers\UserController::class);
	Route::resource('creditTransactions', \App\Http\Controllers\CreditTransactionController::class);
	Route::resource('clients', \App\Http\Controllers\ClientController::class);
	Route::resource('roles', \App\Http\Controllers\RoleController::class);

	Route::resource('currencies', \App\Http\Controllers\CurrencyController::class);
	Route::resource('categories', \App\Http\Controllers\CategoryController::class);

});

Route::middleware(['guest'])->group(function () {
	Route::get('login', 'LoginController@index')->name('login');
	Route::post('login', 'LoginController@login')->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
});

