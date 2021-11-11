@extends('layouts.app')
<link href="{{ asset('vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kh_hoTen" class="col-md-4 col-form-label text-md-right">{{ __('Họ tên') }}</label>

                            <div class="col-md-6">
                                <input id="kh_hoTen" type="text" class="form-control @error('kh_hoTen') is-invalid @enderror" name="kh_hoTen" value="{{ old('kh_hoTen') }}" required autocomplete="kh_hoTen" autofocus>

                                @error('kh_hoTen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kh_gioiTinh" class="col-md-4 col-form-label text-md-right">{{ __('Giới tính') }}</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kh_gioiTinh" id="kh_gioiTinh1" value="0">
                                <label class="form-check-label" for="inlineRadio1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kh_gioiTinh" id="kh_gioiTinh2" value="1">
                                <label class="form-check-label" for="inlineRadio2">nữ</label>
                                </div>
                            </div>            
                        </div>
                        <div class="form-group row">
                            <label for="kh_ngaySinh" class="col-md-4 col-form-label text-md-right">{{ __('Ngày sinh') }}</label>
                            <div class="col-md-6">
                                <input type="text" id="kh_ngaySinh" class="form-control" name="kh_ngaySinh" placeholder="Ngày sinh" >
                            </div>
                            
                        </div>
                       
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('vendors/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendors/momentjs/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendors/daterangepicker/daterangepicker.min.js') }}"></script>
<script>
    
    $(document).ready(function() {
        $('#kh_ngaySinh').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: moment('01-01-1900').format("DD-MM-YYYY"),
            maxDate: moment().format("DD-MM-YYYY"),
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