@extends('backend.layouts.master')

@section('title')
Cửa hàng - Sản phẩm
@endsection
@section('custom-css')
<!-- Datatables CSS CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.0/datatables.min.css" />
<link href="{{ asset('vendors/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
<style>
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

    .list-btn {
        float: left;
    }
</style>

@endsection
@section('content')
<h2 class=" page-title">Cửa hàng</h2>
<ol class="breadcrumb mb-30">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.cuahangtaphoa.index') }}">Cửa hàng</a></li>
    <li class="breadcrumb-item active">Sản phẩm cửa hàng</li>
</ol>
<div class="row">
    <div class="col-lg-3 col-md-4">
        <form name="frmCapNhatGia" id="frmCapNhatGia" action="{{ route('sanpham.gia') }}" method="post">
            {{ csrf_field() }}
            <div class="card card-static-2 mb-30">
                <div class="card-title-2">
                    <h4>Thêm mới sản phẩm</h4>
                </div>
                <div class="card-body-table">
                    <div class="news-content-right pd-20">
                        <div class="form-group">
                            <label class="form-label">Sản phẩm*</label>
                            <select id="sp_ma" name="sp_ma" class="form-control">
                                <option selected>--Chọn sản phẩm--</option>
                                @foreach($dsSanPham as $sp)
                                <option value="{{$sp->sp_ma}}">{{$sp->sp_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Giá sản phẩm*</label>
                            <input type="text" class="form-control" name="dgmh_gia" id="dgmh_gia" placeholder="">
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-label">Trạng thái*</label>
                            <select id="sp_trangThai" name="sp_trangThai" class="form-control">
                                <option value="1" selected>Hoạt động</option>
                                <option value="2">không hoạt động</option>
                            </select>
                        </div>
                        <button class="save-btn hover-btn" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </form>


    </div>
    <div class="col-lg-9 col-md-8">
        <div class="all-cate-tags">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-5">
                </div>
                <div class="col-lg-5 col-md-7" style="margin-bottom: -5em;">
                    <form name="frmSearch" name="frmSearch" method="GET" action="/backend/sanpham/cuahangtaphoa/search">
                        <?php $id_ma = $chth_ma ?>
                        <input type="hidden" name="chth_ma" value="{{$id_ma }}">
                        <div class="bulk-section text-left mb-30">

                            <div class="search-by-name-input mr-0">
                                <select id="status" name="status" class="form-control">
                                    <option selected value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                </select>
                            </div>
                            <button class="status-btn hover-btn" id="btn-timkiem" type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form name="frmBulkActions" id="frmBulkActions" class="frmBulkActions" data-url="{{ url('sanpham/bulkaction') }}" method="post">
            <div class="all-cate-tags">
                <div class="row justify-content-between">
                    <div class="col-lg-4 col-md-5">
                        <div class="bulk-section mb-30">
                            <div class="input-group">
                                {{csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <select id="action" name="action" class="form-control">
                                    <option selected>Bulk Actions</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động </option>
                                    <option value="3">Xóa</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="status-btn hover-btn" id="btn-bulkaction" type="submit">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-static-2 mb-30">
                            <div class="card-title-2">
                                <h4>Sản phẩm cửa hàng</h4>

                            </div>
                            <div class="card-body-table">
                                <div class="table-responsive">
                                    <table id="spcuahangTable" class="table ucp-table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:10px" class="px-md-2"><input type="checkbox" class="check-all"></th>
                                                <th style="width:10px">ID</th>
                                                <th style="width:10px">MSP</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Trạng thái</th>
                                                <th style="width:5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0 ?>
                                            @foreach($dsSanPham as $sp)
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="ids[]" value="{{$sp->sp_ma}}"></td>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$sp->sp_ma}}</td>
                                                <td>{{$sp->sp_ten}}</td>
                                                <td>{{ number_format($sp->dgmh_gia,'0',',','.') }} <small>đ</small></td>
                                                <td><span class="badge-item badge-status">{{$sp->sp_trangThai == 1? 'Hoạt động':'Không hoạt động'}}</span></td>
                                                <td style="width:5%" class="action-btns">
                                                    <a href="{{route('admin.sanpham.edit',$sp->sp_ma)}}" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
    </div>
</div>
@endsection
@section('custom-scripts')
<script src="{{ asset('vendors/sweetalert/sweetalert.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.0/datatables.min.js"></script>
<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendors/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendors/input-mask/bindings/inputmask.binding.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('#spcuahangTable').DataTable({
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
                [5, 10, 15, 20, 25, 50, 100, -1],
                [5, 10, 15, 20, 25, 50, 100, "Tất cả"]
            ]
        });
    });
    $('.check-all').click(function() {
        $(".check-item").prop('checked', $(this).prop('checked'));
    });
    $(document).ready(function() {
        $('#dgmh_gia').inputmask({
            alias: 'currency',
            positionCaretOnClick: "radixFocus",
            radixPoint: ".",
            _radixDance: true,
            numericInput: true,
            groupSeparator: ",",
            suffix: 'vnđ',
            min: 0, // 0 ngàn
            max: 200000000, // 1 trăm triệu
            autoUnmask: true,
            removeMaskOnSubmit: true,
            unmaskAsNumber: true,
            inputtype: 'text',
            placeholder: "0",
            definitions: {
                "0": {
                    validator: "[0-9\uFF11-\uFF19]"
                }
            }
        });
    });
    $('.frmBulkActions').submit(function(e) {
        e.preventDefault();
        var giatri = $('#action').val();
        if (giatri == 1) {
            var name = "hoạt động";
        } else if (giatri == 2) {
            var name = "Không hoạt động";
        } else {
            var name = "Xóa";
            var namehtml = "Dữ liệu sản phẩm sẽ không thể phục hồi lại được";
        }
        if (giatri != 0) {
            var arr = [];
            $(".check-item:checked").each(function() {
                arr.push($(this).attr('value'));
            });
            Swal.fire({
                title: 'Bạn chắc chắn muốn ' + name + '?',
                html: namehtml ? namehtml : '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!',
                cancelButtonText: 'Hủy bỏ'

            }).then((result) => {
                if (result.isConfirmed) {
                    var sendData = [];
                    sendData = arr;
                    $.ajax({
                        type: $(this).attr('method'),
                        url: $(this).data('url'),
                        data: {
                            action: giatri,
                            ids: sendData,
                            _token: '{{ csrf_token() }}',
                            _method: $(this).find('[name="_method"]').val()
                        },
                        success: function(data, textStatus, jqXHR) {
                            Swal.fire({
                                icon: 'success',
                                title: namehtml ? 'Đã xóa thành công' : 'Thay đổi thành công',
                                showConfirmButton: false,
                                timer: 1000

                            }).then(function() {
                                location.reload();
                            })
                        }

                    });

                } else {
                    Swal.fire({
                        title: namehtml ? 'Đã hủy xóa' : 'Thay đổi thành công',
                        icon: 'info',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            })
        }
    });
</script>
@endsection