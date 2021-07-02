<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hệ Thống Quản Lý Đào Tạo</title>
    <style>
        .TEN {
            font-family: Verdana;
            text-align: center;
            color: #47098e;
            /* color: #FCC40F; */
            font-size: 1em;
            font-weight: bold;
            text-transform: uppercase;
        }

        .bacground-login img {
            height: 80vh;
            width: 100%;
            object-fit: cover;
            border-radius: 10px;

        }

        .login-box {
            background-color: white;
            border-radius: 10px;
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('frontend/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('frontend/plugins/fullcalendar/main.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/select2/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('frontend/css/adminlte.min.css')}}">


</head>

<body>
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center" style="height: 100vh;  background-color: #dae9fc80;">
            <div class="col-md-11">
                <div class="row" style="height: 80vh;">
                    <div class="bacground-login col-md-8">
                        <img src="{{asset('frontend/img/LoginBackground.jpg')}}" alt="">
                    </div>
                    <div class="login-box col-md-4 p-3 align-self-center" style="height: 80vh;">
                        <div class="text-center  pt-3">
                            <img src="{{asset('frontend/img/logo-2016.png')}}" alt="">
                        </div>
                        <br>
                        <div class="text-center">
                            <h2>Đăng nhập </h2>
                        </div>
                        <br>
                        <div class="">
                            <form action="../../index3.html" method="post">
                                <div class="input-group mb-4">
                                    <input type="email" class="form-control" placeholder="Tên đăng nhập">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-4">
                                    <input type="password" class="form-control" placeholder="Mật khẩu">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <!-- /.social-auth-links -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('frontend/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('frontend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('frontend/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('frontend/js/demo.js')}}"></script>
    <!-- Bootstrap 4 -->
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <!-- DataTables  & Plugins -->
    <script src="{{asset('frontend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>



    <!-- bên tổng quan -->
    <!-- Bootstrap 4 -->
    <!-- ChartJS -->
    <script src="{{asset('frontend/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    <!-- Page specific script -->
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var lineChartData = $.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    'Chrome',
                    'IE',
                    'FireFox',
                    'Safari',
                    'Opera',
                    'Navigator',
                ],
                datasets: [{
                    data: [700, 500, 400, 600, 300, 100],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        })
    </script>
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
    <!-- end -->


    <!-- them tinh huyen  -->
    <!-- jQuery -->
    <!-- Bootstrap 4 -->
    <!-- Select2 -->
    <script src="{{asset('frontend/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
    <!-- end -->


    @yield('script')
    <script src="{{asset('frontend/js/pages/QuanLyHocVien.js')}}"></script>
</body>

</html>