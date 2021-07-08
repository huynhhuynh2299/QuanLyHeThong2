@extends('Admin.layout.index')
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách loại hình đào tạo</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Danh sách loại hình đào tạo</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>



  <div class="card">
    <div class="row">
      <div class="col-md-2 mt-3 ml-3">
        <a class="btn btn-primary add" data-toggle="modal" data-target="#addLHDT">
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
            <th>TÊN LOẠI HÌNH ĐÀO TẠO</th>
            <th>CHỨC NĂNG</th>
          </tr>
        </thead>
        <tbody>
          @foreach($LHDT_all as $LHDT)
          <tr>
            <td>{{ $stt++ }}</td>
            <td>{{$LHDT->LH_TEN}}</td>
            <td class="project-actions text-center">
              <a class="btn btn-info btn-sm edit" id="{{$LHDT -> id}}" data-toggle="modal" data-target="#editLHDT">
                <i class="fas fa-pencil-alt">
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
    <div class="modal fade" id="addLHDT" tabindex="1" aria-labelledby="addLHDTModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addLHDTModalLabel">Thêm loại hình đào tạo mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="LHDT/add" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- sua loi 419 -->
              {{csrf_field()}}
              <div class="card-body">
                <div class="form-group">
                  <label for="LH_TEN_ADD">Tên loại hình đào tạo</label>
                  <input type="text" class="form-control" id="LH_TEN_ADD" name="LH_TEN" placeholder="Tên loại hình đào tạo">
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
    <div class="modal fade" id="editLHDT" tabindex="1" aria-labelledby="editLHDTModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editLHDTModalLabel">Chỉnh sửa thông tin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="LHDT/edit" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- sua loi 419 -->
              {{csrf_field()}}
              <div class="card-body">
                <div class="form-group">
                  <label for="LH_TEN_EDIT">Chỉnh sửa thông tin</label>
                  <input type="text" class="form-control" id="LH_TEN_EDIT" name="LH_TEN" placeholder="Tên loại hình đào tạo">
                  <input type="hidden" id="id_LHDT" name="id_LHDT">
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
<script src="{{asset('frontend/js/pages/QuanLyLHDT.js')}}"></script>
@endsection