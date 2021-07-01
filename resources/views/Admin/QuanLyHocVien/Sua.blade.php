
@extends('Admin.layout.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      

<!-- them hoc vien moi -->


  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm học viên</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="themhocvien{" method="POST" enctype="multipart/form-data">
                <!-- sua loi 419 -->
                {{csrf_field()}}
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã số học viên</label>
                    <input type="text" class="form-control"  name="maso" placeholder="CMND/CCCD">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CMND/CCCD</label>
                    <input type="text" class="form-control"  name="cmnd" placeholder="CMND/CCCD">
                  </div>
                   <div class="row">
                   
                    <div class="col-3">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Tỉnh/Thành Phố</label>
                              <input type="text" class="form-control" name="tinh" placeholder="Tỉnh/Thành Phố">
                          </div>
                            </div>
                      <div class="col-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Quận/Huyện</label>
                              <input type="text" class="form-control" name="huyen" placeholder="Quận/Huyện">
                           </div>
                          </div>
                             <div class="col-3">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Phường/Xã</label>
                                  <input type="text" class="form-control" name="xa" placeholder="Phường/Xã">
                              </div>
                            </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã đối tượng</label>
                    
                    <input type="text" class="form-control" name="madoituong" placeholder="Đối tượng thuộc mã"> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên học viên</label>
                    <input type="text" class="form-control" name="tenhv" placeholder="Tên học viên">
                  </div>
                
                  <div class="form-group"> 
                  <label>Số điện thoại</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="sodienthoai" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                  <label for="exampleInputEmail1">Ngày sinh</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>

                    <input type="text" class="form-control" data-inputmask-alias="datetime" name="ngaysinh" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>

                   
                     <label for="exampleInputEmail1">Giới tính</label>


                      <div class="input-group">
                <select class="form-control" name="gioitinh">
                    <option>Nam</option>
                    <option>Nữ</option>
                    <option>Khác</option>
                  </select>
                   
                  </div>
                
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Đồng ý</button>
                  <button type="reset" class="btn btn-primary">Hủy</button>
                </div>
              </form>
            </div>




<!-- kết thúc them  -->
 @endsection