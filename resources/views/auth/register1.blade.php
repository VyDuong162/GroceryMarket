<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
   <!--  <link rel="icon" type="image/png" href="{{ asset('themes/gambo/images/fav.png') }}"> -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('themes/gambo/vendor/unicons-2.0.1/css/unicons.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/night-mode.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/step-wizard.css') }}" rel="stylesheet">

    <link href="{{ asset('themes/gambo/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/gambo/vendor/semantic/semantic.min.css') }}">
    <link href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
    <style>
        .sign-logo img {
            width: 50px;
        }
        .form-control{
            line-height: 3!important;
        }
        .sign-form .form-dt{
            margin-top: 0px;
        }
        #kh_ngaySinh{
            height: 2.5rem;
        }
      
    </style>
</head>
<body>
<div class="sign-inup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sign-form">
                        <div class="sign-inner">
                            <div class="sign-logo" id="logo">
                                <a href="{{ route('frontend.index') }}"><img src="{{ asset('logo.png') }}" width="10px" alt="logo"></a>
                                <a href="{{ route('frontend.index') }}"><b style="font-size: larger;">SMARKET</b></a>
                            </div>
                            <div class="form-dt">
                                <div class="form-inpts checout-address-step">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-title">
                                            <h6>Đăng ký</h6>
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="kh_hoTen" name="kh_hoTen" type="text" placeholder="Nhập họ tên đầy đủ"
                                                class="form-control lgn_input" required="true">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                            @if($errors->has('kh_hoTen'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_hoTen') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group pos_rel">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                    
                                                    <select class="form-select" name="kh_gioiTinh" id="kh_gioiTinh" aria-label="">
                                                    <option value="0">Nam</option>
                                                    <option value="1">Nữ</option>
                                                    </select> 
                                                    @if($errors->has('kh_gioiTinh'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('kh_gioiTinh') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    
                                                    <input type="text" class="form-control lgn_input" name="kh_ngaySinh" id="kh_ngaySinh" placeholder="Ngày sinh">
                                                    
                                                    @if($errors->has('kh_ngaySinh'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('kh_ngaySinh') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="kh_soDienThoai" name="kh_soDienThoai" type="text" placeholder="Nhập số điện thoại đầy đủ"
                                                class="form-control lgn_input" required="true">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                            @if($errors->has('kh_soDienThoai'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_soDienThoai') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="kh_email" name="kh_email" type="text" placeholder="Nhập email đầy đủ"
                                                class="form-control lgn_input" required="true">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                            @if($errors->has('kh_email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group pos_rel">
                                            <div class="row diachi-form">
                                            <div class="col-md-4">
                                            <label class="form-label">Tỉnh/Thành phố</label>
                                                <select name="ttp_ma" id="ttp_ma" class="form-select">

                                                    @foreach($dsTinhTp as $tp)
                                                    <option value="{{ $tp->ttp_ma }}">{{ $tp->ttp_ten }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                <div class="col-md-4">
                                                <label class="form-label">Quận huyện</label>
                                                <select name="qh_ma" id="qh_ma" class="form-select">
                                                </select>
                                                </div>
                                           
                                           
                                               <div class="col-md-4">
                                               <label class="form-label">Phường xã</label>
                                                <select name="px_ma" id="px_ma" class="form-select">
                                                </select>
                                               </div>
                                            
                                           
                                               
                                            
                                            @if($errors->has('kh_email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_email') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                           
                                        </div>
                                        <div class="form-group pos_rel">
                                        <label class="form-label">Địa chỉ cụ thể</label>
                                        <input type="text" class="form-control lgn_input" name="dc_ten" id="dc_ten" value="{{ old('dc_ten') }}" placeholder="nhập địa chỉ cụ thể">
                                        
                                        @if($errors->has('kh_taiKhoan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_taiKhoan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="kh_taiKhoan" name="kh_taiKhoan" type="text" placeholder="Nhập tài khoản đầy đủ"
                                                class="form-control lgn_input" required="true">
                                            <i class="uil uil-user-circle lgn_icon"></i>
                                            @if($errors->has('kh_taiKhoan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_taiKhoan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group pos_rel">
                                            <input id="password" name="kh_matKhau" type="password"
                                                placeholder="Nhập mật khẩu" class="form-control lgn_input @error('kh_matKhau') is-invalid @enderror"
                                                @if(Cookie::has('pwd'))  value="{{ Cookie::get('pwd') }}" @endif required autocomplete="current-password" >
                                            <i class="uil uil-padlock lgn_icon"></i>
                                            @if($errors->has('kh_matKhau'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_matKhau') }}</strong>
                                                </span>
                                            @endif
                                        </div>     
                                        <button class="login-btn hover-btn" type="submit">Đăng ký</button>
                                    </form>
                                </div>
                                <div class="container col-md-12">
                                    <p>Bạn chưa có tài khoản? - <a href="{{ route('register') }}">Đăng nhập</a></p>
                                </div>
                                   
                                
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text text-center mt-3">
                        <i class="uil uil-copyright"></i>Copyright 2021 <b></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('themes/gambo/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('themes/gambo/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/gambo/vendor/OwlCarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/gambo/vendor/semantic/semantic.min.js') }}"></script>
    <script src="{{ asset('themes/gambo/js/jquery.countdown.min.js') }}"></script>
 
    <script src="{{ asset('themes/gambo/js/offset_overlay.js') }}"></script>
    <script src="{{ asset('themes/gambo/js/night-mode.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/momentjs/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/daterangepicker/daterangepicker.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#kh_ngaySinh').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            autoUpdateInput: false,
            "locale": {
                "format": "DD/MM/YYYY",
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
                ]
            },

        });
    });
</script>
<script>
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
</script>
</body>
</html>
