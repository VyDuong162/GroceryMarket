@extends('backend.layouts.master')

@section('title')
Dashboard
@endsection

@section('custom-css')
<!-- Datatables CSS CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.0/datatables.min.css" />
<style>
    .dashboard-report-card.orange {
        background-color: #ff9800;
        border-color: #ff9800
    }

    .dashboard-report-card.secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .dashboard-report-card.primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-style: none !important;
    }

    .action-btns {
        display: revert;
    }

    input[type=checkbox]:checked:before {
        content: none;
    }

    .btn-delete {
        border: none;
    }

    .paginate_button {
        padding: 0px !important;
    }
</style>
<!-- Các style dành cho thư viện Daterangepicker -->
<link href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<div class="container-fluid">
    <h2 class="page-title">Dashboard</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row" ng-controller="dashboardController">
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card purple">
                <div class="card-content">
                    <span class="card-title">chờ thanh toán</span>
                    <span class="card-count"><%soLuongDHCTT%></span>
                </div>
                <div class="card-media">
                    <i class="fab fa-rev"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card red">
                <div class="card-content">
                    <span class="card-title">Đã hủy</span>
                    <span class="card-count"><%soLuongDHDH%></span>
                </div>
                <div class="card-media">
                    <i class="far fa-times-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card orange">
                <div class="card-content">
                    <span class="card-title">Đang xử lý</span>
                    <span class="card-count"><%soLuongDHDXL%></span>
                </div>
                <div class="card-media">
                    <i class="fas fa-sync-alt rpt_icon"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-report-card primary">
                <div class="card-content">
                    <span class="card-title">Đã giao</span>
                    <span class="card-count"><%soLuongDHDG%></span>
                </div>
                <div class="card-media">
                    <i class="fas fa-check"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-report-card info">
                <div class="card-content">
                    <span class="card-title">Tổng cửa hàng</span>
                    <span class="card-count"><%tongCH%></span>
                </div>
                <div class="card-media">
                    <i class='fas fa-store-alt'></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-report-card secondary">
                <div class="card-content">
                    <span class="card-title">Tổng sản phẩm</span>
                    <span class="card-count"><%tongSanPham%></span>
                </div>
                <div class="card-media">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="dashboard-report-card success">
                <div class="card-content">
                    <span class="card-title">Tổng thu nhập hôm nay</span>
                    <span class="card-count">
                        <% tongDoanhThu | currency:'':true:'4.0'%> <small>VND</small>
                       
                    </span>
                </div>
                <div class="card-media">
                    <i class="fas fa-money-bill rpt_icon"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card card-static-1 mb-30">
                <div class="card-body">
                    <div id="baoCaoDonHang">
                        <form action="#" method="get" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           <div class="form-group">
                        <label for="thoigianLapBaoCao">Thời gian thống kê</label>
                        <input type="text" class="form-control" id="thoigianLapBaoCao">
                        <span id="thoigianLapBaoCaoText" class="notice"></span>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="tuNgay">Từ ngày</label>
                            <input type="text" class="form-control" id="tuNgay" name="tuNgay">
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="denNgay">Đến ngày</label>
                            <input type="text" class="form-control" id="denNgay" name="denNgay">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
                        </form>
                    </div>
                    
                    <div class="col-md-12">
                        <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-12 col-md-12">
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Đơn hàng gần đây</h4>
                    <a href="{{route('admin.donhang.index')}}" class="view-btn hover-btn">Xem tất cả</a>
                </div>
                <div class="card-body-table">
                    <div class="table-responsive">
                    <table id="donhangTable" class="table ucp-table table-hover">
                        <thead>
                            <tr>
                                <th style="width:10px" class="px-md-2"><input type="checkbox" class="check-all"></th>
                                <th style="width:30px">ID</th>
                                <th style="width:30px">Mã ĐH</th>
                                <th style="width:100px">Khách hàng</th>
                                <th>Cửa hàng</th>
                                <th>Ngày đặt</th>
                                <th>Giá trị</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            <tr ng-repeat="dh in dsDonHang">
                                <td><input type="checkbox" class="check-item" name="ids[]" value="<% dh.dh_ma %>"></td>
                                <td><% $index +1 %></td>
                                <td ng-if="dh.dh_ma < 10">DH000<% dh.dh_ma %></td>
                                <td ng-if="dh.dh_ma > 10 && dh.dh_ma < 100">DH00<% dh.dh_ma %></td>

                                        <td><% dh.khachhang.kh_hoTen %></td>
                                        <td><% dh.cuahangtaphoa.chth_ten %></td>
                                        <td><% dh.dh_taoMoi %></td>
                                        <td><% dh.number_format(dh.dh_giaTri,'0',',','.') %> <small>đ</small></td>
                                        <td><% dh.dh_diaChi %></td>
                                        <td><% dh.phoneNumber(dh.dh_soDienThoai) %></td>
                                        <td><% dh.dh_email %></td>
                                        <td>
                                      
                                            <span ng-if="dh.dh_trangThai == 0" class="badge-item badge-status">Chờ thanh toán</span>
                                      
                                            <span ng-if="dh.dh_trangThai == 1" class="badge-item badge-danger">Đã hủy</span>
                                        
                                            <span ng-if="dh.dh_trangThai == 2" class="badge-item badge-warning">Đang Xử lý</span>
                                        
                                            <span ng-if="dh.dh_trangThai == 3" class="badge-item badge-status">Đang giao</span>
                                          
                                            <span ng-if="dh.dh_trangThai == 4" class="badge-item badge-status">Đã giao</span>
                                         
                                            <span ng-if="dh.dh_trangThai == 5" class="badge-item badge-secondary">Chờ đánh giá</span>
                                        
                                            <span ng-if="dh.dh_trangThai == 6" class="badge-item badge-success">Hoàn thành</span>
                                          
                                        </td>
                                        <td class="action-btns">
                                          
                                            <a ng-href="admin/donhang/<%dh.dh_ma%>" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
                                            <a ng-href="admin/donhang/<%dh.dh_ma%>/edit" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                        
                                            <a ng-if="dh.dh_trangThai >= 4" ng-href="donhang/inhoadon/<%dh.dh_ma%>" class="btn-print" style="float: left;" title="Print"><i class="fas fa-print"></i></a>
                                        </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-scripts')
<script src="{{ asset('themes/gambo/vendor/chart/highcharts.js')}}"></script>
<script src="{{ asset('themes/gambo/vendor/chart/exporting.js')}}"></script>
<script src="{{ asset('themes/gambo/vendor/chart/export-data.js')}}"></script>
<script src="{{ asset('themes/gambo/vendor/chart/accessibility.js')}}"></script>
<script src="{{ asset('themes/gambo/vendor/chart/chart.js')}}"></script>
<!-- Các script dành cho thư viện Daterangepicker -->
<script type="text/javascript" src="{{ asset('vendors/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('vendors/sweetalert/sweetalert.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.0/datatables.min.js"></script>

<script>
    app.controller('dashboardController',function($scope,$http){
        function thongKeData(){
            $http({
            method:'GET',
            url:"{{ route('api.thongke.donhang.chothanhtoan') }}"
            }).then(function successCallback(response){
                $scope.soLuongDHCTT = response.data.result[0].soLuong; 
            });
            $http({
            method:'GET',
            url:"{{ route('api.thongke.donhang.dahuy') }}"
            }).then(function successCallback(response){
                $scope.soLuongDHDH = response.data.result[0].soLuong;
            });
            $http({
            method:'GET',
            url:"{{ route('api.thongke.donhang.dangxuly') }}"
            }).then(function successCallback(response){
                $scope.soLuongDHDXL = response.data.result[0].soLuong;
            });
            $http({
            method:'GET',
            url:"{{ route('api.thongke.donhang.dagiao') }}"
            }).then(function successCallback(response){
                $scope.soLuongDHDG = response.data.result[0].soLuong;
            });
            $http({
            method:'GET',
            url:"{{ route('api.thongke.tongsanpham') }}"
            }).then(function successCallback(response){
                $scope.tongSanPham = response.data.result[0].soLuong;
            });
            $http({
            method:'GET',
            url:"{{ route('api.thongke.tongcuahang') }}"
            }).then(function successCallback(response){
                $scope.tongCH = response.data.result[0].soLuong;
            });
            $http({
            method:'GET',
            url:"{{ route('api.thongke.doanhthuhomnay') }}"
            }).then(function successCallback(response){
                $scope.tongDoanhThu = response.data.result[0].tong;
            });
        }
        thongKeData();
        setInterval(function() {
            getData();
        }, 1000 * 60 * 5);
        $scope.dsDonHang =[];
        $http({
            url: "{{ route('api.donhang.ganday') }}",
            method: "GET"
        }).then(function successCallback(response){
            console.log(response.data.result);
            $scope.dsDonHang = response.data.result;
        },function errorCallback(response){
            console.log(response);
        });
    });
</script>
<script>
   $(document).ready(function() {
        $('#thoigianLapBaoCao').daterangepicker({
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Đồng ý",
                "cancelLabel": "Hủy",
                "fromLabel": "Từ",
                "toLabel": "Đến",
                "customRangeLabel": "Tùy chọn",
                "weekLabel": "T",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                "firstDay": 1
            },
            "startDate": "15/07/2020",
            "endDate": "21/07/2022",
            ranges: {
                'Hôm nay': [moment(), moment()],
                'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 ngày gần nhất': [moment().subtract(6, 'days'), moment()],
                '30 ngày gần nhất': [moment().subtract(29, 'days'), moment()],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Tháng rồi': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            // Hiển thị thời gian đã chọn
            $('#thoigianLapBaoCaoText').html('Dữ liệu sẽ được thống kê từ <span style="font-weight: bold">' + start.format('DD/MM/YYYY, HH:mm') + '</span> đến <span style="font-weight: bold">' + end.format('DD/MM/YYYY, HH:mm') + '</span><br />Thời gian lập báo cáo có thể tốn vài phút, vui lòng bấm nút <span style="font-weight: bold">"Lập báo cáo"</span> và chờ đợi trong giây lát!');

            // Gán giá trị cho Ngày để gởi dữ liệu về Backend
            $('#tuNgay').val(start.format('YYYY-MM-DD'));
            $('#denNgay').val(end.format('YYYY-MM-DD'));
        });
    });
    $(document).ready(function() {
        var table = $('#donhangTable').DataTable({
            dom: "<'row'<'col-md-12 text-center'B>><'row'<'col-md-6'l><'col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-md-6'i><'col-md-6'p>>",
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            language: {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                },
                buttons: {
                    "copy": "Sao chép",
                    "excel": "Xuất ra file Excel",
                    "pdf": "Xuất ra file PDF",
                }
            },
            "lengthMenu": [
                [10, 15, 20, 25, 50, 100, -1],
                [10, 15, 20, 25, 50, 100, "Tất cả"]
            ]
        });
    });

    // Checkbox All Selection
    $(".check-all").click(function() {
        $(".check-item").prop('checked', $(this).prop('checked'));
    });





</script>

    <!-- Các script dành cho thư viện Numeraljs -->
<script src="{{ asset('vendors/numeraljs/numeral.min.js') }}"></script>
<script>
       // Đăng ký tiền tệ VNĐ
       numeral.register('locale', 'vi', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'k',
            million: 'm',
            billion: 'b',
            trillion: 't'
        },
        ordinal: function(number) {
            return number === 1 ? 'một' : 'không';
        },
        currency: {
            symbol: 'vnđ'
        }
    });

    // Sử dụng locate vi (Việt nam)
    numeral.locale('vi');

</script>
 
<!-- Các script dành cho thư viện ChartJS -->
<script src="{{ asset('vendors/Chart.js/Chart.min.js') }}"></script>
<script>
     $(document).ready(function() {
        var objChart;
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");

        $("#btnLapBaoCao").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('api.baocao.donhang') }}",
                type: "GET",
                data: {
                    tuNgay: $('#tuNgay').val(),
                    denNgay: $('#denNgay').val(),
                },
                success: function(response) {
                    var myLabels = [];
                    var myData = [];
                    var myData1 = [];
                    $(response.data).each(function() {
                        myLabels.push(this.ngay);
                        myData.push(this.tongTien);
                        myData1.push(this.soLuong);
                    });
                    myData.push(0); // creates a '0' index on the graph
                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }

                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "line",
                        
                        data: {
                            labels: myLabels,
                            datasets: [
                                {
                                label: 'tổng tiền',
                                data: myData,
                                borderColor: '#007bff',
                                backgroundColor: '',
                                },
                                {
                                label: 'đơn hàng',
                                data: myData1,
                                borderColor: '#dc3545',
                                backgroundColor: '',
                                }]
                        },

                        // Configuration options go here
                        options: {
                            responsive: true,
                            plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Chart.js Line Chart'
                            }
                            }
                        }
                    });
                }
            });
        });
    });
</script>
   

@endsection