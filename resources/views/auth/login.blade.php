@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group {{ $errors->has('kh_taiKhoan') ? 'has-error':'' }} row">
                            <label for="kh_taiKhoan" class="col-md-4 col-form-label text-md-right">Tên tài khoản</label>

                            <div class="col-md-6">
                                <input id="kh_taiKhoan" type="text" class="form-control @error('kh_taiKhoan') is-invalid @enderror" name="kh_taiKhoan" value="{{ old('kh_taiKhoan') }}" required autocomplete="kh_taiKhoan" autofocus>

                                @if($errors->has('kh_taiKhoan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kh_taiKhoan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('kh_matKhau') ? 'has-error':'' }} row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="kh_matKhau" required autocomplete="current-password">

                                @error('kh_matKhau'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kh_matKhau') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="kh_ghinhodangnhap" id="kh_ghinhodangnhap" {{ old('kh_ghinhodangnhap') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng nhập
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Quên mật khẩu
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
