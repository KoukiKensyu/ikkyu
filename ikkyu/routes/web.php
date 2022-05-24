<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomecontroller;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HotelController;




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


Route::get('user_home/index',[App\Http\Controllers\HotelController::class, 'search'])->name('search');
// Route::get('/user_home/index', function () {
    // return view('user_home/index');
// });

/*
Route::get('mypage/index', function () {
    return view('mypage/index');
});
*/
Route::get('mypage/index', [App\Http\Controllers\UserController::class,'index'])->name('mypage.index');

/*
Route::get('mypage/edit', function () {
    return view('mypage/edit');
});
*/
Route::get('mypage/edit', [App\Http\Controllers\UserController::class,'edit_user']);

/*
Route::get('mypage/edit_confirmation', function () {
    return view('mypage/edit_confirmation');
});
*/
Route::post('mypage/edit_confirmation', [App\Http\Controllers\UserController::class,'update_user'])->name('mypage.edit_confirmation');

Route::patch('mypage/edit_confirmation',[App\Http\Controllers\UserController::class,'store'])->name('mypage.edit_store');

Route::get('/mypage/UserDelete', function () {
    return view('/mypage/UserDelete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/index',[App\Http\Controllers\AdminHomecontroller::class, 'index']);
Route::get('/admin/Memindex',[\App\Http\Controllers\AdminHomecontroller::class, 'indexMem'])->name('admin.Memindex');
Route::get('/admin/Hotelindex',[\App\Http\Controllers\AdminHomecontroller::class, 'indexHotel'])->name('admin.Hotelsindex');
//Route::get('/hotel_views/show',[\App\Http\Controllers\AdminHomecontroller::class, 'showHotel'])->name('showHotel');
//Route::get('/hotel_views/edit',[\App\Http\Controllers\AdminHomecontroller::class, 'editHotel'])->name('editHotel');

// Administrator関連
Route::prefix('administrator')->group(function() {
    Route::post('/login', 'Auth\AdminLoginController@login')->name('administrator.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('administrator.logout');
    Route::get('/', 'AdministratorController@index')->name('administrator.dashboard');
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('administrator.login');
}) ;

//宿予約関連
Route::resource('reservations', ReservationController::class);
Route::get('/reserve/show/{id}',[\App\Http\Controllers\ReservationController::class, 'show'])->name('show');
Route::post('/reserve/store',[\App\Http\Controllers\ReservationController::class, 'store'])->name('reserve.store');
Route::post('/reserve/check',[\App\Http\Controllers\ReservationController::class, 'check'])->name('reserve.check');
Route::get('/reserve/edit/{id}',[\App\Http\Controllers\ReservationController::class, 'edit'])->name('reserve.edit');
Route::post('/reserve/confirm',[\App\Http\Controllers\ReservationController::class, 'confirm'])->name('reserve.confirm');


// Route::get('/user_home/index', function () {return view('/user_home/index');});
Route::get('/register_confirmation', function () {return view('auth/register_confirmation');});
Route::get('/register_input', function () {return view('auth/register_input');});
Route::get('/login_user', function () {return view('auth/login_user');});
Route::get('/login_administrator', function () {return view('auth/login_administrator');});
//Route::get('/hotel_views/hotelManagement', function () {return view('/hotel_views/hotelManagement');});
// Route::get('/user_home/index', function () {
    // return view('/user_home/index');
// });
Route::get('/hotel_views/hotelManagement', [App\Http\Controllers\HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotel_views/create',[App\Http\Controllers\HotelController::class, 'create'])->name('hotels.create');


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
/*Route::get('/hotel_views/hotelManagement', function () {
    return view('/hotel_views/hotelManagement');
});
Route::get('/hotel_views/store', function () {
    return view('/hotel_views/store');
});
/*Route::get('/hotel_views/storeConfirmation', function () {
    return view('/hotel_views/storeConfirmation');
});
Route::get('/hotel_views/storeCompletion', function () {
    return view('/hotel_views/storeCompletion');
});
Route::get('hotel_views/hotelDelete', function () {
    return view('hotel_views/hotelDelete');
});
Route::get('/hotel_views/editConfirmation', function () {
    return view('/hotel_views/editConfirmation');
});
Route::get('/hotel_views/editCompletion', function () {
    return view('/hotel_views/editCompletion');});
*/

Route::get('/admin/UserIndex/{id}',[App\Http\Controllers\UserController::class, 'show'])->name('show');
// Route::get('/admin/UserIndex', function () {return view('admin/UserIndex');});
Route::get('/admin/UserDelete/{id}',[App\Http\Controllers\UserController::class, 'Dconfirm'])->name('Dconfirm');
Route::delete('/admin/UserIndex/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');

Route::get('/admin/UserIndex', function () {return view('admin/UserIndex');});
Route::get('/admin/UserDelete', function () {return view('admin/UserDelete');});
Route::get('/admin/Memindex', function () {return view('admin/Memindex');});
Route::get('/admin/UserUpdate', function () {return view('admin/UserUpdate');});
Route::get('/admin/UserUpdate_confirmation', function () {return view('admin/UserUpdate_confirmation');});

//523新規
Route::get('/hotel_views/hotelManagement',[HotelController::class, 'index'])->name('hotels.index'); //hotelの詳細画面
Route::get('/hotel_views/show/{id}',[HotelController::class, 'show'])->name('hotels.show');
Route::get('/hotel_views/create',[HotelController::class, 'create'])->name('hotels.create');
Route::post('/hotel_views/storeCompletion',[HotelController::class,'store'])->name('hotels.store');

Route::get('/hotel_views/storeConfirmation',[HotelController::class,'createconfirm'])->name('hotels.createconfirm');
Route::post('/hotel_views/postConfirmation',[HotelController::class,'postconfirm'])->name('hotels.postconfirm');

Route::get('/hotel_views/edit/{id}',[HotelController::class,'edit'])->name('hotels.edit');
Route::post('/hotel_views/editConfirmation/{id}',[HotelController::class,'editconfirm'])->name('hotels.editconfirm');
Route::patch('/hotel_views/editCompletion/{id}',[HotelController::class,'update'])->name('hotels.update');
Route::get('/hotel_views/delete/{id}',[HotelController::class,'destroyconfirm'])->name('hotels.destroyconfirm');
Route::delete('/hotel_views/destroy/{id}',[HotelController::class,'destroy'])->name('hotels.destroy');

Route::get('/admin/Memindex',[App\Http\Controllers\UserController::class, 'search'])->name('Usearch');
// Route::get('/admin/Memindex', function () {return view('admin/Memindex');});

Route::get('/admin/UserUpdate/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('edit');
// Route::get('/admin/UserUpdate', function () {return view('admin/UserUpdate');});
Route::post('/admin/UserUpdate_confirmation/{id}', [App\Http\Controllers\UserController::class, 'confirm'])->name('confirm');
Route::patch('/admin/UserIndex/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');

Route::post('/hotel_views/postConfirmation',[HotelController::class,'postconfirm'])->name('hotels.postconfirm');
Route::get('/hotel_views/show/{id}',[HotelController::class, 'show'])->name('hotels.show');
Route::get('/hotel_views/edit/{id}',[HotelController::class,'edit'])->name('hotels.edit');
Route::post('/hotel_views/storeCompletion',[HotelController::class,'store'])->name('hotels.store');
