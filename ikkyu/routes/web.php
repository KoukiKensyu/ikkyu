<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomecontroller;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanConroller;

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

Route::get('/home', [HomeController::class, 'index'])->name('home'); // 1.トップページ toppage


// ユーザーログイン画面関連---------------------- 1~5
Route::get('/register_confirmation', function () {return view('auth/register_confirmation');});
Route::get('/register_input', function () {return view('auth/register_input');});
Route::get('/login_user', function () {return view('auth/login_user');});
Route::get('/login_administrator', function () {return view('auth/login_administrator');});
Route::get('/register_confirmation', function () {return view('auth/register_confirmation');});
Route::get('/register_input', function () {return view('auth/register_input');});
Route::get('/login_user', function () {return view('auth/login_user');});
Route::get('/login_administrator', function () {return view('auth/login_administrator');});
// パスワード変更
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');



// Administrator Login関連------------------------
Route::prefix('administrator')->group(function () {
    Route::post('/login', 'Auth\AdminLoginController@login')->name('administrator.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('administrator.logout');
    Route::get('/', 'AdministratorController@index')->name('administrator.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('administrator.login');
});


// 会員ホーム、マイページ------------------------ 6~9
Route::get('user_home/index',[HotelController::class, 'search'])->name('search'); // 6.会員ホーム(宿検索) user_home/index
Route::get('mypage/index', [UserController::class,'index'])->name('mypage.index'); // 7.マイページ表示 mypage/index
Route::get('mypage/edit', [UserController::class,'edit_user'])->name('mypage.edit'); // 8.1. 登録情報変更 mypage/edit
Route::post('mypage/edit_confirmation', [UserController::class, 'update_user'])->name('mypage.edit_confirmation'); // mypage/edit_confirmation
Route::patch('mypage/edit_confirmation', [UserController::class, 'store'])->name('mypage.edit_store');
Route::get('mypage/UserDelete', [UserController::class,'delete_user_confirm']);//退会確認画面を表示
Route::delete('/', [UserController::class,'destroy_user'])->name('mypage.delete');//退会処理
Route::get('mypage/password_change_completion', [UserController::class, 'password_change_completion'])->name('mypage.password_change_completion');// パスワード変更完了画面


// 宿予約関連-------------------------------------10~13
Route::prefix('reserve')->group(function () {
    Route::get('/show/{id}', [ReservationController::class, 'show'])->name('show'); // 10.宿予約 reserve/show
    Route::get('/edit/{id}', [ReservationController::class, 'edit'])->name('reserve.edit'); // 11.予約詳細 reserve/edit
    Route::post('/check', [ReservationController::class, 'check'])->name('reserve.check'); // 12.予約確認 reserve/check
    Route::post('/confirm', [ReservationController::class, 'confirm'])->name('reserve.confirm'); //13.予約完了 reserve/confirm
});


// 管理者ホーム--------------------------------14
Route::get('/home/index', [AdminHomecontroller::class, 'index'])->name('admin.home'); // 14.管理者ホーム home/index


// 管理者、会員管理---------------------------15~18
Route::prefix('admin')->group(function () {
    Route::get('/user_index', [UserController::class, 'search'])->name('admin.user_index'); // 15.会員管理 admin/user_index
    Route::get('/user_detail/{id}', [UserController::class, 'show'])->name('admin.user_detail'); // 16.会員詳細表示 admin/user_detail
    Route::get('/user_edit/{id}', [UserController::class, 'edit'])->name('admin.user_edit'); // 17.会員情報変更 admin/user_edit
    Route::post('/user_edit_confirm/{id}', [UserController::class, 'confirm'])->name('admin.user_edit_confirm'); // 17-2.会員変更確認 admin/user_edit_confirm
    Route::patch('/user_detail/{id}', [UserController::class, 'update'])->name('admin.user_update'); // 17-2.会員変更確認(確定ボタン) admin/user_edit_confirm
    Route::get('/user_delete/{id}', [UserController::class, 'delete_confirm'])->name('admin.user_delete'); // 18.会員削除確認 admin/user_delete
    Route::delete('/user_detail/{id}', [UserController::class, 'destroy'])->name('destroy'); // 18.会員削除確認 admin/user_delete(削除ボタン)
});


// 宿管理関連-----------------------------------
Route::prefix('hotel_views')->group(function(){
    Route::get('/index',[HotelController::class, 'index'])->name('hotels.index'); //19 宿管理 hotel_views/hotelManagement
    Route::get('/show/{id}',[HotelController::class, 'show'])->name('hotels.show'); //20 宿詳細 hotel_views/show
    Route::get('/edit/{id}',[HotelController::class,'edit'])->name('hotels.edit');//21-1 宿詳細変更 hotel_views/edit
    Route::get('/delete/{id}',[HotelController::class,'hotels_delete'])->name('hotel.delete');//21-2 宿削除確認 hotel_views/hotelDelete
    Route::delete('/destroy/{id}',[HotelController::class,'destroy'])->name('hotels.destroy');// 21-2. 削除機能 hotel_views/hotelManagement
    Route::post('/editConfirmation/{id}',[HotelController::class,'editconfirm'])->name('hotels.editconfirm');//22 宿詳細変更確認 hotel_views/editConfirmation
    Route::post('/postConfirmation',[HotelController::class,'postconfirm'])->name('hotels.postconfirm');//22-2 変更・登録完了画面 hotel_views/storeCompletion
    Route::patch('/editCompletion/{id}',[HotelController::class,'editCompletion'])->name('hotels.editCompletion');// 22-2? DBにデータを登録 hotel_views/editCompletion
    Route::get('/create',[HotelController::class, 'create'])->name('hotels.create'); //23 宿新規登録 hotel_views/create
    Route::get('/storeConfirmation',[HotelController::class,'createconfirm'])->name('hotels.createconfirm'); //24 宿新規登録確認画面(いらない？) hotel_views/storeConfirmation
    Route::post('/postConfirmation',[HotelController::class,'postconfirm'])->name('hotels.postconfirm'); //24 宿新規登録確認 hotel_views/storeConfirmation
    Route::post('/storeCompletion',[HotelController::class,'storeCompletion'])->name('hotels.storeCompletion'); // 24-2. 宿新規登録後
});

