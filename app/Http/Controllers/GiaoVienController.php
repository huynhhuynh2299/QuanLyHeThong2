<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\QuanLyDoiTuong;
use App\Models\QuanLyGiaoVien;
use App\Models\QuanLyHuyen;
use App\Models\QuanLyTinh;
use App\Models\QuanLyXa;
use Illuminate\Support\Facades\Redirect;

class GiaoVienController extends Controller
{
    // Danh sach
    public function getDanhSach()
    {
        $hocvien_all = QuanLyGiaoVien::all();

        $tinh_all = QuanLyTinh::all();
        $huyen_all = QuanLyHuyen::all();
        $xa_all = QuanLyXa::all();


        return view(
            'Admin.QuanLyGiaoVien.DanhSach',
            [
                'quanlygiaovien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
            ]
        );
    }

    public function getThem()
    {
        $hocvien_all = QuanLyGiaoVien::all();

        $tinh_all = QuanLyTinh::all();
        $huyen_all = QuanLyHuyen::all();
        $xa_all = QuanLyXa::all();

        return view(
            'Admin.QuanLyGiaoVien.Them',
            [
                'quanlygiaovien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
            ]
        );
    }
    public function postThem(Request $request)
    {

        $giaovien = new QuanLyGiaoVien;

        $giaovien->GV_MASO = $request->gv_mk;
        $giaovien->GV_HOTEN = $request->gv_ten;
        $giaovien->GV_TRINHDO = $request->gv_trinhdo;
        $giaovien->GV_SDT = $request->gv_sodienthoai;




        $giaovien->TEN_TINH = $request->gv_tinh;
        $giaovien->TEN_HUYEN = $request->gv_huyen;
        $giaovien->TEN_XA = $request->gv_xa;
        $giaovien->GV_GIOITINH = $request->gv_gioitinh;

        $giaovien->GV_LYLICH = $request->gv_ten;
        $giaovien->GV_CTDT = $request->gv_ten;
        $giaovien->GV_MATKHAU = $request->gv_mk;
        $giaovien->save();

        return Redirect::to('danhsachgiaovien');
    }
    public function getXoaGV($id)
    {
        $quanlygiaovien = QuanLyGiaoVien::find($id);
        $quanlygiaovien->delete();
        return view('Admin/QuanLyGiaoVien/DanhSach');
    }
    public function postSuaGV(Request $request)
    {

        $giaovien = new QuanLyGiaoVien;

        $giaovien->GV_MASO = $request->gv_maso;
        $giaovien->GV_TENTINH = $request->gv_tinh;
        $giaovien->GV_TENHUYEN = $request->gv_huyen;
        $giaovien->GV_TENXA = $request->gv_xa;
        $giaovien->GV_HOTEN = $request->gv_ten;
        $giaovien->GV_GIOITINH = $request->gv_gioitinh;
        $giaovien->GV_SDT = $request->gv_sodienthoai;
        $giaovien->GV_TRINHDO = $request->gv_trinhdo;
        $giaovien->GV_LYLICH = $request->gv_lylich;
        $giaovien->GV_CTDT = $request->gv_ctdt;
        $giaovien->GV_MATKHAU = $request->gv_mk;
        $giaovien->save();
        return view('Admin/QuanLyGiaoVien/DanhSach');
    }
}   
