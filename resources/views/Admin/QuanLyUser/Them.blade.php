@extends('Admin.layout.index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm người dùng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thêm người dùng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- them hoc vien moi -->

  <hr>
  <form action="user/add" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
      <!-- sua loi 419 -->
      {{csrf_field()}}
      <div class="card-body">
        <div class="form-group">
          <label for="USER_TEN_ADD">Tên người dùng</label>
          <input type="text" class="form-control" id="USER_TEN_ADD" name="USER_TEN" placeholder="Tên người dùng">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="USER_MASO_ADD">Tên đăng nhập</label>
            <input type="text" class="form-control" id="USER_MASO_ADD" name="USER_MASO" placeholder="Tên đăng nhập">
          </div>
          <div class="form-group col-md-6">
            <label for="id_LOAIUSER_ADD">Loại người dùng</label>
            <select class="form-control" id="id_LOAIUSER_ADD" name="id_LOAIUSER">
              @foreach ($loaiuser_all as $loaiuser)
              <option value="{{ $loaiuser -> id}}">{{ $loaiuser -> LU_TEN }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="USER_PASS_ADD">Mật khẩu </label>
          <input type="password" class="form-control" id="USER_PASS_ADD" name="USER_PASS" placeholder="Mật khẩu ">
        </div>
        <div class="form-group">
          <label for="USER_PASS_COMFIRM_ADD">Xác nhận mật khẩu</label>
          <input type="password" class="form-control" id="USER_PASS_COMFIRM_ADD" name="USER_PASS_COMFIRM" placeholder="Xác nhận mật khẩu">
        </div>
      </div>
      <div class="modal-footer ">
        <button type="submit" class="btn btn-primary">Thêm</button>
      </div>
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