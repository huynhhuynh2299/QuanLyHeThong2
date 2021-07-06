@extends('Admin.layout.index')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">

<!-- NỘI DUNG PHẦN VIEW -->

<h1>Bảng điểm của học viên {{ $ten_hv }}</h1><br>
<table id="example1" class="table table-bordered table-striped">
        <thead>
           <tr>
               <th>Mã lớp</th>
               <th>Kiểm tra Module 1</th>
               <th>Kiểm tra Module 2</th>
               <th>Kiểm tra Module 3</th>
               <th>Kiểm tra khóa học</th>
               <th>Thi lý thuyết</th>
               <th>Thi thực hành</th>
               <th>Điểm trung bình</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- IN TÊN LỚP -->
                <td>{{ $lop }}</td>

                <!-- IN ĐIỂM LOẠI 1 -->
                <td>
                @foreach($bangdiem as $diem)
                    @if($diem->id_LOAidIEM == 1)
                        {{ $diem->D_GIATRI }}
                        @break
                    @endif
                @endforeach
                </td>

                <!-- IN ĐIỂM LOẠI 2 -->
                <td>
                @foreach($bangdiem as $diem)
                    @if($diem->id_LOAidIEM == 2)
                        {{ $diem->D_GIATRI }}
                        @break
                    @endif
                @endforeach
                </td>

                <!-- IN ĐIỂM LOẠI 3 -->
                <td>
                @foreach($bangdiem as $diem)
                    @if($diem->id_LOAidIEM == 3)
                        {{ $diem->D_GIATRI }}
                        @break
                    @endif
                @endforeach
                </td>

                <!-- IN ĐIỂM LOẠI 4 -->
                <td>
                @foreach($bangdiem as $diem)
                    @if($diem->id_LOAidIEM == 4)
                        {{ $diem->D_GIATRI }}
                        @break
                    @endif
                @endforeach
                </td>

                <!-- IN ĐIỂM LOẠI 5 -->
                <td>
                @foreach($bangdiem as $diem)
                    @if($diem->id_LOAidIEM == 5)
                        {{ $diem->D_GIATRI }}
                        @break
                    @endif
                @endforeach

                <!-- IN ĐIỂM LOẠI 6 -->
                <td>
                @foreach($bangdiem as $diem)
                    @if($diem->id_LOAidIEM == 6)
                        {{ $diem->D_GIATRI }}
                        @break
                    @endif
                @endforeach

                <!-- IN ĐIỂM LOẠI 7 -->
                <td>
                @foreach($bangdiem as $diem)
                    @if($diem->id_LOAidIEM == 7)
                        {{ $diem->D_GIATRI }}
                        @break
                    @endif
                @endforeach
                </td>
            </tr>
        </tbody>
      </table>

<!-- KẾT THÚC PHẦN VIEW -->
</div>
<!-- /.container-fluid -->
</section>
</div>
<!-- ./wrapper -->

@endsection
