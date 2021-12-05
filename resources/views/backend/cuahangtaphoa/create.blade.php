@extends('backend.layouts.master')
@section('title')
Cửa hàng - Thêm mới
@endsection
@section('custom-css')
<style>
    .col-md-6 {
        float: right;
    }

    .is-invalid {
        color: red !important;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid">
    <h2 class=" page-title">Cửa hàng</h2>
    <ol class="breadcrumb mb-30">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.cuahangtaphoa.index') }}">Cửa hàng</a></li>
        <li class="breadcrumb-item active">Thêm mới cửa hàng</li>
    </ol>
    <form name="frmCreate" id="frmCreate" action="{{route('admin.cuahangtaphoa.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card card-static-2 mb-30">
                    <div class="card-title-2">
                        <h4>Thêm mới cửa hàng</h4>
                    </div>
                    <div class="card-body-table">
                        <div class="news-content-right pd-20">
                            <div class="form-group">
                                <label class="form-label">Chủ của hàng</label>
                                   <select name="kh_ma" id="kh_ma" class="form-control">
                                       @if(Auth::user()->vt_ma==2)
                                        <option value="{{Auth::user()->kh_ma}}">{{Auth::user()->kh_hoTen}}</option>
                                       @else
                                        <option value=" ">-- Chọn khách hàng --</option>
                                            @foreach($dsKhachHang as $kh)
                                            <option value="{{ $kh->kh_ma }}">{{ $kh->kh_hoTen }}</option>
                                            @endforeach
                                        @endif 
                                   </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tên cửa hàng</label>
                                <input type="text" class="form-control" name="chth_ten" id="chth_ten" value="{{ old('chth_ten') }}" placeholder="Nhập tên của hàng đầy đủ">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="chth_soDienThoai" id="chth_soDienThoai" pattern="[0-9]{1}[0-9]{9}" value="{{ old('chth_soDienThoai') }}" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="chth_email" id="chth_email" value="{{ old('chth_email') }}" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tài khoản ngân hàng</label>
                                <input type="text" class="form-control" name="chth_taiKhoanNganHang" id="chth_taiKhoanNganHang" value="{{ old('chth_taiKhoanNganHang') }}" placeholder="Nhập tài khoản ngân hàng">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Địa chỉ cụ thể</label>
                                <input type="text" class="form-control" name="chth_diaChi" id="chth_diaChi" value="{{ old('chth_diaChi') }}" placeholder="nhập địa chỉ cụ thể">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tỉnh/Thành phố</label>
                                <select name="ttp_ma" id="ttp_ma" class="form-control">

                                    @foreach($dsTinhTp as $tp)
                                    <option value="{{ $tp->ttp_ma }}">{{ $tp->ttp_ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Quận huyện</label>
                                <select name="qh_ma" id="qh_ma" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phường xã</label>
                                <select name="px_ma" id="px_ma" class="form-control">
                                </select>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card card-static-2 mb-30">
                    <div class="card-title-2">
                        <h4>Mô tả ngắn</h4>
                    </div>
                    <div class="card-body-table">
                        <div class="news-content-right pd-20">
                            <div class="form-group">
                                <label class="form-label">Hình ảnh đại diện</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="chth_anhDaiDien" id="chth_anhDaiDien" aria-describedby="chth_anhDaiDien">
                                        <label class="custom-file-label" for="chth_anhDaiDien">Choose Image</label>
                                    </div>
                                </div>
                                <div class="product-img p-0 m-0">
                                    <img id="preview-img-chth_anhDaiDien" src="#" alt="" height="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mô tả cửa hàng</label>
                                <textarea class="form-control" name="chth_moTa" id="chth_moTa" cols="30" rows="10">  {{ old('chth_moTa') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 ml-4">
                <button class="save-btn hover-btn" type="submit">Lưu dữ liệu</button>
            </div> 
        </div>
    </form>

</div>
@endsection
@section('custom-scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>
<script>
     const reader = new FileReader();
    const fileInput = document.getElementById("chth_anhDaiDien");
    const img = document.getElementById("preview-img-chth_anhDaiDien");
    reader.onload = e => {
        img.src = e.target.result;
    }
    fileInput.addEventListener('change', e => {
        const f = e.target.files[0];
        reader.readAsDataURL(f);
    })
    CKEDITOR.replace('chth_moTa');
    $(document).ready(function($){
        $('#kh_ma').select2();
    });
    var url ="{{ url('/khachhang/getquanhuyen') }}"
    $(document).ready(function(){
        $('#ttp_ma').on('change',function(){
            var ttp_ma = $(this).val();
            if(ttp_ma){
                $.ajax({
                    url: url +'?ttp_ma='+ttp_ma,
                    type:"GET",
                    data:{"_token":"{{ csrf_token() }}"},
                    dataType:"json",
                    success:function(data){
                        if(data){
                            $('#qh_ma').empty();
                            $('#qh_ma').focus;
                            $('#qh_ma').append('<option value="">-- Chọn quận huyện --</option>');
                            $.each(data, function(key, value){
                                $('select[name="qh_ma"]').append('<option value="' + value.qh_ma +'">' + value.qh_ten+ '</option>')
                            });
                        }else{
                            $('#qh_ma').empty();
                        }
                    }
                });
            }else{
                $('#qh_ma').empty();
            }
        });
        $('#qh_ma').change(function(){
            var qh_ma = $(this).val();
            if(qh_ma){
                $.ajax({
                    url: url + '?qh_ma='+qh_ma,
                    type:"GET",
                    data:{"_token":"{{ csrf_token() }}"},
                    dataType:"json",
                    success:function(data){
                        if(data){
                            $('#px_ma').empty();
                            $('#px_ma').focus;
                            $('#px_ma').append('<option value="">-- Chọn phường xã --</option>');
                            $.each(data,function(key,value){
                                $('select[name="px_ma"]').append('<option value="'+value.px_ma+'">'+value.px_ten+'</option>')
                            });
                        }else{
                            $('#px_ma').empty();
                        }
                    }
                });
            }else{
                $('#px_ma').empty();
            }
        });
    });
    $("#frmCreate").validate({
        rules: {
            kh_ma: "required",
            chth_ten: {
                required: true,
                maxlength: 100
            },
            chth_soDienThoai: {
                required: true,
                maxlength: 10
            },
            chth_email: {
                required: true,
                email: true
            },
            chth_diaChi: {
                required: true,
                maxlength: 100
            },
            chth_taiKhoanNganHang:"required",
            px_ma:"required",
            chth_moTa:"maxlength:1000"
        },
        messages: {
            kh_ma: "Vui lòng chọn chủ cửa hàng",
            chth_ten: {
                required: "Vui lòng nhập tên cửa hàng",
                maxlength: "Tên cửa hàng nhập tối đa 100 ký tự"
            },
            chth_soDienThoai: {
                required: "Vui lòng nhập số điện thoại cửa hàng",
                maxlength: "Số điện thoại cửa hàng nhập tối đa 10 ký tự"
            },
            chth_diaChi: {
                required: "Vui lòng nhập địa chỉ đầy đủ cửa hàng",
                maxlength: 100
            },
            chth_taiKhoanNganHang:"Vui lòng chọn nhập số tài khoản",
            px_ma:"Vui lòng chọn phường xã",
            chth_moTa: {
                maxlength: "Mật khẩu cửa hàng nhập tối đa 1000 ký tự"
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