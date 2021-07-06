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

 <!-- FORM TÌM KIẾM -->
  <div class="card">
    <div class="col-sm-4">

  <div class="form-row">
   
            <form action="timkiemhocvien2" method="post">
                {{ csrf_field() }}
                <div class="row" >
                    <div class="col-md-10 offset-md-1">
                        <div class="row"  margin-top:15px;">
                           <div class="col-3" style="margin-left:100px;">
                                <div class="form-group">
                                    <label>Tỉnh:</label>
                                    <select class="select2" style="width: 100%;" name="tinh">
                                        <option value="all">Tất cả</option>
                                        @foreach($tinh_all as $tinh)
                                            <option value="{{ $tinh->id }}">{{ $tinh->TEN_TINH }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3" >
                                <div class="form-group">
                                    <label>Huyện:</label>
                                    <select class="select2" style="width: 100%;" name="huyen">
                                        <option value="all">Tất cả</option>
                                        @foreach($huyen_all as $huyen)
                                            <option value="{{ $huyen->id }}">{{ $huyen->TEN_HUYEN }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Xã:</label>
                                    <select class="select2" style="width: 100%;" name="xa">
                                        <option value="all">Tất cả</option>
                                        @foreach($xa_all as $xa)
                                            <option value="{{ $xa->id }}">{{ $xa->TEN_XA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                          
                            <div class="col-3" style="margin-left:100px;">
                                <div class="form-group">
                                    <label>Họ tên:</label>
                                    <input type="text" class="form-control" name="ten" placeholder="Tên học viên">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Căn cước/ CMND</label>
                                     <input type="text" class="form-control" name="cmnd" placeholder="Số căn cước/CMND">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Số điện thoại:</label>
                                     <input type="text" class="form-control" name="sdt" placeholder="Số điện thoại">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="margin-left: 980px; margin-right: 160px; margin-top: -1px; width: 200px;">
                            
                                
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default" >
                                        <span>Tìm kiếm</span>
                                        <i class="fa fa-search"></i>
                                    </button>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                 
              

                </div>
              </div>
          
    <!-- KẾT THÚC FORM TÌM KIẾM --> 
 

 @if($datim == 'YES')
    <!-- BẢNG TÌM KIẾM -->
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
            @foreach($banghv as $hocvien)
            <tr>
                <td>{{ $stt++ }}</td>
                <td>{{ $hocvien->HV_HOTEN }}</td>
                <td>{{ $hocvien->HV_GIOITINH }}</td>
                <td>{{ $hocvien->HV_NGAYSINH }}</td>
                <td>
                    @foreach($hocvien->lay_cutruhv as $dc)
                      @if($dc->THUONG_TRU == "YES")
                      {{$dc->DIA_CHI}}, {{$dc->thuoc_xa->TEN_XA}}, {{$dc->thuoc_xa->lay_huyen->TEN_HUYEN}}, {{$dc->thuoc_xa->lay_huyen->lay_tinh->TEN_TINH}}
                      @endif
                    @endforeach
                </td>
                <td>
                    
                     <a class="btn btn-primary btn-sm" href="hoso/{{$hocvien->id}}"">
                <i class="fas fa-folder"></i> </a>

             
              
              <a class="btn btn-primary btn-sm show" id="{{$hocvien -> id}}" data-toggle="modal" data-target="#showHocVien">
                <i class="fas fa-award"></i>
              </a>
              <a class="btn btn-info btn-sm edit" id="{{$hocvien -> id}}" data-toggle="modal" data-target="#editHocVien">
                <i class="fas fa-pencil-alt">
                </i>
              </a>



                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- KẾT THÚC BẢNG TÌM KIẾM -->
  @endif  
 
  
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