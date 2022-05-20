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

