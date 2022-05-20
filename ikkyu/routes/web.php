<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomecontroller;



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
    return view('toppage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/index',[App\Http\Controllers\AdminHomecontroller::class, 'index']);
Route::get('/admin/Memindex',[\App\Http\Controllers\AdminHomecontroller::class, 'indexMem'])->name('admin.Memindex');
Route::get('/admin/Hotelindex',[\App\Http\Controllers\AdminHomecontroller::class, 'indexHotel'])->name('admin.Hotelsindex');
Route::get('/reserve/show',[\App\Http\Controllers\AdminHomecontroller::class, 'show'])->name('show');
Route::get('/reserve/store',[\App\Http\Controllers\AdminHomecontroller::class, 'store'])->name('store');
Route::get('/reserve/check',[\App\Http\Controllers\AdminHomecontroller::class, 'check'])->name('check');
Route::get('/reserve/confirm',[\App\Http\Controllers\AdminHomecontroller::class, 'confirm'])->name('confirm');

Route::get('/user_home/index', function () {
    return view('/user_home/index');
});

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
Route::get('/hotel_views/hotelManagement', function () {
    return view('/hotel_views/hotelManagement');
});
Route::get('/hotel_views/store', function () {
    return view('/hotel_views/store');
});
Route::get('/hotel_views/storeConfirmation', function () {
    return view('/hotel_views/storeConfirmation');
});



