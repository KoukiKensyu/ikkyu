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

Auth::routes();

Route::post('mypage/edit_confirmation', [UserController::class, 'update_user'])->name('mypage.edit_confirmation'); // mypage/edit_confirmation
Route::patch('mypage/edit_confirmation', [UserController::class, 'store'])->name('mypage.edit_store');
Route::get('/mypage/UserDelete', function () {
    return view('/mypage/UserDelete');
});


Route::get('/admin/UserIndex', function () {return view('admin/UserIndex');}); // 16.会員詳細表示
Route::get('/admin/UserDelete', function () {return view('admin/UserDelete');}); // 18.会員削除確認
Route::get('/admin/Memindex', function () {return view('admin/Memindex');}); // 15.会員管理
Route::get('/admin/UserUpdate', function () {return view('admin/UserUpdate');}); // 17.会員情報変更
Route::get('/admin/UserUpdate_confirmation', function () {return view('admin/UserUpdate_confirmation');}); // 17-2.会員情報変更確認

Route::get('/home', [HomeController::class, 'index'])->name('home'); // 1.トップページ toppage
Route::get('/home/index', [AdminHomecontroller::class, 'index'])->name('admin.home'); // 14.管理者ホーム home/index
Route::get('/admin/Memindex', [AdminHomecontroller::class, 'indexMem'])->name('admin.Memindex'); // 15.会員管理 admin/Memindex


// Administrator Login関連------------------------
Route::prefix('administrator')->group(function () {
    Route::post('/login', 'Auth\AdminLoginController@login')->name('administrator.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('administrator.logout');
    Route::get('/', 'AdministratorController@index')->name('administrator.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('administrator.login');
});


// 宿予約関連-------------------------------------
Route::prefix('reserve')->group(function () {
    Route::get('/show/{id}', [ReservationController::class, 'show'])->name('show'); // 10.宿予約 reserve/show
    Route::get('/edit/{id}', [ReservationController::class, 'edit'])->name('reserve.edit'); // 11.予約詳細 reserve/edit
    Route::post('/check', [ReservationController::class, 'check'])->name('reserve.check'); // 12.予約確認 reserve/check
    Route::post('/confirm', [ReservationController::class, 'confirm'])->name('reserve.confirm'); //13.予約完了 reserve/confirm
});

// ユーザーログイン画面関連----------------------
Route::get('/register_confirmation', function () {return view('auth/register_confirmation');});
Route::get('/register_input', function () {return view('auth/register_input');});
Route::get('/login_user', function () {return view('auth/login_user');});
Route::get('/login_administrator', function () {return view('auth/login_administrator');});
Route::get('/register_confirmation', function () {return view('auth/register_confirmation');});
Route::get('/register_input', function () {return view('auth/register_input');});
Route::get('/login_user', function () {return view('auth/login_user');});
Route::get('/login_administrator', function () {return view('auth/login_administrator');});


// 宿管理関連-----------------------------------
Route::get('/hotel_views/hotelManagement', [HotelController::class, 'index'])->name('hotels.index'); // 19.宿管理 hotel_views/hotelManagement
Route::get('/hotel_views/create', [HotelController::class, 'create'])->name('hotels.create');
Route::get('/hotel_views/storeConfirmation', [HotelController::class, 'createconfirm'])->name('hotels.createconfirm');
Route::post('/hotel_views/postConfirmation', [HotelController::class, 'postconfirm'])->name('hotels.postconfirm');
Route::get('/hotel_views/edit/{id}', [HotelController::class, 'edit'])->name('hotels.edit');
Route::post('/hotel_views/editConfirmation/{id}', [HotelController::class, 'editconfirm'])->name('hotels.editconfirm');
Route::patch('/hotel_views/editCompletion/{id}', [HotelController::class, 'update'])->name('hotels.update');
Route::get('/hotel_views/delete/{id}', [HotelController::class, 'destroyconfirm'])->name('hotels.destroyconfirm');
Route::delete('/hotel_views/destroy/{id}', [HotelController::class, 'destroy'])->name('hotels.destroy');
Route::get('/hotel_views/show/{id}', [HotelController::class, 'show'])->name('hotels.show');
Route::get('/hotel_views/create', [HotelController::class, 'create'])->name('hotels.create');
Route::post('/hotel_views/storeCompletion', [HotelController::class, 'store'])->name('hotels.store');
Route::post('/hotel_views/postConfirmation', [HotelController::class, 'postconfirm'])->name('hotels.postconfirm');
Route::get('/hotel_views/show/{id}', [HotelController::class, 'show'])->name('hotels.show');
Route::get('/hotel_views/edit/{id}', [HotelController::class, 'edit'])->name('hotels.edit');
Route::post('/hotel_views/storeCompletion', [HotelController::class, 'store'])->name('hotels.store');
Route::get('user_home/index', [HotelController::class, 'search'])->name('search');
Route::get('mypage/index', [UserController::class, 'index'])->name('mypage.index');
Route::get('mypage/edit', [UserController::class, 'edit_user']);

//ユーザー関連-----------------------------------
Route::get('/admin/UserIndex/{id}', [UserController::class, 'show'])->name('show'); // 16.会員詳細表示 admin/UserIndex
Route::get('/admin/UserDelete/{id}', [UserController::class, 'Dconfirm'])->name('Dconfirm'); // 18.会員削除確認 admin/UserDelete
Route::delete('/admin/UserIndex/{id}', [UserController::class, 'destroy'])->name('destroy'); // 18.会員削除確認 admin/UserDelete(削除ボタン)
Route::get('/admin/Memindex', [UserController::class, 'search'])->name('Usearch'); // 15.会員管理 admin/MemIndex
Route::get('/admin/UserUpdate/{id}', [UserController::class, 'edit'])->name('edit'); // 17.会員情報変更 admin/UserUpdate
Route::post('/admin/UserUpdate_confirmation/{id}', [UserController::class, 'confirm'])->name('confirm'); // 17-2.会員変更確認 admin/UserUpdate_confirmation
Route::patch('/admin/UserIndex/{id}', [UserController::class, 'update'])->name('update'); // 17-2.会員変更確認(確定ボタン) admin/UserUpdate_confirmation
