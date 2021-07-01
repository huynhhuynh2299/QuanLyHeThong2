<?php

namespace App\Http\Controllers;

use App\Models\cutruhv;
use App\Models\doituong;
use App\Models\hocvien;
use App\Models\huyen;
use App\Models\tinh;
use App\Models\xa;
use App\Models\hoctailop;
use App\Models\khoahoc;
use App\Models\lop;
use App\Models\nguoiquen;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class HocVienController extends Controller
{
    // CÁC PHƯƠNG THỨC TRUY VẤN //

    // truy vấn toàn bộ bảng
    public function getAll()
    {
        return hocvien::all();
    }

    // truy vấn bằng id của bảng
    public function getByID(int $id)
    {
        // Thông tin học viên
        $hocvien = hocvien::find($id);
        $cutru = hocvien::find($id)->lay_cutruhv;
        foreach ($cutru as $key) :
            if ($key->THUONG_TRU == "YES") {

                $dcThuongTru = $key;

                $xa_tr = xa::find($key->id_XA);
                $huyen_tr = xa::find($key->id_XA)->lay_huyen;
                $tinh_tr = huyen::find($huyen_tr->id)->lay_tinh;

                $dcThuongTru->XA = $xa_tr->TEN_XA;
                $dcThuongTru->HUYEN = $huyen_tr->TEN_HUYEN;
                $dcThuongTru->TINH = $tinh_tr->TEN_TINH;

                $dcThuongTru->id_XA = $xa_tr->id;
                $dcThuongTru->id_HUYEN = $huyen_tr->id;
                $dcThuongTru->id_TINH = $tinh_tr->id;
            }
            if ($key->THUONG_TRU == "NO") {
                $dcNguyenQuan = $key;

                $xa_nq = xa::find($key->id_XA);
                $huyen_nq = xa::find($key->id_XA)->lay_huyen;
                $tinh_nq = huyen::find($huyen_nq->id)->lay_tinh;

                $dcNguyenQuan->XA = $xa_nq->TEN_XA;
                $dcNguyenQuan->HUYEN = $huyen_nq->TEN_HUYEN;
                $dcNguyenQuan->TINH = $tinh_nq->TEN_TINH;

                $dcNguyenQuan->id_XA = $xa_nq->id;
                $dcNguyenQuan->id_HUYEN = $huyen_nq->id;
                $dcNguyenQuan->id_TINH = $tinh_nq->id;
            }
        endforeach;

        // Thông tin chứng chỉ
        $chungchi = hocvien::find($id)->lay_dscc;
       $nguoiquen = hocvien::find($id)->lay_nguoiquen;
        $response = $hocvien;

        $response->THUONG_TRU = $dcThuongTru;
        $response->NGUYEN_QUAN = $dcNguyenQuan;
        $response->DS_CHUNGCHI = $chungchi;
        $response->DS_NGUOIQUEN  = $nguoiquen;

        return $response;
    }

  

   
    public function getDanhSach()
    {
        $hocvien_all = hocvien::all();
        $cutruhv = new cutruhv();
        $xa_all = xa::all();


        $tinh_all = tinh::all();
        $huyen_all = huyen::all();
        $xa_all = xa::all();
        $i = 1;
        $tailop_all = hoctailop::all();
        
        $doituong_all = doituong::all();
        $khoahoc_all = khoahoc::all();
        $thuoclop_all = lop::all();
        return view(
            'Admin.QuanLyHocVien.DanhSach',
            [
                'cutruhv_all' => $cutruhv->getAll(),
                 'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'doituong_all' => $doituong_all,
                'quanlyhocvien' => $hocvien_all,
                'xa' => $xa_all,
                'stt'=>$i,
                'tai_lop'=>$tailop_all,
                'thuoc_lop'=>$thuoclop_all,
                'thuockhoahoc'=>$khoahoc_all
            ]
        );
    }

    public function getThem()
    {
        $hocvien_all = hocvien::all();

        $tinh_all = tinh::all();
        $huyen_all = huyen::all();
        $xa_all = xa::all();

        $doituong_all = doituong::all();

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

        $hocvien = new hocvien();

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
        $quanlyhocvien = hocvien::find($id);
        $quanlyhocvien->delete();
        return view('Admin/QuanLyHocVien/DanhSach');
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

    
        $hocvien = new hocvien();
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

   public function getTaoDS(Request $request)
    {    
        $id_lop = $request->id_lop;
        $xa_all = xa::all();


        $tinh_all = tinh::all();
        $huyen_all = huyen::all();
        $xa_all = xa::all();
        $i = 1;
        $tailop_all = hoctailop::all();
        
        $doituong_all = doituong::all();
        $khoahoc_all = khoahoc::all();
        $thuoclop_all = lop::find($id_lop)->lay_hocvien;
        $thuoclop_all2 = lop::all();

        $hocvien_all = hocvien::all();
        $cutruhv = new cutruhv();
        $xa_all = xa::all();
        $tailop_all = hoctailop::all();
        

        return view(
            'Admin.QuanLyHocVien.TaoDanhSach',
            [   
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'doituong_all' => $doituong_all,
                'quanlyhocvien' => $thuoclop_all,
                'xa' => $xa_all,
                'stt'=>$i,
                'id_lop'=>$id_lop,
                'tai_lop'=>$tailop_all,
                'thuoc_lop'=>$thuoclop_all2,
                'thuockhoahoc'=>$khoahoc_all



                
            ]
        );
    }
    public function edit(Request $request)
    {
        // validation
        $request->validate([
            'id' => 'required',
            // 'id_DOITUONG' => 'required',

            'HV_HOTEN' => 'required|max:50',
            'HV_CMND' => 'required',
            'HV_DANTOC' => 'required',
            'HV_HOCVAN' => 'required',

            'HV_NGAYSINH' => 'required',
            'HV_GIOITINH' => 'required',
            'HV_SDT' => 'required|numeric',

            'NGUYENQUAN_TINH' => 'required',
            'NGUYENQUAN_HUYEN' => 'required',
            'NGUYENQUAN_XA' => 'required',
            'HV_DIACHI_NQ' => 'required',

            'THUONGTRU_TINH' => 'required',
            'THUONGTRU_HUYEN' => 'required',
            'THUONGTRU_XA' => 'required',
            'HV_DIACHI_TT' => 'required',


        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'numeric' => ':attribute phải nhập chỉ số',
        ], [
            // 'id_DOITUONG' => 'Đối tượng',

            'HV_HOTEN' => 'Họ tên học viên',
            'HV_CMND' => 'CMDN/CCCD',
            'HV_DANTOC' => 'Dân tộc',
            'HV_HOCVAN' => 'Học vấn',

            'HV_NGAYSINH' => 'Ngày sinh',
            'HV_GIOITINH' => 'Giới tính',
            'HV_SDT' => 'Số điện thoại',

            'NGUYENQUAN_TINH' => 'Tỉnh/Thành phố',
            'NGUYENQUAN_HUYEN' => 'Quận/Huyện',
            'NGUYENQUAN_XA' => 'Phường/Xã',
            'HV_DIACHI_NQ' => 'Địa chỉ nguyên quán',

            'THUONGTRU_TINH' => 'Tỉnh/Thành phố',
            'THUONGTRU_HUYEN' => 'Quận/Huyện',
            'THUONGTRU_XA' => 'Phường/Xã',
            'HV_DIACHI_TT' => 'Địa chỉ nguyên quán',
        ]);


        $hocvien = hocvien::where('id',$request->id)->update([
            'id_DOITUONG' => $request->id_DOITUONG,

            'HV_HOTEN' => $request->HV_HOTEN,
            'HV_CMND' => $request->HV_CMND,
            'HV_DANTOC' => $request->HV_DANTOC,
            'HV_HOCVAN' => $request->HV_HOCVAN,
            
            'HV_NGAYSINH' => $request->HV_NGAYSINH,
            'HV_GIOITINH' => $request->HV_GIOITINH,
            'HV_SDT' => $request->HV_SDT,
        ]);

        $cutruhv_nguyenquan = cutruhv::where('id',$request->id_HV_DIACHI_NQ)->update([
            'DIA_CHI' => $request->HV_DIACHI_NQ,
            'id_XA' => $request->NGUYENQUAN_XA,
        ]);

        $cutruhv_thuongtru = cutruhv::where('id',$request->id_HV_DIACHI_TT)->update([
            'DIA_CHI' => $request->HV_DIACHI_TT,
            'id_XA' => $request->THUONGTRU_XA,
        ]);



      



        return Redirect::to('danhsachhocvien');
    }
}
