@extends('Admin.layout.index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm loại người dùng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Thêm loại người dùng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- them hoc vien moi -->

  <hr>
  <form action="loaiuser/add" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
      <!-- sua loi 419 -->
      {{csrf_field()}}
      <div class="card-body">
        <div class="form-group">
          <label for="LU_TEN_ADD">Tên loại người dùng</label>
          <input type="text" class="form-control" id="LU_TEN_ADD" name="LU_TEN" placeholder="Tên người dùng">
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