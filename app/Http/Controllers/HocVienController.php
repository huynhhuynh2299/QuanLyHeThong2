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
use PDF;

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
            'HV_HOTEN' => 'required|max:50',
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
        // $hocvien->HV_CHUANDAURA = "...";

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
                'thuockhoahoc' => $khoahoc_all,
            ]
        );
    }
    public function edit(Request $request)
    {
        // validation
        $request->validate([
            'id' => 'required',

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
            'CV_TEN' => $request->HV_NGHENGHIEP,
        ]);

        $nguoiquen = nguoiquen::where('id', $request->id_NGUOIQUEN)->update([
            'NQ_HOTEN' => $request->HV_THONGTINMOTA,

        ]);
        $nguoiquen = nguoiquen::where('id', $request->id_NGUOIQUEN1)->update([

            'NQ_SDT' => $request->HV_THONGTINMOTA1,

        ]);

        $nguoiquen = nguoiquen::where('id', $request->id_NGUOIQUEN2)->update([

            'NQ_DIACHI' => $request->HV_THONGTINMOTA2,
        ]);


        return Redirect::to('danhsachhocvien');
    }
    public function inpdf(request $Request)
    {
        $id = $Request->id_hv;
        $id_lop = $Request->id_lop;
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id, $id_lop));
        return $pdf->stream();
    }


    public function print_order_convert($id, $id_lop)
    {
        $hocvien_all = hocvien::where('id', $id)->first();
        $tailop_all = hoctailop::all();
        $khoahoc_all = khoahoc::all();
        $thuoclop_all = lop::all();

        // lấy địa chỉ
        $cutru = cutruhv::all()->where('id_HOCVIEN', $id); //mang
        foreach ($cutru as $ct) {
            if ($ct->THUONG_TRU == 'NO') {
                $nguyen_quan_diachi = $ct->DIA_CHI;
                $nguyen_quan_xa = $ct->thuoc_xa->TEN_XA;
                $nguyen_quan_huyen =  $ct->thuoc_xa->lay_huyen->TEN_HUYEN;
                $nguyen_quan_tinh = $ct->thuoc_xa->lay_huyen->lay_tinh->TEN_TINH;
            }
            if ($ct->THUONG_TRU == 'YES') {
                $thuong_tru_diachi = $ct->DIA_CHI;
                $thuong_tru_xa = $ct->thuoc_xa->TEN_XA;
                $thuong_tru_huyen =  $ct->thuoc_xa->lay_huyen->TEN_HUYEN;
                $thuong_tru_tinh = $ct->thuoc_xa->lay_huyen->lay_tinh->TEN_TINH;
            }
        }

        // lấy đối tượng
        $doi_tuong = $hocvien_all->thuoc_doituong->DT_TEN;

        // lấy thông tin công việc

        $congviec = congviec::all()->where('id_HOCVIEN', $id)->last();
        if (!is_null($congviec)) {
            $ten_cv = $congviec->CV_TEN;
            $noi_lam = $congviec->CV_NOILAM;
            $TTCONGVIEC = $ten_cv . ', ' . $noi_lam;
        } else {
            $TTCONGVIEC = "Chưa có việc làm";
        }
        //xu ly nganh nghe
        $lop = lop::where('id', $id_lop)->first(); // model lop 
        $nghe = $lop->thuoc_nghe;
        $tennghe = $nghe->NN_TEN;
        $khoa = $lop->thuoc_khoahoc;

        $chuandaura = $nghe->NN_CHUAN;

        //xu ly ngay khóa học
        $ngaybatdau = $khoa->KH_THOIGIANBD;
        $ngaybt = substr($ngaybatdau, 8);

        $thangbt = substr($ngaybatdau, 5, -3);
        $nambt = substr($ngaybatdau, 0, -6);

        $ngayketthuc = $khoa->KH_THOIGIANKT;
        $ngaykt = substr($ngayketthuc, 8);
        $thangkt = substr($ngayketthuc, 5, -3);
        $namkt = substr($ngayketthuc, 0, -6);

        //xu ly id / khoa chỗ sô:.../....
        $so = $khoa->id;
        $tenkhoa = $khoa->KH_MASO;
        $manghe = $nghe->NN_MASO;
        //xu ly ngay khoa học 
        $start = strtotime($ngaybatdau);
        $end = strtotime($ngayketthuc);

        $days_between = ceil(abs($end - $start) / 86400);



        //  lấy thông tin người quen
        $nguoiquen = nguoiquen::all()->where('id_HOCVIEN', $id)->last();
        $ten_nq = $nguoiquen->NQ_HOTEN;
        $diachi_nq = $nguoiquen->NQ_DIACHI;
        $TTNGUOIQUEN = $ten_nq . ', ' . $diachi_nq;
        $SDTQUOIQUEN = $nguoiquen->NQ_SDT;


        // xử lý ngày sinh
        $ngaysinh = $hocvien_all->HV_NGAYSINH;
        $day = substr($ngaysinh, 8);
        $month = substr($ngaysinh, 5, -3);
        $year = substr($ngaysinh, 0, -6);
        $DATE = $day . ' tháng ' . $month . ' năm ' . $year;

        $output = '';


        $output .= '<style>body{
            font-family: DejaVu Sans;
        }
        .table-styling{
            border:1px solid #000;
        }
        .table-styling tbody tr td{
            border:1px solid #000;
        }
         <style>
     body{
        font-family: DejaVu Sans;

     }
     .tenso{
      width: 270px;
      font-size: 15px;
      margin-top:10px;
    
      height: 150px;
     }
     p{
        font-size: 15px;

     }
     .tenso b{
        margin-top:-500px;
         position: absolute;
     }
     .conghoa{
         width: 390px;
      
        margin-right: 2px;
        margin-left: 320px;
        margin-top: -230px;
         height: 240px;
          position: absolute;
           // background-color:red;
     }
     .ngang{
        width:100px;
        height:1px;
        background-color: black;
        margin-top:-70px;
        margin: auto;
     }
     .hinh{
        width:111px;
        height:148px;
        boder: 222px;
        background-color:black;
        margin-top:160px;
        margin-left:85px;
      
        

     }
     .hinh1{
        width:109px;
        height:144px;
        boder: 222px;
        background-color:white;
        margin-top:-146px;
        margin-left:86px;
      
        

     }
       
     .kyten{
        width: 330px;
        height: 120px;
       
       margin-left:375px;
        margin-top:-30px;
     }
     .than{
          width:auto;
          height:auto;
          position:absolute;
          margin-top:0px;
        
     }
     .thang{
        width: 20px;
        height:100px;
        background-color:red;
     }
    
  
     td{
         border:1px solid white;
     }

     table{
         border:1px solid white;
     }
        </style>
             <div class="tenso">
<center><p>SỞ LAO ĐỘNG-THƯƠNG BINH</P></center>
<center><P style="margin-top:-10px;">VÀ XÃ HỘI TP CẦN THƠ</P></center>
<h4 style="margin-top:-7px;"> TRUNG TÂM DỊCH VỤ VIỆC LÀM </h4>


<div class="ngang"></div>
</div>
<div class="conghoa">
<h4> CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM </H3>
<center><h5 style="margin-top:-2px;"> Độc lập - Tự do - Hạnh phúc</h5></center>

<div class="ngang"></div>
<br>
<br><br>

<center><h4>PHIẾU HỌC VIÊN</h4></center>
<center><p style="font-weight:normal; margin-top
:-10px;">(Số:' . $so . '/' . $tenkhoa . '/' . $manghe . ')</p></center>

</div>
<div class="hinh"></div><div class="hinh1"></div>
<br>
                ';


        $output .= '      
                    
             <h4>I. THÔNG TIN VỀ HỌC VIÊN <b style="font-weight:normal;">(Do học viên ghi)</b> </h4> 
<p style="margin-top:-10px;">
 1. Họ và tên khai sinh(chữ in hoa có dấu):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $hocvien_all->HV_HOTEN . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nam, Nữ:&nbsp;&nbsp;
 ' . $hocvien_all->HV_GIOITINH . ' &nbsp;&nbsp;
 </p><br>

<p style="margin-top:-23px;">
2. Sinh ngày  &nbsp;&nbsp;' . $DATE . '&nbsp;&nbsp; Số CMTND:&nbsp;&nbsp;&nbsp;&nbsp;' . $hocvien_all->HV_CMND . '
</p><br>
<p style="margin-top:-23px;">
3.Nguyên quán: (xã/phường, huyện/thị xã, tỉnh/thành phố)  &nbsp;&nbsp; ' . $nguyen_quan_diachi . ',&nbsp; ' . $nguyen_quan_xa . ',&nbsp;' . $nguyen_quan_huyen . ',&nbsp;' . $nguyen_quan_tinh . '.&nbsp;&nbsp;
</p><br>

<p style="margin-top:-23px;">
4.Hộ khẩu thường trú (xã/phường, huyện/thị xã, tỉnh/thành phố): &nbsp;&nbsp; ' . $thuong_tru_diachi . ',&nbsp; ' . $thuong_tru_xa . ',&nbsp;' . $thuong_tru_huyen . ',&nbsp;' . $thuong_tru_tinh . '.&nbsp;&nbsp;
</p><br>

<p style="margin-top:-23px;">
5.Dân tộc:&nbsp;&nbsp;' . $hocvien_all->HV_DANTOC . '&nbsp;&nbsp; Thuộc đối tượng (ghi cụ thể các đối tượng):&nbsp;&nbsp;' . $doi_tuong . '&nbsp;&nbsp;
</p><br>
<p style="margin-top:-23px;">
6. Nghề nghiệp, nơi làm việc hiện nay:' . $TTCONGVIEC . '; Điện thoại:&nbsp;&nbsp;' . $hocvien_all->HV_SDT . '&nbsp;&nbsp;
</p><br>
<p style="margin-top:-23px;">
7.Trình độ học lực (bậc cao nhất, đã tốt nghiệp: ĐH, CĐ, TC, THPT, THCS):&nbsp;&nbsp;' . $hocvien_all->HV_HOCVAN . '&nbsp;&nbsp;
</p><br>
<p style="margin-top:-23px;">
8.Khi cần, báo tin cho ai (họ, tên, địa chỉ): &nbsp;&nbsp;' . $TTNGUOIQUEN . '&nbsp;&nbsp;
<p style="margin-top:-23px;">
Điện thoại:.&nbsp;&nbsp;' . $SDTQUOIQUEN . '&nbsp;&nbsp;
</p><br>
<p style="margin-top:-23px;">Tôi xin cam đoan những thông tin đã khai là đúng sự thật, nếu sai, tôi xin chịu trách nghiệm trước pháp luật. 

<div class="kyten">
<p>Cần Thơ, ngày.....tháng ..... năm ..........</p>
<center><b style="margin-top:-5px;"> Người khai</b></center>
<center>
<p style="margin-top:-5px;">(Ký và ghi rõ họ tên)</p>

</center>


</div>
<br><br><br><br>
 <h4>I. THÔNG TIN VỀ NGHỀ HỌC <b style="font-weight:normal;">(Do cơ sở đào tạo ghi)</b> </h4> 
<p style="margin-top:-10px;">
 1. Nghề đào tạo: ' . $tennghe . '
 </p><br>

<p style="margin-top:-23px;">
2. Thời gian khóa học:' . $days_between . ' ngày thực hành. Bắt đầu từ ngày ' . $ngaybt . ' tháng ' . $thangbt . ' năm ' . $nambt . '<br>
</p><br>
<p style="margin-top:-23px;">
Dự kiến thời gian kết thúc khóa học vào ngày ' . $ngaykt . ' tháng ' . $thangkt . ' năm ' . $namkt . '
</p><br>
<p style="margin-top:-23px;">
3. Địa điểm đào tạo: Trung tâm Dịch vụ việc làm thành phố Cần Thơ.
</p><br>

<p style="margin-top:-23px;">
4.Chuẩn đầu ra (ghi cụ thể những kiến thức, kỹ năng, thái độ người học có được, làm được sau khóa học):' . $chuandaura . '
</p><br>

<p style="margin-top:-23px;">
5.Dự kiến nơi làm việc sau khóa học:' . $hocvien_all->HV_NOILAMVIECDUKIEN . '
<p style="margin-top:-23px;">
<div class="kyten">
<p>Cần Thơ, ngày.....tháng ..... năm .......</p>
<center><b style="margin-top:-5px;"> GIÁM ĐỐC</b></center>
<center>
<p style="margin-top:-5px;">(Ký tên, đóng dấu)</p>

</center>

';



        return $output;
    }

    public function timkiemhocvien()
    {
        // Tạo biến kích hoạt bảng
        $datim = "NO";

        // xử lý trường tỉnh huyện xã
        $tinh_all = tinh::all();
        $huyen_all = huyen::all();
        $xa_all = xa::all();
        return view('Admin.QuanLyHocVien.TimKiem', [
            'datim' => $datim,
            'tinh_all' => $tinh_all,
            'huyen_all' => $huyen_all,
            'xa_all' => $xa_all
        ]);
    }

    public function timkiemhocvien2(Request $yeucau)
    {
        // Tạo biến kích hoạt bảng
        $datim = "YES";
        $stt = 1;

        // Xử lý trường tỉnh huyện xã
        $tinh_all = tinh::all();
        $huyen_all = huyen::all();
        $xa_all = xa::all();

        // Nhận 6 trường dữ liệu
        $cmnd = $yeucau->cmnd;
        $sdt = $yeucau->sdt;
        $ten = $yeucau->ten;
        $tinh = $yeucau->tinh; // id
        $huyen = $yeucau->huyen; // id
        $xa = $yeucau->xa; // id

        // TRUY VẤN MODEL

        // Trường hợp easy nhất
        if (!is_null($cmnd)) {
            $banghv = hocvien::all()->where('HV_CMND', $cmnd);
            return view('Admin.QuanLyHocVien.TimKiem', [
                'datim' => $datim,
                'stt' => $stt,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'banghv' => $banghv
            ]);
        }

        if (!is_null($sdt)) {
            $banghv = hocvien::all()->where('HV_SDT', $sdt);
            return view('Admin.QuanLyHocVien.TimKiem', [
                'datim' => $datim,
                'stt' => $stt,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'banghv' => $banghv
            ]);
        }

        // Các trường hợp còn lại

        // Khoanh vùng xã
        if ($xa != 'all') {

            // lọc địa chỉ
            $bangdc = xa::all()
                ->where('id', $xa)
                ->first()
                ->lay_cutruhv
                ->where('THUONG_TRU', 'YES');

            // tạo danh sách học viên theo địa chỉ
            $banghv = array();
            if (!is_null($ten)) {
                foreach ($bangdc as $dc) {
                    if ($dc->thuoc_hocvien->HV_HOTEN == $ten)
                        array_push($banghv, $dc->thuoc_hocvien);
                }
            } else {
                foreach ($bangdc as $dc) {
                    array_push($banghv, $dc->thuoc_hocvien);
                }
            }

            return view('Admin.QuanLyHocVien.TimKiem', [
                'datim' => $datim,
                'stt' => $stt,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'banghv' => $banghv
            ]);
        }

        // Khoanh vùng huyện
        if ($huyen != 'all' && $xa == 'all') {

            // lọc địa chỉ
            $bangdc = huyen::all()
                ->where('id', $huyen)
                ->first()
                ->lay_cutruhv
                ->where('THUONG_TRU', 'YES');

            // tạo danh sách học viên theo địa chỉ
            $banghv = array();
            if (!is_null($ten)) {
                foreach ($bangdc as $dc) {
                    if ($dc->thuoc_hocvien->HV_HOTEN == $ten)
                        array_push($banghv, $dc->thuoc_hocvien);
                }
            } else {
                foreach ($bangdc as $dc) {
                    array_push($banghv, $dc->thuoc_hocvien);
                }
            }

            return view('Admin.QuanLyHocVien.TimKiem', [
                'datim' => $datim,
                'stt' => $stt,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'banghv' => $banghv
            ]);
        }

        // Khoanh vùng tỉnh
        if ($tinh != 'all' && $huyen == 'all' && $xa == 'all') {

            // lọc địa chỉ
            $bangxa = tinh::all()
                ->where('id', $tinh)
                ->first()
                ->lay_xa;

            // tạo danh sách học viên theo địa chỉ
            $banghv = array();
            if (!is_null($ten)) {
                foreach ($bangxa as $xa) {
                    $bangdc = $xa->lay_cutruhv->where('THUONG_TRU', 'YES');
                    foreach ($bangdc as $dc) {
                        if ($dc->thuoc_hocvien->HV_HOTEN == $ten)
                            array_push($banghv, $dc->thuoc_hocvien);
                    }
                }
            } else {
                foreach ($bangxa as $xa) {
                    $bangdc = $xa->lay_cutruhv->where('THUONG_TRU', 'YES');
                    foreach ($bangdc as $dc) {
                        array_push($banghv, $dc->thuoc_hocvien);
                    }
                }
            }

            return view('Admin.QuanLyHocVien.TimKiem', [
                'datim' => $datim,
                'stt' => $stt,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'banghv' => $banghv
            ]);
        }

        // Không khoanh vùng
        if (!is_null($ten)) {
            $banghv = hocvien::all()->where('HV_HOTEN', $ten);
            return view('Admin.QuanLyHocVien.TimKiem', [
                'datim' => $datim,
                'stt' => $stt,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'banghv' => $banghv
            ]);
        } else {
            $banghv = hocvien::all();
            return view('Admin.QuanLyHocVien.TimKiem', [
                'datim' => $datim,
                'stt' => $stt,
                'tinh_all' => $tinh_all,
                'huyen_all' => $huyen_all,
                'xa_all' => $xa_all,
                'banghv' => $banghv
            ]);
        }
    }

    public function getkichhoat()
    {
        return view('Admin.QuanLyHocVien.ThanhLichSu');
    }
}
