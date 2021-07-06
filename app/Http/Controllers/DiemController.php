<?php

namespace App\Http\Controllers;

use App\Models\diem;
use App\Models\hocvien;
use App\Models\lop;
use Illuminate\Http\Request;

class diemController extends Controller
{
    // CÁC PHƯƠNG THỨC TRUY VẤN //

   // Hiện thị bảng điểm của học viên
   public function BangDiem(Request $yeucau){
     $id_hv = $yeucau->id_hv;
     $id_lop = $yeucau->id_lop;
     $diem = diem::all()->where('id_HOCVIEN',$id_hv)->where('id_LOP',$id_lop);
     $ten_hv = hocvien::select('HV_HOTEN')->where('id',$id_hv)->first();
     $lop = lop::select('L_MASO')->where('id',$id_lop)->first();
     return view('Admin\QuanLyHocVien\DSDiem',
          [
               'bangdiem'=>$diem,
               'ten_hv'=>$ten_hv->HV_HOTEN,
               'lop'=>$lop->L_MASO
          ]);
   }
}
