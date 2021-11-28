@extends('frontend.layouts.master')
@section('title')
Cửa hàng
@endsection

@section('custom-css')
<style>
    .product-item {
        display: none;
    }

    .show-less-btn {
        height: 40px;
        padding: 0 20px;
        border: 0;
        border-radius: 5px;
        color: #fff;
        background: #f55d2c;
        text-align: center;
        font-weight: 600;
        display: none;
    }
</style>
@endsection

@section('main-content')
<div class="gambo-Breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('frontend.shop') }}">Cửa hàng</a></li>
                        <li class="breadcrumb-item  active" aria-current="page">{{ $shop->chth_ten }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="all-product-grid">
    <div class="container" ng-controller="ShopController">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-top-dt">
                    <div class="product-left-title" ng-show ="!show">
                        <h2>Chi tiết cửa hàng </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-6">
                        <span style="text-align: left; font-weight: 600;"><i>Thông tin cửa hàng</i></span>
                        
                            <div class="pdp-group-dt">
                                <div class="item">
                                @if(file_exists('storage/avatarshop/'.$shop->chth_anhDaiDien))
                                <img src="{{ asset('storage/avatarshop/'.$shop->chth_anhDaiDien) }}" height="200px" alt="">
                                @else
                                <img src="{{ asset('storage/avatarshop/') }}/0chth.jpg" height="200px" alt="">
                                <div class="product-absolute-options"></div>
                                @endif
                                </div>
                                <div class="pdp-text-dt">
                                    <span style="font-size: larger; font-weight: bold;">{{ $shop->chth_ten }}</span>
                                    <p>{{ $shop->chth_soDienThoai }}
                                        {{ $shop->chth_email }}
                                    </p>
                                    <p>{{ $shop->chth_diaChi }}</p>
                                </div>
                            </div>
                       
                    </div>
                    <div class="col-md-6 mt-3">
                        <table class="table mt-5" style="bottom: 0rem; width:40%; margin-left:0px;">
                            <tbody>
                                <tr align="text-left">
                                    <td width="10px" style="font-weight: bold;">Tổng sản phẩm:</td>
                                    <td width="5px">{{ $tongsp }}</td>
                                </tr>
                                <tr align="text-left">
                                    <td width="10px" style="font-weight: bold;">Tổng đơn hàng:</td>
                                    <td width="5px">{{ $tongdh }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="product-list-view">
                        <div class="row">
                         @foreach($dsSanPham as $index=>$sp)
                            <div class="col-lg-3 col-md-6">
                                <div class="product-item mb-30">
                                    <a href="javascript:void(0)" class="product-img">
                                    <img onclick="location.href='/product/{{$sp->sp_ma}}'" src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                                        <div class="product-absolute-options">
                                            <!--    <span class="offer-badge-1">6% off</span> -->
                                            @auth
                                            @if($soluong >= 0)
                                            @if(in_array($sp->sp_ma,$arr1chieu))
                                            <span data-id="{{$sp->sp_ma}}" class="like-icon liked" title="wishlist"></span>
                                            @else
                                            <span data-id="{{$sp->sp_ma}}" class="like-icon" title="wishlist"></span>
                                            @endif
                                            @else
                                        
                                            @endif

                                            @endauth
                                        </div>
                                    </a>
                                    <div class="product-text-dt">
                                        <p>Có sẵn<span>(Tại cửa hàng)</span></p>
                                        <h4 class="sp_ten">{{ $sp->sp_ten }}</h4>
                                        <div class="product-price">{{ number_format($sp->dgmh_gia,'0',',','.') }} <small>đ</small></div>

                                        <ngcart-addtocart template-url="{{ asset('vendors/ngCart/template/ngCart/addtocart.html') }}" id="{{$sp->sp_ma}}" name="{{$sp->sp_ten}}" price="{{$sp->dgmh_gia}}" quantity="<%qty%>" quantity-max="{{ 100 }}" data="{ sp_hinh_url: '{{ asset('storage/products/' . $sp->sp_anhDaiDien) }}' }">
                                        </ngcart-addtocart>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-12">
                                <div class="more-product-btn">
                                    <button class="show-more-btn hover-btn" ng-show="{{$tongsp}} > 12">Xem thêm</button>
                                </div>
                                <div class="more-product-btn">
                                    <button class="show-less-btn hover-btn">Rút gọn</button>
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
    <script src="{{ asset('js/frontendController.js') }}"></script>
    <script>
        $('.product-item').slice(0, 12).show();
        $(document).ready(function() {
            $('.show-more-btn').on('click', function() {
                $('.product-item:hidden').slice(0, 12).slideDown();
                if ($('.product-item:hidden').length == 0) {
                    $('.show-more-btn').fadeOut();
                    $('.show-less-btn').show();
                }
            });
            $('.show-less-btn').on('click', function() {
                $('.product-item').toggle().slice(0, 12).show();
                if ($('.product-item:hidden').length > 0) {
                    $('.show-less-btn').fadeOut();
                    $('.show-more-btn').show();
                }
            });
        });
        app.controller('ShopController', function($scope, $http) {
           
        });
    </script>
    <script>
        function in_array(need, arr) {
            return arr.some(i => i.sp_ma == need);
        }
        $(document).ready(function() {
            $.fn.addtowish = function(sp_ma, status) {
                $.ajax({
                    method: "POST",
                    url: "{{ route('frontend.mywishliststore') }}",
                    data: {
                        "sp_ma": sp_ma,
                        "status": status,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                        console.log('có lỗi xảy ra');
                    }
                });
            };
            $.fn.removetowish = function(sp_ma, status) {
                $.ajax({
                    method: "POST",
                    url: "{{route('frontend.mywishliststore')}}",
                    data: {
                        "sp_ma": sp_ma,
                        "status": status,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        console.log(data);
                    }
                });
            };
        });
        $('.like-icon, .like-button').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('liked');
            $(this).children('.like-icon').toggleClass('liked');
            if ($(this).hasClass('liked')) {
                var sp_ma = $(this).data('id');
                $.fn.addtowish(sp_ma, $(this).hasClass('liked'));
            } else {
                var sp_ma = $(this).data('id');
                $.fn.removetowish(sp_ma, $(this).hasClass('liked'));
            }
        });
    </script>
    @endsection