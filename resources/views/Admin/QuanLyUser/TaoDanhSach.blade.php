@extends('Admin.layout.index')
@section('content')
<style>
  .col-sm-4{
    margin-left: 10px;
  }

</style>

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
    <!-- /.card-header -->
    <div class="col-sm-4">
  <div class="form-row">
                 
                  <div class="form-group col-md-9" >
                    <label for="exampleInputEmail1" >Lớp học - Khóa học</label>

                    
           
                      <form action="hocvientaods" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                     <select class="select2" style="width: 340px;" type="submit" name="id_lop">


                     @foreach($thuockhoahoc as $kh)
                       @foreach($thuoc_lop as $tl)
                         @if($tl->id_KHOAHOC == $kh->id)
                         

                                       <option selected value="{{$tl->id}}" >{{$tl->L_TEN}} - {{$kh->KH_MASO}}</option>
                         
                        @endif
                         @endforeach
                         @endforeach
                        
                        </select>
                       
                        <button id="add-new-event" type="submit" class="btn btn-primary" style="margin-top: -65px; margin-left: 342px; width: 150px;" >Tạo danh sách</button>
                      </form>
                   </div>

                </div>
              </div>
        
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
                    <td>{{$hv->thuoc_hocvien->HV_HOTEN}}</td>
                    <td>{{$hv->thuoc_hocvien->HV_GIOITINH}}</td>
                    <td>{{$hv->thuoc_hocvien->HV_NGAYSINH}}</td>
                    
                    <td>  
                      @foreach($hv->thuoc_hocvien->lay_cutruhv as $dc)
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
    <div class="modal fade" id="showHocVien" tabindex="-1" aria-labelledby="showHocVienModalLabel" aria-hidden="true">
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
                <!-- <div>
                  <input type="hidden" class="form-control" id="id" name="id" placeholder="">
                  <div class="form-group">
                    <label for="HV_HOTEN">Họ tên học viên</label>
                    <input type="text" class="form-control" id="HV_HOTEN" placeholder="Tên học viên" disabled>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="HV_CMND">CMND/CCCD:</label>
                      <input type="text" class="form-control" id="HV_CMND" placeholder="CMND/CCCD" disabled>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="HV_DANTOC">Dân tộc:</label>
                      <input type="text" class="form-control" id="HV_DANTOC" placeholder="Kinh" disabled>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="HV_HOCVAN">Trình độ học vấn:</label>
                      <div class="input-group">
                        <select class="form-control" id="HV_HOCVAN" disabled>
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
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="HV_NGHENGHIEP">Nghề nghiệp:</label>
                      <input type="text" class="form-control" id="HV_NGHENGHIEP" placeholder="Nghề nghiệp, nơi làm việc hiện tại" disabled>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="HV_NGAYSINH">Ngày sinh:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" data-inputmask-alias="datetime" id="HV_NGAYSINH" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="HV_GIOITINH">Giới tính:</label>
                      <div class="input-group">
                        <select class="form-control" id="HV_GIOITINH" disabled>
                          <option>Nam</option>
                          <option>Nữ</option>
                          <option>Khác</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="HV_SDT">Số điện thoại:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" id="HV_SDT" data-inputmask='"mask": "(999) 999-9999"' data-mask disabled>
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="id_DOITUONG">Mã đối tượng:</label>
                      <select class="form-control" id="id_DOITUONG" disabled>
                        @foreach ($doituong_all as $doituong)
                        <option value="{{ $doituong -> DT_MASO}}">{{ $doituong -> DT_TEN }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <label for="HV_NGUYENQUAN">Nguyên quán:</label>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <span>Tỉnh/Thành Phố</span>
                      <select class="form-control " id="nguyenquan_tinh" placeholder="Tỉnh/Thành Phố" disabled>
                        @foreach ($tinh_all as $tinh)
                        <option>{{ $tinh -> TEN_TINH }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <span>Quận/Huyện</span>
                      <select class="form-control " id="nguyenquan_huyen" placeholder="Quận/Huyên" disabled>
                        @foreach ($huyen_all as $huyen)
                        <option>{{ $huyen -> TEN_HUYEN }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <span>Phường/Xã</span>
                      <select class="form-control" id="nguyenquan_xa" placeholder="Phường/Xã" disabled>
                        @foreach ($xa_all as $xa)
                        <option>{{ $xa -> TEN_XA }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <span>Địa chỉ</span>
                    <input type="text" class="form-control" id="HV_DIACHI_NQ" placeholder="Địa chỉ" disabled>
                  </div>
                  <label for="HV_THUONGTRU">Hộ khẩu thường trú</label>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <span>Tỉnh/Thành Phố</span>
                      <select class="form-control " id="thuongtru_tinh" placeholder="Tỉnh/Thành Phố" disabled>
                        <option>Mời chọn tỉnh/thành phố</option>
                        @foreach ($tinh_all as $tinh)
                        <option>{{ $tinh -> TEN_TINH }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <span>Quận/Huyện</span>
                      <select class="form-control js_thuongtru_huyen" id="thuongtru_huyen" placeholder="Quận/Huyên" disabled>
                        <option>Mời chọn quận/huyện</option>
                        @foreach ($huyen_all as $huyen)
                        <option>{{ $huyen -> TEN_HUYEN }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <span>Phường/Xã</span>
                      <select class="form-control" id="thuongtru_xa" placeholder="Phường/Xã" disabled>
                        <option>Mời chọn phường/xã</option>
                        <option>Mời chọn tỉnh/thành phố</option>
                        @foreach ($xa_all as $xa)
                        <option>{{ $xa -> TEN_XA }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <span>Địa chỉ</span>
                    <input type="text" class="form-control" id="HV_DIACHI_TT" placeholder="Địa chỉ" disabled>
                  </div>
                  <div class="form-group">
                    <label for="HV_THONGTINMOTA">Thông tin người thân:</label>
                    <textarea class="form-control" id="HV_THONGTINMOTA" rows="2" disabled></textarea>
                  </div>
                  <hr>
                </div> -->
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
    <div class="modal fade" id="editHocVien" tabindex="-1" aria-labelledby="editHocVienModalLabel" aria-hidden="true">
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
                <input type="hidden" class="form-control" id="id_HV" name="id">
                <div class="form-group">
                  <label for="HV_HOTEN">Họ tên học viên</label>
                  <input type="text" class="form-control" id="HV_HOTEN_EDIT" name="HV_HOTEN" placeholder="Tên học viên">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="HV_CMND">CMND/CCCD:</label>
                    <input type="text" class="form-control" id="HV_CMND_EDIT" name="HV_CMND" placeholder="CMND/CCCD">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="HV_DANTOC">Dân tộc:</label>
                    <input type="text" class="form-control" id="HV_DANTOC_EDIT" name="HV_DANTOC" placeholder="Kinh">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="HV_HOCVAN">Trình độ học vấn:</label>
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
                  <div class="form-group col-md-6">
                    <label for="HV_NGHENGHIEP">Nghề nghiệp:</label>
                    <input type="text" class="form-control" id="HV_NGHENGHIEP_EDIT" name="HV_NGHENGHIEP" placeholder="Nghề nghiệp, nơi làm việc hiện tại">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="HV_NGAYSINH">Ngày sinh:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" data-inputmask-alias="datetime" id="HV_NGAYSINH_EDIT" name="HV_NGAYSINH" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="HV_GIOITINH">Giới tính:</label>
                    <div class="input-group">
                      <select class="form-control" id="HV_GIOITINH_EDIT" name="HV_GIOITINH">
                        <option>Nam</option>
                        <option>Nữ</option>
                        <option>Khác</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="HV_SDT">Số điện thoại:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" id="HV_SDT_EDIT" name="HV_SDT" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="id_DOITUONG">Mã đối tượng:</label>
                    <select class="form-control" id="id_DOITUONG_EDIT" name="id_DOITUONG">
                      @foreach ($doituong_all as $doituong)
                      <option value="{{ $doituong -> id}}">{{ $doituong -> DT_TEN }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <label for="HV_NGUYENQUAN">Nguyên quán:</label>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <span>Tỉnh/Thành Phố</span>
                    <select class="form-control js_nguyenquan_tinh" id="nguyenquan_tinh_EDIT" name="NGUYENQUAN_TINH" placeholder="Tỉnh/Thành Phố">
                      @foreach ($tinh_all as $tinh)
                      <option value="{{ $tinh -> id }}">{{ $tinh -> TEN_TINH }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <span>Quận/Huyện</span>
                    <select class="form-control js_nguyenquan_huyen" id="nguyenquan_huyen_EDIT" name="NGUYENQUAN_HUYEN" placeholder="Quận/Huyên">
                      @foreach ($huyen_all as $huyen)
                      <option value="{{ $huyen -> id }}">{{ $huyen -> TEN_HUYEN }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <span>Phường/Xã</span>
                    <select class="form-control" id="nguyenquan_xa_EDIT" name="NGUYENQUAN_XA" placeholder="Phường/Xã">
                      @foreach ($xa_all as $xa)
                      <option value="{{ $xa-> id }}">{{ $xa -> TEN_XA }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <span>Địa chỉ</span>
                  <input type="text" class="form-control" id="HV_DIACHI_NQ_EDIT" name="HV_DIACHI_NQ" placeholder="Địa chỉ">
                  <input type="hidden" id="id_HV_DIACHI_NQ_EDIT" name="id_HV_DIACHI_NQ">
                </div>
                <label for="HV_THUONGTRU">Hộ khẩu thường trú</label>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <span>Tỉnh/Thành Phố</span>
                    <select class="form-control js_thuongtru_tinh" id="thuongtru_tinh_EDIT" name="THUONGTRU_TINH" placeholder="Tỉnh/Thành Phố">
                      @foreach ($tinh_all as $tinh)
                      <option value="{{ $tinh-> id }}">{{ $tinh -> TEN_TINH }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <span>Quận/Huyện</span>
                    <select class="form-control js_thuongtru_huyen" id="thuongtru_huyen_EDIT" name="THUONGTRU_HUYEN" placeholder="Quận/Huyên">
                      @foreach ($huyen_all as $huyen)
                      <option value="{{ $huyen-> id }}">{{ $huyen -> TEN_HUYEN }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <span>Phường/Xã</span>
                    <select class="form-control" id="thuongtru_xa_EDIT" name="THUONGTRU_XA" placeholder="Phường/Xã">
                      @foreach ($xa_all as $xa)
                      <option value="{{ $xa-> id }}">{{ $xa -> TEN_XA }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <span>Địa chỉ</span>
                  <input type="text" class="form-control" id="HV_DIACHI_TT_EDIT" name="HV_DIACHI_TT" placeholder="Địa chỉ">
                  <input type="hidden" id="id_HV_DIACHI_TT_EDIT" name="id_HV_DIACHI_TT">
                </div>
                <div class="form-group">
                  <label for="HV_THONGTINMOTA">Thông tin người thân:</label>
                  <textarea class="form-control" id="HV_THONGTINMOTA" name="HV_THONGTINMOTA_EDIT" rows="2"></textarea>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <div class="col-auto">
                  <button type="button" class="btn btn-warning" data-dismiss="modal">In</button>
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                </div>
              </div>
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