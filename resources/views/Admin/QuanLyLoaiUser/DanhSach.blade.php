@extends('Admin.layout.index')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách loại người dùng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách loại người dùng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <div class="card">
    <div class="row">
      <div class="col-md-2 mt-3 ml-3">
        <a class="btn btn-primary add" data-toggle="modal" data-target="#addLoaiUser">
          <i class="fas fa-plus">
          </i>
          Thêm
        </a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>TÊN LOẠI NGƯỜI DÙNG</th>
            <th>CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
          @foreach($loaiuser_all as $loaiuser)
          <tr>
            <td>{{ $stt++ }}</td>
            <td>{{$loaiuser->LU_TEN}}</td>
            <td class="project-actions text-center">
              <a class="btn btn-info btn-sm edit" id="{{$loaiuser -> id}}" data-toggle="modal" data-target="#editLoaiUser">
                <i class="fas fa-pencil-alt">
                </i>
              </a>
              <a class="btn btn-danger btn-sm" href="loaiuser/{{$loaiuser -> id}}/xoa">
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
    <!-- Form add -->
    <div class="modal fade" id="addLoaiUser" tabindex="1" aria-labelledby="addLoaiUserModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addLoaiUserModalLabel">Thêm loại người dùng mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

    <!-- Form edit -->
    <div class="modal fade" id="editLoaiUser" tabindex="1" aria-labelledby="editLoaiUserModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editLoaiUserModalLabel">Chỉnh sửa thông tin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="loaiuser/edit" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- sua loi 419 -->
              {{csrf_field()}}
              <div class="card-body">
                <div class="form-group">
                  <label for="LU_TEN_EDIT">Chỉnh sửa thông tin</label>
                  <input type="text" class="form-control" id="LU_TEN_EDIT" name="LU_TEN" placeholder="Tên loại người dùng">
                  <input type="hidden" id="id_LOAIUSER" name="id_LOAIUSER">
                </div>
              </div>
              <div class="modal-footer ">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
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
@section('script')
<script src="{{asset('frontend/js/pages/QuanLyLoaiUser.js')}}"></script>
@endsection