<?php

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

Route::get('/', function () {
    return view('');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register_confirmation', function () {
    return view('auth/register_confirmation');
});

Route::get('/register_input', function () {
    return view('auth/register_input');
});

Route::get('/login_user', function () {
    return view('auth/login_user');
});

Route::get('/login_administrator', function () {
    return view('auth/login_administrator');
});


