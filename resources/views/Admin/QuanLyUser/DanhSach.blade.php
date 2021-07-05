@extends('Admin.layout.index')
@section('content')
<!-- Check user -->
<?php
$admin_login = Session()->get('admin_login');
if (!$admin_login) {
  header("refresh:0; url= danhsachhocvien");
  die();
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách người dùng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách người dùng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <div class="card">
    <div class="col-md-12">
      <form action="danhsachuser?filter=true" method="get" enctype="multipart/form-data">
        <label for="id_LOAIUSER_FILTER">Lọc theo loại người dùng</label>
        <div class="form-row">
          <div class="form-group col-md-4">
            <select class="select2" style="width: 100%;" type="submit" id="id_LOAIUSER_FILTER" name="id_LOAIUSER">
              <option selected="selected" value="0">Tất cả người dùng</option>
              @foreach($loaiuser_all as $loaiuser)
              <option <?php if (isset($_GET['id_LOAIUSER'])) {
                        if ($loaiuser->id == $_GET['id_LOAIUSER']) echo "selected=\"selected\"";
                      } ?> value="{{$loaiuser->id}}">{{$loaiuser->LU_TEN}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-1">
            <button id="add-new-event" type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Lọc</button>
          </div>
          <div class="col-md-2">
            <a class="btn btn-primary add" data-toggle="modal" data-target="#addUser">
              <i class="fas fa-plus">
              </i>
              Thêm
            </a>
          </div>
        </div>
      </form>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>STT</th>
            <th>TÊN NGƯỜI DÙNG</th>
            <th>TÊN ĐĂNG NHẬP</th>
            <th>CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user_all as $user)
          <tr>
            <td>{{ $stt++ }}</td>
            <td>{{$user->USER_TEN}}</td>
            <td>{{$user->USER_MASO}}</td>
            <td class="project-actions text-center">
              <a class="btn btn-info btn-sm edit" id="{{$user -> id}}" data-toggle="modal" data-target="#editUser">
                <i class="fas fa-pencil-alt">
                </i>
              </a>
              <a class="btn btn-danger btn-sm" href="user/{{$user -> id}}/xoa">
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
    <!-- Form Add -->
    <div class="modal fade" id="addUser" tabindex="1" aria-labelledby="addUserModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">Thêm người dùng</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- Form Edit -->
    <div class="modal fade" id="editUser" tabindex="1" aria-labelledby="editUserModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Chỉnh sửa thông tin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="user/edit" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- sua loi 419 -->
              {{csrf_field()}}
              <div class="card-body">
                <label for="USER_PASS_EDIT">Chỉnh sửa thông tin</label>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <span for="USER_TEN_EDIT">Tên người dùng</span>
                    <input type="text" class="form-control" id="USER_TEN_EDIT" name="USER_TEN" placeholder="Tên người dùng">
                    <input type="hidden" id="id_USER" name="id_USER">
                  </div>
                  <div class="form-group col-md-6">
                    <span for="id_LOAIUSER_EDIT">Loại người dùng</span>
                    <select class="form-control" id="id_LOAIUSER_EDIT" name="id_LOAIUSER">
                      @foreach ($loaiuser_all as $loaiuser)
                      <option value="{{ $loaiuser -> id}}">{{ $loaiuser -> LU_TEN }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <hr>
                <label for="USER_PASS_EDIT">Đổi mật khẩu</label>
                <div class="form-group">
                  <span for="USER_PASS_EDIT">Mật khẩu hiện tại</span>
                  <input type="password" class="form-control" id="USER_PASS_EDIT" name="USER_PASS" placeholder="Mật khẩu hiện tại">
                </div>
                <div class="form-group">
                  <span for="USER_PASS_NEW_EDIT">Mật khẩu mới</span>
                  <input type="password" class="form-control" id="USER_PASS_NEW_EDIT" name="USER_PASS_NEW" placeholder="Mật khẩu mới">
                </div>
                <div class="form-group">
                  <span for="USER_PASS_COMFIRM_EDIT">Xác nhận mật khẩu</span>
                  <input type="password" class="form-control" id="USER_PASS_COMFIRM_EDIT" name="USER_PASS_COMFIRM" placeholder="Xác nhận mật khẩu">
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
  </div>


  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

@endsection
@section('script')
<script src="{{asset('frontend/js/pages/QuanLyUser.js')}}"></script>
@endsection