<?php

namespace App\Http\Controllers;

use App\Models\hoctailop;
use App\Models\hocvien;
use App\Models\lop;
use App\Models\khoahoc;
class hoctailopController extends Controller
{
   //Hiện thị Danh Sách Hồ Sơ
   public function dsHoSo(int $id_hv){
       $hoctailop = hoctailop::where('id_HOCVIEN',$id_hv)->get();
       $lop = lop::all();
       $hocvien = hocvien::all();
       $khoahoc = khoahoc::all();
       return view('Admin\QuanLyHocVien\HoSo',['hoctailop'=>$hoctailop,
        'lop'=>$lop,
        'hocvien'=>$hocvien,
        'khoahoc'=>$khoahoc]);

   }

 }
