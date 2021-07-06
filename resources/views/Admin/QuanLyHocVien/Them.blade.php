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

  <div class="card">
    <form class="js_form_hocvien" action="hocvien/add" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <!-- sua loi 419 -->
        {{csrf_field()}}
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="HV_HOTEN_ADD">Họ tên học viên</label>
              <input type="text" class="form-control" id="HV_HOTEN_ADD" name="HV_HOTEN" placeholder="Tên học viên">
            </div>
            <div class="form-group col-md-4">
              <label for="HV_DANTOC_ADD">Dân tộc:</label>
              <input type="text" class="form-control" id="HV_DANTOC_ADD" name="HV_DANTOC" placeholder="Kinh">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="HV_CMND_ADD">CMND/CCCD:</label>
              <input type="text" class="form-control" id="HV_CMND_ADD" name="HV_CMND" placeholder="CMND/CCCD">
            </div>
            <div class="form-group col-md-4">
              <label for="HV_SDT_ADD">Số điện thoại:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" class="form-control" id="HV_SDT_ADD" name="HV_SDT" data-inputmask='"mask": "(999) 999-9999"' data-mask>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="id_DOITUONG_ADD">Mã đối tượng:</label>
              <select class="form-control" id="id_DOITUONG_ADD" name="id_DOITUONG">
                @foreach ($doituong_all as $doituong)
                <option value="{{ $doituong -> id}}">{{ $doituong -> DT_TEN }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="HV_NGAYSINH_ADD">Ngày sinh:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" data-inputmask-alias="datetime" id="HV_NGAYSINH_ADD" name="HV_NGAYSINH" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label for="HV_GIOITINH_ADD">Giới tính:</label>
              <div class="input-group">
                <select class="form-control" id="HV_GIOITINH_ADD" name="HV_GIOITINH">
                  <option>Nam</option>
                  <option>Nữ</option>
                  <option>Khác</option>
                </select>
              </div>
            </div>
            <div class="form-group col-md-4">
              <label for="HV_HOCVAN_ADD">Trình độ học vấn:</label>
              <div class="input-group">
                <select class="form-control" id="HV_HOCVAN_ADD" name="HV_HOCVAN">
                  <option>1/12</option>
                  <option>2/12</option>
                  <option>3/12</option>
                  <option>4/12</option>
                  <option>5/12</option>
                  <option>6/12</option>
                  <option>7/12</option>
                  <option>8/12</option>
                  <option>9/12</option>
                  <option>10/12</option>
                  <option>11/12</option>
                  <option>12/12</option>
                  <option>Cao đẳng</option>
                </select>
              </div>
            </div>
          </div>
          <label for="CV_TEN_ADD">Nghề nghiệp:</label>
          <div class="form-row">
            <div class="form-group col-md-4">
              <span>Công việc:</span>
              <input type="text" class="form-control" id="CV_TEN_ADD" name="CV_TEN" placeholder="Nghề nghiệp hiện tại">
            </div>
            <div class="form-group col-md-4">
              <span>Nơi làm việc:</span>
              <input type="text" class="form-control" id="CV_NOILAM_ADD" name="CV_NOILAM" placeholder="Nơi làm việc hiện tại">
            </div>
            <div class="form-group col-md-4">
              <span>Thời gian nhận việc:</span>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" data-inputmask-alias="datetime" id="CV_TGNHAN_ADD" name="CV_TGNHAN" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
              </div>
            </div>
          </div>
          <div class="form-row">

          </div>
          <label for="HV_NGUYENQUAN">Nguyên quán:</label>
          <div class="form-row">
            <div class="form-group col-md-4">
              <span>Tỉnh/Thành Phố</span>
              <select class="form-control js_nguyenquan_tinh" id="nguyenquan_tinh_EDIT" name="NGUYENQUAN_TINH" placeholder="Tỉnh/Thành Phố">
                <option value="0">Mời chọn tỉnh/thành phố</option>

                @foreach ($tinh_all as $tinh)
                <option value="{{ $tinh -> id }}">{{ $tinh -> TEN_TINH }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4">
              <span>Quận/Huyện</span>
              <select class="form-control js_nguyenquan_huyen" id="nguyenquan_huyen_EDIT" name="NGUYENQUAN_HUYEN" placeholder="Quận/Huyên">
                <option value="0">Mời chọn quận/huyện</option>

                @foreach ($huyen_all as $huyen)
                <option value="{{ $huyen -> id }}">{{ $huyen -> TEN_HUYEN }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4">
              <span>Phường/Xã</span>
              <select class="form-control" id="nguyenquan_xa_EDIT" name="NGUYENQUAN_XA" placeholder="Phường/Xã">
                <option value="0">Mời chọn phường/xã</option>

                @foreach ($xa_all as $xa)
                <option value="{{ $xa-> id }}">{{ $xa -> TEN_XA }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <span>Địa chỉ</span>
            <input type="text" class="form-control" id="HV_DIACHI_NQ_ADD" name="HV_DIACHI_NQ" placeholder="Địa chỉ">
          </div>
          <label for="HV_THUONGTRU">Hộ khẩu thường trú</label>
          <div class="form-row">
            <div class="form-group col-md-4">
              <span>Tỉnh/Thành Phố</span>
              <select class="form-control js_thuongtru_tinh" id="thuongtru_tinh_EDIT" name="THUONGTRU_TINH" placeholder="Tỉnh/Thành Phố">
                <option value="0">Mời chọn tỉnh/thành phố</option>
                @foreach ($tinh_all as $tinh)
                <option value="{{ $tinh-> id }}">{{ $tinh -> TEN_TINH }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4">
              <span>Quận/Huyện</span>
              <select class="form-control js_thuongtru_huyen" id="thuongtru_huyen_EDIT" name="THUONGTRU_HUYEN" placeholder="Quận/Huyên">
                <option value="0">Mời chọn quận/huyện</option>
                @foreach ($huyen_all as $huyen)
                <option value="{{ $huyen-> id }}">{{ $huyen -> TEN_HUYEN }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4">
              <span>Phường/Xã</span>
              <select class="form-control" id="thuongtru_xa_EDIT" name="THUONGTRU_XA" placeholder="Phường/Xã">
                <option value="0">Mời chọn phường/xã</option>
                @foreach ($xa_all as $xa)
                <option value="{{ $xa-> id }}">{{ $xa -> TEN_XA }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <span>Địa chỉ</span>
            <input type="text" class="form-control" id="HV_DIACHI_TT_ADD" name="HV_DIACHI_TT" placeholder="Địa chỉ">
          </div>
          <label for="NQ_HOTEN_ADD">Thông tin người thân:</label>
          <div class="form-row">
            <div class="form-group col-md-4">
              <span>Tên người thân:</span>
              <input type="text" class="form-control" id="NQ_HOTEN_ADD" name="NQ_HOTEN" placeholder="Họ tên người thân">
            </div>
            <div class="form-group col-md-4">
              <span>Số điện thoại:</span>
              <input type="text" class="form-control" id="NQ_SDT_ADD" name="NQ_SDT" placeholder="Số điện thoại người thân">
            </div>
            <div class="form-group col-md-4">
              <span>Địa chỉ:</span>
              <input type="text" class="form-control" id="NQ_DIACHI_ADD" name="NQ_DIACHI" placeholder="Địa chỉ người thân">
            </div>
          </div>
          <div class="form-group">
            <label>Thông tin đào tạo:</label>
          </div>
          <hr>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="NGANHDAOTAO">Ngành nghề đào tạo:</label>
              <div class="input-group">
                <select class="form-control js_nganhnghedaotao" id="NGANHDAOTAO_ADD" name="NGANHDAOTAO">
                  <option value="0">Chọn ngành đào tạo</option>
                  @foreach($nganhnghedaotao_all as $nganhnghedaotao)
                  <option value="{{ $nganhnghedaotao-> id}}">{{ $nganhnghedaotao->NN_TEN }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="LOP_ADD">Danh sách lớp học:</label>
              <div class="input-group">
                <select class="form-control js_danhsachlop" id="LOP_ADD" name="LOP">
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="HV_NOILAMVIECDUKIEN">Dự kiến nơi làm việc sau khóa học:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="HV_NOILAMVIECDUKIEN_ADD" name="HV_NOILAMVIECDUKIEN">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>

    </form>
  </div>
  <ul class=" alert text-danger">
    @foreach ( $errors -> all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>




<!-- kết thúc them  -->
@endsection