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

// Quản lý loại hình đào tạo
Route::get('danhsachLHDT', 'LHDTController@getDanhSach');
Route::get('themLHDT', 'LHDTController@getThem');
Route::get('LHDT/{id}', 'LHDTController@getByID');
Route::post('LHDT/edit', 'LHDTController@edit');
Route::post('LHDT/add', 'LHDTController@add');
Route::get('LHDT/{id}/xoa', 'LHDTController@xoa');



 //NHÓM HỌC VIÊN
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

Route::get('in_pdf','HocVienController@getIN');
Route::post('hoso/pdf','HocVienController@inpdf');
Route::post('loc/pdf','HocVienController@inpdf');
// DSDIEM CỦA HỌC VIÊN

Route::post('dsbangdiem','DiemController@BangDiem');

// HIỆN THỊ DS HỒ SƠ HỌC VIÊN
Route::get('hoso/{id_hv}','hoctailopController@dsHoSo');
//  });
// end hoc vien
// timkiemhoc vien
Route::get('timkiemhocvien','HocVienController@timkiemhocvien');
Route::post('timkiemhocvien2','HocVienController@timkiemhocvien2');
Route::get('TRUNGTAM','HocVienController@getkichhoat');

//END NHÓM HỌC VIÊN




// giao vien

Route::get('danhsachgiaovien', 'GiaoVienController@getDanhSach');
Route::get('themgiaovien', 'GiaoVienController@getThem');
Route::post('giaovien/add', 'GiaoVienController@postThem');

// DSCC

Route::get('danhsachcc', 'DSCCController@getDanhSach');
