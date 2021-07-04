<?php

use App\Http\Controllers\DSCCController;
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

// Login
Route::get('login', 'UserController@index');
Route::get('/', 'UserController@index');
Route::get('logout', 'UserController@logout');

Route::post('login', 'UserController@login');
// Quản lý người dùng
Route::get('danhsachuser', 'UserController@getDanhSach');
Route::get('themuser', 'UserController@getThem');
Route::get('user/{id}', 'UserController@getByID');
Route::post('user/edit', 'UserController@edit');
Route::post('user/add', 'UserController@add');
Route::get('user/{id}/xoa', 'UserController@xoa');
// lọc
Route::get('danhsachuser/filter', 'UserController@filterDanhSach');


// Quản lý loại người dùng
Route::get('danhsachloaiuser', 'LoaiUserController@getDanhSach');
Route::get('themloaiuser', 'LoaiUserController@getThem');
Route::get('loaiuser/{id}', 'LoaiUserController@getByID');
Route::post('loaiuser/edit', 'LoaiUserController@edit');
Route::post('loaiuser/add', 'LoaiUserController@add');
Route::get('loaiuser/{id}/xoa', 'LoaiUserController@xoa');






// code phần học viên nữa sẽ đưa vào nhóm học viên sau nha <3
//Route::group(['prefix' => 'hocvien'], function () {
Route::get('themhocvien', 'HocVienController@getThem');
Route::get('danhsachhocvien', 'HocVienController@getDanhSach');

// get Location
Route::get('location/{id_TINH}', 'LocationController@load');

// get Danh sach lop
Route::get('danhsachlop/{id_nganhnghedaotao}', 'LopController@getAllByNNDT');

// CURD
Route::get('xoa/{id}', 'HocVienController@getXoa');
Route::get('hocvien/{id}', 'HocVienController@getByID');
Route::post('hocvien/edit', 'HocVienController@edit');
Route::post('hocvien/add', 'HocVienController@add');
Route::post('hocvientaods', 'HocVienController@getTaoDS');
//  });
// end hoc vien

// giao vien

Route::get('danhsachgiaovien', 'GiaoVienController@getDanhSach');
Route::get('themgiaovien', 'GiaoVienController@getThem');
Route::post('giaovien/add', 'GiaoVienController@postThem');

// DSCC

Route::get('danhsachcc', 'DSCCController@getDanhSach');
