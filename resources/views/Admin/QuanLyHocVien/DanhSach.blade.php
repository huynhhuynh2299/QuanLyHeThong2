@extends('Admin.layout.index')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách học viên</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách học viên</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <div class="card">
    <div class="col-sm-4">
      <div class="form-row">

        <div class="form-group col-md-9">
          <label for="exampleInputEmail1">Lớp học - Khóa học</label>
          <form action="hocvientaods" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <select class="select2" style="width: 340px;" type="submit" name="id_lop">


              @foreach($thuockhoahoc as $kh)
              @foreach($thuoc_lop as $tl)
              @if($tl->id_KHOAHOC == $kh->id)
              <option selected value="{{$tl->id}}">{{$tl->L_TEN}} - {{$kh->KH_MASO}}</option>
              @endif
              @endforeach
              @endforeach
            </select>
            <button id="add-new-event" type="submit" class="btn btn-primary" style="margin-top: -65px; margin-left: 342px; width: 150px;">Tạo danh sách</button>
          </form>
        </div>

      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>HỌ VÀ TÊN</th>
            <th>GIỚI TÍNH</th>
            <th>NĂM SINH</th>
            <th>ĐỊA CHỈ THƯỜNG TRÚ</th>
            <th>CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
          @foreach($quanlyhocvien as $hv)
          <tr>
            <td>
              {{
                        $stt++
                      }}
            </td>
            <td>{{$hv->HV_HOTEN}}</td>
            <td>{{$hv->HV_GIOITINH}}</td>
            <td>{{$hv->HV_NGAYSINH}}</td>
            <td>
              @foreach($hv->lay_cutruhv as $dc)
              @if($dc->THUONG_TRU == "YES")
              {{$dc->DIA_CHI}}
              ,{{$dc->thuoc_xa->TEN_XA}}
              , {{$dc->thuoc_xa->lay_huyen->TEN_HUYEN}}
              , {{$dc->thuoc_xa->lay_huyen->lay_tinh->TEN_TINH}}

              @endif
              @endforeach
            <td class="project-actions text-center">
              <a class="btn btn-primary btn-sm show" id="{{$hv -> id}}" data-toggle="modal" data-target="#showHocVien">
                <i class="fas fa-eye"></i>
              </a>
              <a class="btn btn-info btn-sm edit" id="{{$hv -> id}}" data-toggle="modal" data-target="#editHocVien">
                <i class="fas fa-pencil-alt">
                </i>
              </a>
              <a class="btn btn-danger btn-sm" href="xoa/{{$hv -> id}}">
                <i class="fas fa-trash">
                </i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="container-fluid">
      <ul class=" alert text-danger">
        @foreach ( $errors -> all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      <!-- /.card-body -->
    </div>
    <!-- Thông tin học viên -->
    <div class="modal fade" id="showHocVien" tabindex="1" aria-labelledby="showHocVienModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="showHocVienModalLabel">Thông tin học viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form enctype="multipart/form-data">
            <div class="modal-body">
              <!-- sua loi 419 -->
              {{csrf_field()}}
              <div class="card-body">

                <label for="">Chi tiết chứng chỉ</label>
                <div class="form-row">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tên chứng chỉ</th>
                        <th>Xếp loại</th>
                        <th>Số hiệu</th>
                        <th>Ngày cấp</th>
                        <th>Ngày nhận</th>
                      </tr>
                    </thead>
                    <tbody id="ds_chunngchi">
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer ">
                <button type="button" class="btn btn-primary" data-dismiss="modal">In</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- Chỉnh sửa thông tin học viên -->
    <div class="modal fade" id="editHocVien" tabindex="1" aria-labelledby="editHocVienModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="showHocVienModalLabel">Chỉnh sửa thông tin học viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form action="hocvien/edit" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- sua loi 419 -->
              {{csrf_field()}}
              <div class="card-body">
                <input type="hidden" id="id_HV" name="id">
                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="HV_HOTEN_EDIT">Họ tên học viên</label>
                    <input type="text" class="form-control" id="HV_HOTEN_EDIT" name="HV_HOTEN" placeholder="Tên học viên">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="HV_DANTOC_EDIT">Dân tộc:</label>
                    <input type="text" class="form-control" id="HV_DANTOC_EDIT" name="HV_DANTOC" placeholder="Kinh">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="HV_CMND_EDIT">CMND/CCCD:</label>
                    <input type="text" class="form-control" id="HV_CMND_EDIT" name="HV_CMND" placeholder="CMND/CCCD">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="HV_SDT_EDIT">Số điện thoại:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" id="HV_SDT_EDIT" name="HV_SDT" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="id_DOITUONG_EDIT">Mã đối tượng:</label>
                    <select class="form-control" id="id_DOITUONG_EDIT" name="id_DOITUONG">
                      @foreach ($doituong_all as $doituong)
                      <option value="{{ $doituong -> id}}">{{ $doituong -> DT_TEN }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="HV_NGAYSINH_EDIT">Ngày sinh:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" data-inputmask-alias="datetime" id="HV_NGAYSINH_EDIT" name="HV_NGAYSINH" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="HV_GIOITINH_EDIT">Giới tính:</label>
                    <div class="input-group">
                      <select class="form-control" id="HV_GIOITINH_EDIT" name="HV_GIOITINH">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Khác</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="HV_HOCVAN_EDIT">Trình độ học vấn:</label>
                    <div class="input-group">
                      <select class="form-control" id="HV_HOCVAN_EDIT" name="HV_HOCVAN">
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
                <label for="CV_TEN_EDIT">Nghề nghiệp:</label>
                <input type="hidden" id="id_CONGVIEC_EDIT" name="id_CONGVIEC">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <span>Công việc:</span>
                    <input type="text" class="form-control" id="CV_TEN_EDIT" name="CV_TEN" placeholder="Nghề nghiệp hiện tại">
                  </div>
                  <div class="form-group col-md-4">
                    <span>Nơi làm việc:</span>
                    <input type="text" class="form-control" id="CV_NOILAM_EDIT" name="CV_NOILAM" placeholder="Nơi làm việc hiện tại">
                  </div>
                  <div class="form-group col-md-4">
                    <span>Thời gian nhận việc:</span>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" data-inputmask-alias="datetime" id="CV_TGNHAN_EDIT" name="CV_TGNHAN" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                  </div>
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
                  <input type="text" class="form-control" id="HV_DIACHI_NQ_EDIT" name="HV_DIACHI_NQ" placeholder="Địa chỉ">
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
                  <input type="text" class="form-control" id="HV_DIACHI_TT_EDIT" name="HV_DIACHI_TT" placeholder="Địa chỉ">
                  <input type="hidden" id="id_HV_DIACHI_NQ_EDIT" name="id_HV_DIACHI_NQ">
                </div>
                <label for="NQ_HOTEN_ADD">Thông tin người thân:</label>
                <input type="hidden" id="id_NGUOIQUEN_EDIT" name="id_NGUOIQUEN">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <span>Tên người thân:</span>
                    <input type="text" class="form-control" id="NQ_HOTEN_EDIT" name="NQ_HOTEN" placeholder="Họ tên người thân">
                  </div>
                  <div class="form-group col-md-4">
                    <span>Số điện thoại:</span>
                    <input type="text" class="form-control" id="NQ_SDT_EDIT" name="NQ_SDT" placeholder="Số điện thoại người thân">
                  </div>
                  <div class="form-group col-md-4">
                    <span>Địa chỉ:</span>
                    <input type="text" class="form-control" id="NQ_DIACHI_EDIT" name="NQ_DIACHI" placeholder="Địa chỉ người thân">
                    <input type="hidden" id="id_HV_DIACHI_TT_EDIT" name="id_HV_DIACHI_TT">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>

              </div>

          </form>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection
@section('script')
<script src="{{asset('frontend/js/pages/QuanLyHocVien.js')}}"></script>
@endsection