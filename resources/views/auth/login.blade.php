<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="icon" type="image/png" href="{{ asset('logo') }}">
   <!--  <link rel="icon" type="image/png" href="{{ asset('themes/gambo/images/fav.png') }}"> -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('themes/gambo/vendor/unicons-2.0.1/css/unicons.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/night-mode.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/css/step-wizard.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/vendor/OwlCarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/gambo/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/gambo/vendor/semantic/semantic.min.css') }}">
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
                                <a href="{{ route('home') }}"><img src="{{ asset('logo.png') }}" width="10px" alt="logo"></a>
                                <a href="{{ route('home') }}"><b style="font-size: larger;">SMARKET</b></a>
                            </div>
                            <div class="form-dt">
                                <div class="form-inpts checout-address-step">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-title">
                                            <h6>Đăng nhập</h6>
                                        </div>
                                        <div class="form-group pos_rel {{ $errors->has('kh_taiKhoan') ? 'has-error':''}}">
                                            <input id="kh_taiKhoan" name="kh_taiKhoan" type="text"
                                                placeholder="Nhập tài khoản" class="form-control lgn_input @error('kh_taiKhoan') is-invalid @enderror"
                                                required="" @if(Cookie::has('users')) value="{{ Cookie::get('users') }}" @endif required autocomplete="kh_taiKhoan" autofocus>
                                            <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                            @if($errors->has('kh_taiKhoan'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('kh_taiKhoan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group pos_rel {{ $errors->has('kh_matKhau') ? 'has-error':''}}">
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
                                        <div class="form-group row pos_rel">
                                            <div class="col-md-6 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="kh_ghinhodangnhap" id="kh_ghinhodangnhap" {{ old('kh_ghinhodangnhap') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        Ghi nhớ đăng nhập
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="login-btn hover-btn" type="submit">Đăng nhập</button>
                                    </form>
                                </div>
                                <div class="password-forgor">
                                    <a href="{{ route('password.request') }}">Quên mật khẩu</a>
                                </div>
                                <div class="signup-link">
                                    <p>Bạn chưa có tài khoản? - <a href="{{ route('register') }}">Đăng ký</a></p>
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
    <script src="{{ asset('themes/gambo/js/custom.js') }}"></script>
    <script src="{{ asset('themes/gambo/js/product.thumbnail.slider.js') }}"></script>
    <script src="{{ asset('themes/gambo/js/offset_overlay.js') }}"></script>
    <script src="{{ asset('themes/gambo/js/night-mode.js') }}"></script>
</body>
</html>