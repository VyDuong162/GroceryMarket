@extends('backend.layouts.master')
@section('title')
Khách hàng
@endsection
@section('custom-css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .col-md-6 {
        float: right;
    }

    .is-invalid {
        color: red !important;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <h2 class="mt-30 page-title">Khách hàng</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.khachhang.index') }}">Khách hàng</a></li>
        <li class="breadcrumb-item active">Chỉnh sửa khách hàng</li>
    </ol>
    <form name="frmEdit" id="frmEdit" action="{{route('admin.khachhang.update',$kh->kh_ma)}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card card-static-2 mb-30">
                    <div class="card-title-2">
                        <h4>Chỉnh sửa khách hàng</h4>
                    </div>
                    <div class="card-body-table">
                        <div class="news-content-right pd-20">
                            <div class="form-group">
                                <label class="form-label">Họ tên </label>
                                <input type="text" class="form-control" name="kh_hoTen" id="kh_hoTen" value="{{ old('kh_hoTen',$kh->kh_hoTen) }}" placeholder="Nhập họ tên đầy đủ">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control" name="kh_ngaySinh" id="kh_ngaySinh" value="{{ old('kh_ngaySinh',$kh->kh_ngaySinh->format('d/m/Y ')) }}" required placeholder="d/m/Y: 20/01/2000">
                            </div><label class="form-label">Giới tính</label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kh_gioiTinh" id="kh_gioitinh1" value="0" {{old('kh_gioitinh')==0 ? 'checked':'' }}>
                                    <label class="form-check-label" for="kh_gioitinh1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kh_gioiTinh" id="kh_gioitinh2" value="1" {{old('kh_gioitinh')==1 ? 'checked':'' }}>
                                    <label class="form-check-label" for="kh_gioitinh2">
                                        Nữ
                                    </label>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="kh_soDienThoai" id="kh_soDienThoai" pattern="[0-9]{1}[0-9]{9}" value="{{ old('kh_soDienThoai',$kh->kh_soDienThoai) }}" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="kh_email" id="kh_email" value="{{ old('kh_email',$kh->kh_email) }}" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Địa chỉ cụ thể</label>
                                @if($diachi!= null)
                                <input type="text" class="form-control" name="dc_ten" id="dc_ten" value="{{ old('dc_ten',$diachi->dc_ten) }}" placeholder="nhập địa chỉ cụ thể">
                                @else
                                <input type="text" class="form-control" name="dc_ten" id="dc_ten"  placeholder="nhập địa chỉ cụ thể">
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tỉnh/Thành phố</label>
                                <select name="ttp_ma" id="ttp_ma" class="form-control">

                                    @foreach($dsTinhTp as $tp)
                                    @if(!empty($ttp) && $tp->ttp_ma == $ttp->ttp_ma)
                                    <option value="{{ $tp->ttp_ma }}" selected>{{ $tp->ttp_ten }}</option>
                                    @else
                                    <option value="{{ $tp->ttp_ma }}">{{ $tp->ttp_ten }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Quận huyện</label>
                                <select name="qh_ma" id="qh_ma" class="form-control">

                                    @if(!empty($qh))
                                    <Option value="{{ $qh[0]['qh_ma'] }}" selected>{{ $qh[0]['qh_ten'] }}</Option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phường xã</label>
                                <select name="px_ma" id="px_ma" class="form-control">
                                    @if(!empty($px))
                                    <Option value="{{ $px[0]['px_ma'] }}" selected>{{ $px[0]['px_ten'] }}</Option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Vai trò</label>
                                <select name="vt_ma" id="vt_ma" class="form-control">
                                    @foreach($dsVaiTro as $vt)
                                    @if($vt->ma == $kh->vt_ma)
                                    <option value="{{ $vt->vt_ma }}" selected>{{$vt->vt_ten}}</option>
                                    @else
                                    <option value="{{ $vt->vt_ma }}">{{$vt->vt_ten}}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>

                            <button class="save-btn hover-btn" type="submit">Lưu dữ liệu</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card card-static-2 mb-30">
                    <div class="card-title-2">
                        <h4>Tạo tài khoản</h4>
                    </div>
                    <div class="card-body-table">
                        <div class="news-content-right pd-20">
                            <div class="form-group ">
                                <label class="form-label">Tài khoản</label>
                                <input type="text" class="form-control " disabled name="kh_taiKhoan" id="kh_taiKhoan" value="{{ old('kh_taiKhoan',$kh->kh_taiKhoan) }}" placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="kh_matKhau" id="kh_matKhau" placeholder="Nhập mật khẩu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
@section('custom-scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
    $(function() {
   /*  $('input[name="kh_ngaySinh"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format:"d/m/Y",
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
    }); */
    });
    var url = "{{ url('/khachhang/getquanhuyen') }}"
    $(document).ready(function() {
        $('#ttp_ma').on('change', function() {
            debugger;
            var ttp_ma = $(this).val();
            if (ttp_ma) {
                $.ajax({
                    url: url + '?ttp_ma=' + ttp_ma,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#qh_ma').empty();
                            $('#qh_ma').focus;
                            $('#qh_ma').append('<option value="">-- Chọn quận huyện --</option>');
                            $.each(data, function(key, value) {
                                $('select[name="qh_ma"]').append('<option value="' + value.qh_ma + '">' + value.qh_ten + '</option>')
                            });
                        } else {
                            $('#qh_ma').empty();
                        }
                    }
                });
            } else {
                $('#qh_ma').empty();
            }
            debugger;
        });
        $('#qh_ma').change(function() {
            var qh_ma = $(this).val();
            if (qh_ma) {
                $.ajax({
                    url: url + '?qh_ma=' + qh_ma,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#px_ma').empty();
                            $('#px_ma').focus;
                            $('#px_ma').append('<option value="">-- Chọn phường xã --</option>');
                            $.each(data, function(key, value) {
                                $('select[name="px_ma"]').append('<option value="' + value.px_ma + '">' + value.px_ten + '</option>')
                            });
                        } else {
                            $('#px_ma').empty();
                        }
                    }
                });
            } else {
                $('#px_ma').empty();
            }
        });
    });
    $("#frmEdit").validate({
        rules: {
            kh_hoTen: {
                required: true,
                maxlength: 100
            },
            kh_ngaySinh: {
                required: true,
                minlength: 11,
                maxlength: 11
            },

            kh_gioiTinh: "required",
            kh_soDienThoai: {
                required: true,
                maxlength: 10
            },
            kh_email: {
                required: true,
                email: true
            },
            dc_ten: {
                required: true,
                maxlength: 100
            },
            vt_ma: "required",
            kh_taiKhoan: {
                required: true,
                maxlength: 100
            },
            kh_matKhau: {
                maxlength: 100
            },
        },
        messages: {
            kh_hoTen: {
                required: "Vui lòng nhập họ tên khách hàng",
                maxlength: "Họ tên khách hàng nhập tối đa 100 ký tự"
            },
            kh_ngaySinh: "Vui lòng nhập ngày sinh khách hàng",
            kh_gioiTinh: {
                 required: "Vui lòng chọn giới tinh khách hàng",
                 minlength:" Nhập không đúng định dạng",
                 maxlength:" Nhập không đúng định dạng"
            },
            kh_soDienThoai: {
                required: "Vui lòng nhập số điện thoại khách hàng",
                maxlength: "Số điện thoại khách hàng nhập tối đa 10 ký tự"
            },
            dc_ten: {
                required: "Vui lòng nhập địa chỉ đây đủ khách hàng",
                maxlength: 100
            },
            vt_ma: "Vui lòng chọn vai trò khách hàng",
            kh_email: {
                required: "Vui lòng nhập email khách hàng",
                email: "email khách hàng phải chứa kí tự đuôi @xxx.xxx"
            },
            kh_taiKhoan: {
                required: "Vui lòng nhập tài khoản khách hàng",
                maxlength: "Tài khoản khách hàng nhập tối đa 100 ký tự"
            },
            kh_matKhau: {
                maxlength: "Mật khẩu khách hàng nhập tối đa 100 ký tự"
            }
        },
        errorElement: "em",
        errorPlacement: function(error, element) {
            // Add the `help-block` class lỗi
            error.addClass("is-invalid");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }

            // icon classes hợp lệ.
            if (!element.next("span")[0]) {
                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
            }
        },
        success: function(label, element) {
            // Add the span element, if doesn't exists, and apply the icon classes to it.
            if (!$(element).next("span")[0]) {
                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
            $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
            $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
        }
    });
</script>
@endsection