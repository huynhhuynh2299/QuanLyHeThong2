<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuanLyHocVien;
use App\Models\QuanLyDoiTuong;
use App\Models\QuanLyDSCC;
use App\Models\QuanLyHuyen;
use App\Models\QuanLyTinh;
use App\Models\QuanLyXa;
use Illuminate\Support\Facades\Redirect;

class DSCCController extends Controller
{

    public function getDanhSach()
    {
        $danhsach_all = QuanLyDSCC::all();

        $tinh_all = QuanLyTinh::all();
        $huyen_all = QuanLyHuyen::all();
        $xa_all = QuanLyXa::all();

        $doituong_all = QuanLyDoiTuong::all();

        return view(
            'Admin.QuanLyHocVien.DanhSach',
            [
                'quanlydanhsach' => $danhsach_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'doituong_all' => $doituong_all,
            ]
        );
    }

    public function getThem()
    {
        $hocvien_all = QuanLyHocVien::all();

        $tinh_all = QuanLyTinh::all();
        $huyen_all = QuanLyHuyen::all();
        $xa_all = QuanLyXa::all();

        $doituong_all = QuanLyDoiTuong::all();

        return view(
            'Admin.QuanLyHocVien.Them',
            [
                'quanlyhocvien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'doituong_all' => $doituong_all,
            ]
        );
    }


    public function postThem(Request $request)
    {

        $hocvien = new QuanLyHocVien;

        $hocvien->HV_MASO = $request->maso;
        $hocvien->HV_CMND = $request->cmnd;
        $hocvien->TEN_TINH = $request->tinh;
        $hocvien->TEN_HUYEN = $request->huyen;
        $hocvien->TEN_XA = $request->xa;
        $hocvien->DT_MASO = $request->madoituong;
        $hocvien->HV_HOTEN = $request->tenhv;
        $hocvien->HV_SDT = $request->sodienthoai;
        $hocvien->HV_NGAYSINH = $request->ngaysinh;
        $hocvien->HV_GIOITINH = $request->gioitinh;
        $hocvien->save();
        return view('Admin/QuanLyHocVien/Them');
    }

    public function getXoa($id)
    {
        $quanlyhocvien = QuanLyHocVien::find($id);
        $quanlyhocvien->delete();
        return view('Admin/QuanLyHocVien/DanhSach');
    }


    public function show($id)
    {
        $getById = QuanLyHocVien::where('HV_MASO', $id)->get();
        return response()->json($getById, 200);
    }

    public function add(Request $request)
    {
        // validation

        $request->validate([
            'madoituong' => 'required',

            'nguyenquan_tinh' => 'required',
            'nguyenquan_huyen' => 'required',
            'nguyenquan_xa' => 'required',

            'ngaysinh' => 'required',
            'tenhv' => 'required|max:50',
            'cmnd' => 'required',
            'gioitinh' => 'required',
            'sodienthoai' => 'required|numeric',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'numeric' => ':attribute phải nhập chỉ số',
            'unique' => ':attribute đã tồn tại ',
        ], [
            'tenhv' => 'Họ tên học viên',
            'cmnd' => 'CMDN/CCCD',
            'nguyenquan_tinh' => 'Tỉnh/Thành phố',
            'nguyenquan_huyen' => 'Quận/Huyện',
            'nguyenquan_xa' => 'Phường/Xã',
            'ngaysinh' => 'Ngày sinh',
            'gioitinh' => 'Giới tính',
            'sodienthoai' => 'Số điện thoại',
        ]);

        // $hocvien = QuanLyHocVien::where('HV_MASO', $request->maso)->update([
        //     'HV_CMND' => $request->cmnd,
        //     'TEN_TINH' => $request->nguyenquan_tinh,
        //     'TEN_HUYEN' => $request->nguyenquan_huyen,
        //     'TEN_XA' => $request->nguyenquan_xa,
        //     'DT_MASO' => $request->madoituong,
        //     'HV_HOTEN' => $request->tenhv,
        //     'HV_SDT' => $request->sodienthoai,
        //     'HV_NGAYSINH' => $request->ngaysinh,
        //     'HV_GIOITINH' => $request->gioitinh,
        // ]);

        $hocvien = new QuanLyHocVien();
        $hocvien->HV_MASO = $request->cmnd;
        $hocvien->HV_CMND = $request->cmnd;
        $hocvien->TEN_TINH  = $request->nguyenquan_tinh;
        $hocvien->TEN_HUYEN = $request->nguyenquan_huyen;
        $hocvien->TEN_XA = $request->nguyenquan_xa;
        $hocvien->DT_MASO = $request->madoituong;
        $hocvien->HV_HOTEN  = $request->tenhv;
        $hocvien->HV_SDT  = $request->sodienthoai;
        $hocvien->HV_NGAYSINH  = $request->ngaysinh;
        $hocvien->HV_GIOITINH  = $request->gioitinh;

        $hocvien->save();

        return Redirect::to('danhsachhocvien');
    }

    public function edit(Request $request)
    {
        // validation

        $request->validate([
            'maso' => 'required',
            'madoituong' => 'required',

            'nguyenquan_tinh' => 'required',
            'nguyenquan_huyen' => 'required',
            'nguyenquan_xa' => 'required',

            'ngaysinh' => 'required',
            'tenhv' => 'required|max:50',
            'cmnd' => 'required',
            'gioitinh' => 'required',
            'sodienthoai' => 'required|numeric',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'numeric' => ':attribute phải nhập chỉ số',
            'unique' => ':attribute đã tồn tại ',
        ], [
            'tenhv' => 'Họ tên học viên',
            'cmnd' => 'CMDN/CCCD',
            'nguyenquan_tinh' => 'Tỉnh/Thành phố',
            'nguyenquan_huyen' => 'Quận/Huyện',
            'nguyenquan_xa' => 'Phường/Xã',
            'ngaysinh' => 'Ngày sinh',
            'gioitinh' => 'Giới tính',
            'sodienthoai' => 'Số điện thoại',
        ]);

        $hocvien = QuanLyHocVien::where('HV_MASO', $request->maso)->update([
            'HV_CMND' => $request->cmnd,
            'TEN_TINH' => $request->nguyenquan_tinh,
            'TEN_HUYEN' => $request->nguyenquan_huyen,
            'TEN_XA' => $request->nguyenquan_xa,
            'DT_MASO' => $request->madoituong,
            'HV_HOTEN' => $request->tenhv,
            'HV_SDT' => $request->sodienthoai,
            'HV_NGAYSINH' => $request->ngaysinh,
            'HV_GIOITINH' => $request->gioitinh,
        ]);

        return Redirect::to('danhsachhocvien');
    }
}
