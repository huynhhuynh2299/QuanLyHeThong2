@extends('Admin.layout.index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm học viên</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thêm học viên</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- them hoc vien moi -->

  <hr>
  <form class="js_form_hocvien" action="hocvien/add" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
      <!-- sua loi 419 -->
      {{csrf_field()}}
      <div class="card-body">
        <input type="hidden" class="form-control" id="maso" name="maso" placeholder="">
        <div class="form-group">
          <label for="exampleInputEmail1">Họ tên học viên</label>
          <input type="text" class="form-control" id="tenhv" name="tenhv" placeholder="Tên học viên">
        </div>
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">CMND/CCCD:</label>
            <input type="text" class="form-control" id="cmnd" name="cmnd" placeholder="CMND/CCCD">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Dân tộc:</label>
            <input type="text" class="form-control" id="dantoc" name="dantoc" placeholder="Kinh">
          </div>
        </div>
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Trình độ học vấn:</label>
            <div class="input-group">
              <select class="form-control" id="hocvan" name="hocvan">
                <option>Trung học cơ sở</option>
                <option>Trung học phổ thông</option>
                <option>Cao đẳng</option>
                <option>Trung cấp</option>
                <option>Đại học</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Nghề nghiệp:</label>
            <input type="text" class="form-control" id="nghenghiep" name="nghenghiep" placeholder="Nghề nghiệp, nơi làm việc hiện tại">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">

            <label for="exampleInputEmail1">Ngày sinh:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control" data-inputmask-alias="datetime" id="ngaysinh" name="ngaysinh" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
          </div>

          <div class="form-group col-md-6">

            <label for="exampleInputEmail1">Giới tính:</label>
            <div class="input-group">
              <select class="form-control" id="gioitinh" name="gioitinh">
                <option>Nam</option>
                <option>Nữ</option>
                <option>Khác</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Số điện thoại:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" data-inputmask='"mask": "(999) 999-9999"' data-mask>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Mã đối tượng:</label>
            <select class="form-control" id="madoituong" name="madoituong">
              @foreach ($doituong_all as $doituong)
              <option value="{{ $doituong -> DT_MASO}}">{{ $doituong -> DT_TEN }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <label for="exampleInputEmail1">Nguyên quán:</label>
        <div class="form-row">
          <div class="form-group col-md-4">
            <span>Tỉnh/Thành Phố</span>
            <select class="form-control js_nguyenquan_tinh" id="nguyenquan_tinh" name="nguyenquan_tinh" placeholder="Tỉnh/Thành Phố">
              <option>Mời chọn tỉnh/thành phố</option>
              @foreach ($tinh_all as $tinh)
              <option>{{ $tinh -> TEN_TINH }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <span>Quận/Huyện</span>
            <select class="form-control js_nguyenquan_huyen" id="nguyenquan_huyen" name="nguyenquan_huyen" placeholder="Quận/Huyên">
              <option>Mời chọn quận/huyện</option>
              @foreach ($huyen_all as $huyen)
              <option>{{ $huyen -> TEN_HUYEN }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <span>Phường/Xã</span>
            <select class="form-control" id="nguyenquan_xa" name="nguyenquan_xa" placeholder="Phường/Xã">
              <option>Mời chọn phường/xã</option>
              @foreach ($xa_all as $xa)
              <option>{{ $xa -> TEN_XA }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <label for="exampleInputEmail1">Hộ khẩu thường trú</label>
        <div class="form-row">
          <div class="form-group col-md-4">
            <span>Tỉnh/Thành Phố</span>
            <select class="form-control js_thuongtru_tinh" id="thuongtru_tinh" name="tinh" placeholder="Tỉnh/Thành Phố">
              <option>Mời chọn tỉnh/thành phố</option>
              @foreach ($tinh_all as $tinh)
              <option>{{ $tinh -> TEN_TINH }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <span>Quận/Huyện</span>
            <select class="form-control js_thuongtru_huyen" id="thuongtru_huyen" name="huyen" placeholder="Quận/Huyên">
              <option>Mời chọn quận/huyện</option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <span>Phường/Xã</span>
            <select class="form-control" id="thuongtru_xa" name="xa" placeholder="Phường/Xã">
              <option>Mời chọn phường/xã</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Thông tin người thân:</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Lịch sử đào tạo:</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Thông tin đào tạo:</label>
        </div>
        <hr>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Ngành nghề đào tạo:</label>
            <div class="input-group">
              <select class="form-control" id="nganhdaotao" name="nganhdaotao">
                <option>.</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Địa điểm đào tạo:</label>
            <div class="input-group">
              <select class="form-control" id="diadiem" name="diadiem">
                <option>.</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="exampleInputEmail1">Thời gian khóa học(ngày):</label>
            <div class="input-group">
              <input type="text" class="form-control" id="thoigianhoc" name="thoigianhoc">
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Ngày bắt đầu:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control" data-inputmask-alias="datetime" id="ngaybatdau" name="ngaybatdau" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Ngày kết thúc:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control" data-inputmask-alias="datetime" id="ngayketthuc" name="ngayketthuc" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Chuẩn đầu ra(kiến thức, kỹ năng, thái độ):</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Dự kiến nơi làm việc sau khóa học:</label>
          <div class="input-group">
            <input type="text" class="form-control" id="noilamviec" name="noilamviec">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Thêm</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
      </div>

  </form>
  <ul class=" alert text-danger">
    @foreach ( $errors -> all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>




<!-- kết thúc them  -->
@endsection