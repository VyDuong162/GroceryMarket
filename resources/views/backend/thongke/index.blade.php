@extends('backend.layouts.master')

@section('title')
Thống kê
@endsection

@section('custom-css')
<!-- Datatables CSS CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.0/datatables.min.css" />
<link href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
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
        <div class="col-xl-12 col-md-12">
            <div class="card card-static-1 mb-30">
                <div class="card-body">
                <h5 class="card-title">Thống kê doanh thu</h5>
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
                url: "{{ route('api.baocao.donhang') }}?vt_ma={{Session::get('user')[0]->vt_ma}}&&kh_ma={{Session::get('user')[0]->kh_ma}}",
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