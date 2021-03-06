@extends('backend.layouts.master')

@section('title')
Cửa hàng - Danh sách
@endsection

@section('custom-css')
<!-- Datatables CSS CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.0/datatables.min.css"/>
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
    .paginate_button{
        padding: 0px!important;
    }
    .list-btn{
        float: left;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <h2 class=" page-title">Cửa hàng</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Cửa hàng</li>
    </ol>

    <div class="row justify-content-between">
        <div class="col-lg-12 px-4">
            <a href="{{ route('admin.cuahangtaphoa.create') }}" class="add-btn hover-btn">Thêm mới</a>
        </div>
        <form name="frmBulkActions" id="frmBulkActions" class="frmBulkActions" data-url="{{ url('cuahangtaphoa/bulkaction') }}" method="post">
            <div class="col-lg-3 col-md-4">
                <div class="bulk-section mt-30">
                    <div class="input-group">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                        <select id="action" name="action" class="form-control">
                            <option selected value="0">Bulk Actions</option>
                            <option value="1">Hoạt động </option>
                            <option value="2">Không hoạt động</option>
                            <option value="3">Xóa</option>
                        </select>
                        <div class="input-group-append">
                            <button class="status-btn hover-btn" formaction="/cuahangtaphoa/bulkaction"  id="btn_apply" type="submit">Apply</button>
                        </div>

                    </div>

                </div>
            </div>
            </form>
            <div class="col-lg-12 col-md-12" >
                <div class="card card-static-2 mt-30 mb-30">
                    <div class="card-title-2">
                        <h4>Tất cả cửa hàng</h4>
                    </div>
                    <div class="card-body-table">
                        <div class="table-responsive">
                            <table id="cuahangTable" class="table ucp-table table-hover" >
                                <thead>
                                    <tr>
                                        <th style="width:10px" class="px-md-2"><input type="checkbox" class="check-all"></th>
                                        <th style="width:30px">ID</th>
                                        <th style="width:30px">Mã CH</th>
                                        <th>Tên cửa hàng</th>
                                        <th>Hình ảnh</th>
                                        <th>Chủ cửa hàng</th>
                                        <th>Số điện thoại</th>
                                        <th style="width:min-content;">Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Tài khoản ngân hàng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($dsCuaHang as $ch)
                                    <tr>
                                        <td><input type="checkbox" class="check-item" name="ids[]" value="{{$ch->chth_ma}}"></td>
                                        <td>{{ $ch->chth_ma }}</td>
                                        <td>{{ $ch->chth_ma }}{{ $ch->kh_ma }}</td>
                                        <td>{{ $ch->chth_ten }}</td>
                                        <td>
                                            @if(!file_exists('storage/avatarshop/'.$ch->chth_anhDaiDien) || $ch->chth_anhDaiDien==null)
                                            <div class="cate-img-5">
                                                <img src="{{ asset('themes/gambo/images/avatar/default_chth.jpg') }}" width="200px" alt="hinhdaidien">
                                            </div>
                                            @else
                                            <div class="cate-img-5">
                                                <img src="{{ asset('storage/avatarshop/'.$ch->chth_anhDaiDien) }}" width="200px" alt="hinhdaidien">
                                            </div>
                                            @endif
                                        </td>
                                        <td>{{ $ch->khachhang->kh_hoTen}}</td>
                                        <td>{{ $ch->phoneNumber($ch->chth_soDienThoai) }}</td>
                                        <td >{{ $ch->chth_email }}</td>
                                       
                                        @foreach($ch->laydiachi($ch->px_ma) as $dc)
                                        
                                         <td>{{ $dc->diachi }}</td>
                                        @endforeach
                                        <td>{{ $ch->chth_taiKhoanNganHang }}</td>
                                        <td class="action-btns">
                                            <a href="{{ route('admin.cuahangtaphoa.show',$ch->chth_ma) }}" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.cuahangtaphoa.edit',$ch->chth_ma) }}" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('sanpham.cuahangtaphoa',$ch->chth_ma) }}" class="list-btn"><i class="fas fa-list-alt"></i></a>
                                            <form name="frmDelete" id="frmDelete" class="frmDelete" action="{{ route('admin.cuahangtaphoa.destroy',$ch->chth_ma) }}" method="post" data-id="{{$ch->chth_ma}}" data-name="{{$ch->chth_ten}}">
                                                    {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="edit-btn btn-delete" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            </form>
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

@endsection

@section('custom-scripts')
<script src="{{ asset('vendors/sweetalert/sweetalert.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/fc-4.0.0/datatables.min.js"></script>

<script>
  $(document).ready(function() {
        var table = $('#cuahangTable').DataTable({
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
    $('.frmDelete').submit(function(e) {
        e.preventDefault();
        debugger;
        var id = $(this).data('id');
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            html: 'Dữ liệu cửa hàng mã số: <strong>' + id + ' - ' + $(this).data('name') + '</strong> sẽ không thể phục hồi lại được',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!',
            cancelButtonText: 'Hủy bỏ'

        }).then((result) => {
            if (result.isConfirmed) {
                var sendData = (this).serialize;
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    // dataType: "json",
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}',
                        _method: $(this).find('[name="_method"]').val()
                    },
                    success: function(data, textStatus, jqXHR) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Đã xóa thành công',
                            showConfirmButton: false,
                            timer: 1000

                        }).then(function() {
                            location.href = "{{ route('admin.cuahangtaphoa.index') }}"
                        })
                    }

                });

            } else {
                Swal.fire({
                    title: 'Đã hủy xóa',
                    icon: 'info',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        })
        debugger;
    });
    $('.frmBulkActions').submit(function(e) {
        e.preventDefault();
        var giatri = $('#action').val();
        if(giatri == 1){
            var name = "hoạt động";
        }else if(giatri == 2){
            var name = "Không hoạt động";
        }else{
            var name = "Xóa";
            var namehtml ="Dữ liệu cửa hàng sẽ không thể phục hồi lại được";
        }
        if (giatri != 0) {
            var arr = [];
            $(".check-item:checked").each(function() {
                arr.push($(this).attr('value'));
            });
            Swal.fire({
                title: 'Bạn chắc chắn muốn '+name+'?',
                html: namehtml ? namehtml :'',
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
                                title: namehtml ? 'Đã xóa thành công':'Thay đổi thành công',
                                showConfirmButton: false,
                                timer: 1000

                            }).then(function() {
                                location.href = "{{ route('admin.cuahangtaphoa.index') }}"
                            })
                        }

                    });

                } else {
                    Swal.fire({
                        title: namehtml ? 'Đã hủy xóa':'Thay đổi thành công',
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