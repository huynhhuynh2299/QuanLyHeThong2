@extends('Admin.layout.index')
@section('content')

   <style>
     button{
      
      border: 0px;
     }
   </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách hồ sơ</h1>
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
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr class="project-actions text-center">
            <th>Mã hồ sơ</th>
            <th>Tên lớp</th>
            <th>Chức năng</th>

          </tr>
        </thead>
        <tbody>
        @foreach($lop as $l)

           @foreach($hoctailop as $hv )
           @if($hv->id_LOP == $l->id)
           @foreach($khoahoc as $kh)
            @if($l->id_KHOAHOC == $kh->id)
          <tr>
             <td>{{$hv->id_HOCVIEN}}/{{$kh->KH_MASO}}/{{$l->thuoc_nghe->NN_MASO}}</td>
             <td>{{$l->L_TEN}}</td>
             <td  class="project-actions text-center" style="width: 200px;">
              <!--    <a class="btn btn-primary btn-sm" href="pdf/{{$hv->id_HOCVIEN}}">
                              <i class="fas fa-print"></i>
                              In

                          </a> -->
                   <form action="pdf" method="post">
                           {{csrf_field()}}
                          <input type="hidden" name="id_hv" value="{{$hv->id_HOCVIEN}}">
                          <input type="hidden" name="id_lop" value="{{$hv->id_LOP}}">

                          <button type="submit" >  <a class="btn btn-primary btn-sm" >
                              <i class="fas fa-print"></i>
                              In

                          </a></button>
                        </form>
                        

              <a class="btn btn-info btn-sm edit" id="{{$hv -> id}}" data-toggle="modal" data-target="#editHocVien" style="margin-top:-59px; margin-left:90px;">
                <i class="fas fa-pencil-alt">
                </i>
              </a>
              

             </td>

          </tr>
       @endif
       @endforeach
       @endif
       @endforeach

    @endforeach
      </table>
</div>
</div>
    <div class="container-fluid">
      <ul class=" alert text-danger">
        @foreach ( $errors -> all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      <!-- /.card-body -->
    </div>

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
