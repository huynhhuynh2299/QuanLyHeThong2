<?php

namespace App\Http\Controllers;

use App\Models\congviec;
use App\Models\cosodaotao;
use App\Models\cutruhv;
use App\Models\doituong;
use App\Models\hocvien;
use App\Models\huyen;
use App\Models\tinh;
use App\Models\xa;
use App\Models\hoctailop;
use App\Models\khoahoc;
use App\Models\lop;
use App\Models\nganhnghedaotao;
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
        $congviec = hocvien::find($id)->lay_congviec;
        $response = $hocvien;

        $response->THUONG_TRU = $dcThuongTru;
        $response->NGUYEN_QUAN = $dcNguyenQuan;
        $response->DS_CHUNGCHI = $chungchi;
        $response->DS_NGUOIQUEN  = $nguoiquen;
        $response->CONG_VIEC  = $congviec;

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
                'stt' => $i,
                'tai_lop' => $tailop_all,
                'thuoc_lop' => $thuoclop_all,
                'thuockhoahoc' => $khoahoc_all
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
        $nganhnghedaotao_all = nganhnghedaotao::all();
        $cosodaotao_all = cosodaotao::all();

        return view(
            'Admin.QuanLyHocVien.Them',
            [
                'quanlyhocvien' => $hocvien_all,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'doituong_all' => $doituong_all,
                'nganhnghedaotao_all' => $nganhnghedaotao_all,
                'cosodaotao_all' => $cosodaotao_all,
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
            'HV_HOTEN' => 'required',
            'HV_CMND' => 'required',
            'HV_DANTOC' => 'required',
            'HV_HOCVAN' => 'required',

            'HV_NGAYSINH' => 'required',
            'HV_GIOITINH' => 'required',
            'HV_SDT' => 'required|numeric',

            'CV_TEN' => 'required',
            'CV_NOILAM' => 'required',
            'CV_TGNHAN' => 'required',

            'NGUYENQUAN_TINH' => 'required',
            'NGUYENQUAN_HUYEN' => 'required',
            'NGUYENQUAN_XA' => 'required',
            'HV_DIACHI_NQ' => 'required',

            'THUONGTRU_TINH' => 'required',
            'THUONGTRU_HUYEN' => 'required',
            'THUONGTRU_XA' => 'required',
            'HV_DIACHI_TT' => 'required',

            'NGANHDAOTAO' => 'required',
            'HV_NOILAMVIECDUKIEN' => 'required',

        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'numeric' => ':attribute phải nhập chỉ số',
        ], [

            'HV_HOTEN' => 'Họ tên học viên',
            'HV_CMND' => 'CMDN/CCCD',
            'HV_DANTOC' => 'Dân tộc',
            'HV_HOCVAN' => 'Học vấn',

            'HV_NGAYSINH' => 'Ngày sinh',
            'HV_GIOITINH' => 'Giới tính',
            'HV_SDT' => 'Số điện thoại',

            'CV_TEN' => 'Tên công việc',
            'CV_NOILAM' => 'Nơi làm việc',
            'CV_TGNHAN' => 'Thời gian nhận việc',

            'NGUYENQUAN_TINH' => 'Tỉnh/Thành phố',
            'NGUYENQUAN_HUYEN' => 'Quận/Huyện',
            'NGUYENQUAN_XA' => 'Phường/Xã',
            'HV_DIACHI_NQ' => 'Địa chỉ nguyên quán',

            'THUONGTRU_TINH' => 'Tỉnh/Thành phố',
            'THUONGTRU_HUYEN' => 'Quận/Huyện',
            'THUONGTRU_XA' => 'Phường/Xã',
            'HV_DIACHI_TT' => 'Địa chỉ thường trú',

            'NGANHDAOTAO' => 'Ngành đào tạo',
            'HV_NOILAMVIECDUKIEN' => 'Thông tin đầu ra',
        ]);


        // save hoc vien
        $hocvien = new hocvien();

        $hocvien->HV_HOTEN  = $request->HV_HOTEN;
        $hocvien->HV_CMND = $request->HV_CMND;
        $hocvien->HV_SDT  = $request->HV_SDT;
        $hocvien->HV_NGAYSINH  = $request->HV_NGAYSINH;
        $hocvien->HV_GIOITINH  = $request->HV_GIOITINH;
        $hocvien->HV_TTVIECLAM  = "YES";
        $hocvien->HV_DANTOC = $request->HV_DANTOC;
        $hocvien->HV_HOCVAN  = $request->HV_HOCVAN;
        $hocvien->HV_NOILAMVIECDUKIEN = $request->HV_NOILAMVIECDUKIEN;
        $hocvien->HV_CHUANDAURA = "...";

        $hocvien->id_DOITUONG = $request->id_DOITUONG;

        $hocvien->save();
        $id_HOCVIEN = hocvien::orderBy('id', 'DESC')->first();

        // save cu tru hoc vien

        $cutruhv_nguyenquan = new cutruhv();

        $cutruhv_nguyenquan->DIA_CHI = $request->HV_DIACHI_NQ;
        $cutruhv_nguyenquan->THUONG_TRU = 'NO';
        $cutruhv_nguyenquan->id_HOCVIEN =  $id_HOCVIEN->id;
        $cutruhv_nguyenquan->id_XA =  $request->NGUYENQUAN_XA;

        $cutruhv_nguyenquan->save();

        $cutruhv_thuongtru = new cutruhv();

        $cutruhv_thuongtru->DIA_CHI = $request->HV_DIACHI_TT;
        $cutruhv_thuongtru->THUONG_TRU = 'YES';
        $cutruhv_thuongtru->id_HOCVIEN =  $id_HOCVIEN->id;
        $cutruhv_thuongtru->id_XA =  $request->THUONGTRU_XA;

        $cutruhv_thuongtru->save();

        $congviec = new congviec();

        $congviec->CV_TEN = $request->CV_TEN;
        $congviec->CV_NOILAM =  $request->CV_NOILAM;
        $congviec->CV_TGNHAN =  $request->CV_TGNHAN;
        $congviec->id_HOCVIEN =  $id_HOCVIEN->id;

        $congviec->save();

        // save cong viec hoc vien

        $congviec = new congviec();

        $congviec->CV_TEN = $request->CV_TEN;
        $congviec->CV_NOILAM =  $request->CV_NOILAM;
        $congviec->CV_TGNHAN =  $request->CV_TGNHAN;
        $congviec->id_HOCVIEN =  $id_HOCVIEN->id;

        $congviec->save();

        // save nguoi quen hoc vien

        $nguoiquen = new nguoiquen();

        $nguoiquen->NQ_HOTEN = $request->NQ_HOTEN;
        $nguoiquen->NQ_SDT =  $request->NQ_SDT;
        $nguoiquen->NQ_DIACHI =  $request->NQ_DIACHI;
        $nguoiquen->id_HOCVIEN =  $id_HOCVIEN->id;

        $nguoiquen->save();

        $hoctailop = new hoctailop();

        $hoctailop->id_HOCVIEN =  $id_HOCVIEN->id;
        $hoctailop->id_LOP =  $request->LOP;

        $hoctailop->save();

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
                'stt' => $i,
                'id_lop' => $id_lop,
                'tai_lop' => $tailop_all,
                'thuoc_lop' => $thuoclop_all2,
                'thuockhoahoc' => $khoahoc_all




            ]
        );
    }
    public function edit(Request $request)
    {
        // validation
        $request->validate([
            'id' => 'required',

            'HV_HOTEN' => 'required',
            'HV_CMND' => 'required',
            'HV_DANTOC' => 'required',
            'HV_HOCVAN' => 'required',

            'HV_NGAYSINH' => 'required',
            'HV_GIOITINH' => 'required',
            'HV_SDT' => 'required|numeric',

            'CV_TEN' => 'required',
            'CV_NOILAM' => 'required',
            'CV_TGNHAN' => 'required',

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
            'numeric' => ':attribute phải nhập chỉ số',
        ], [

            'HV_HOTEN' => 'Họ tên học viên',
            'HV_CMND' => 'CMDN/CCCD',
            'HV_DANTOC' => 'Dân tộc',
            'HV_HOCVAN' => 'Học vấn',

            'HV_NGAYSINH' => 'Ngày sinh',
            'HV_GIOITINH' => 'Giới tính',
            'HV_SDT' => 'Số điện thoại',

            'CV_TEN' => 'Tên công việc',
            'CV_NOILAM' => 'Nơi làm việc',
            'CV_TGNHAN' => 'Thời gian nhận việc',

            'NGUYENQUAN_TINH' => 'Tỉnh/Thành phố',
            'NGUYENQUAN_HUYEN' => 'Quận/Huyện',
            'NGUYENQUAN_XA' => 'Phường/Xã',
            'HV_DIACHI_NQ' => 'Địa chỉ nguyên quán',

            'THUONGTRU_TINH' => 'Tỉnh/Thành phố',
            'THUONGTRU_HUYEN' => 'Quận/Huyện',
            'THUONGTRU_XA' => 'Phường/Xã',
            'HV_DIACHI_TT' => 'Địa chỉ nguyên quán',
        ]);


        $hocvien = hocvien::where('id', $request->id)->update([
            'id_DOITUONG' => $request->id_DOITUONG,

            'HV_HOTEN' => $request->HV_HOTEN,
            'HV_CMND' => $request->HV_CMND,
            'HV_DANTOC' => $request->HV_DANTOC,
            'HV_HOCVAN' => $request->HV_HOCVAN,

            'HV_NGAYSINH' => $request->HV_NGAYSINH,
            'HV_GIOITINH' => $request->HV_GIOITINH,
            'HV_SDT' => $request->HV_SDT,
        ]);

        $cutruhv_nguyenquan = cutruhv::where('id', $request->id_HV_DIACHI_NQ)->update([
            'DIA_CHI' => $request->HV_DIACHI_NQ,
            'id_XA' => $request->NGUYENQUAN_XA,
        ]);

        $cutruhv_thuongtru = cutruhv::where('id', $request->id_HV_DIACHI_TT)->update([
            'DIA_CHI' => $request->HV_DIACHI_TT,
            'id_XA' => $request->THUONGTRU_XA,
        ]);

        $congviec = congviec::where('id', $request->id_CONGVIEC)->update([
            'CV_TEN' => $request->CV_TEN,
            'CV_NOILAM' => $request->CV_NOILAM,
            'CV_TGNHAN' => $request->CV_TGNHAN,
        ]);

        $nguoiquen = nguoiquen::where('id', $request->id_NGUOIQUEN)->update([
            'NQ_HOTEN' => $request->NQ_HOTEN,
            'NQ_SDT' => $request->NQ_SDT,
            'NQ_DIACHI' => $request->NQ_DIACHI,
        ]);

        return Redirect::to('danhsachhocvien');
    }
}
