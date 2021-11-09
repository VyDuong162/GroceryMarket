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
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cửa hàng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="all-product-grid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-top-dt">
                    <div class="product-left-title">
                        <h2>Cửa hàng</h2>
                    </div>
                   <!--  <a href="#" class="filter-btn pull-bs-canvas-right">Tìm kiếm</a>
                    <div class="product-sort">
                        <div class="ui selection dropdown vchrt-dropdown">
                            <input name="gender" type="hidden" value="default">
                            <i class="dropdown icon d-icon"></i>
                            <div class="text">Lọc cửa hàng</div>
                            <div class="menu">
                                <div class="item" data-value="0">Tất cả</div>
                                <div class="item" data-value="1">Giá - thấp đến cao</div>
                                <div class="item" data-value="2">Giá - cao đến thấp</div>
                                <div class="item" data-value="3">Tên sản phẩm</div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="product-list-view" ng-controller="dsSanPhamController">
            <div class="row" ng-init="limit = 12">
                @foreach($dsCuaHang as $index=>$ch)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item mb-30">
                            <a href="#" class="product-img">
                            @if(file_exists('storage/avatarshop/'.$ch->chth_anhDaiDien))
                             <img  src="{{ asset('storage/avatarshop/'.$ch->chth_anhDaiDien) }}" height="200px" alt="">   
                            @else
                            <img  src="{{ asset('storage/avatarshop/') }}/0chth.jpg" height="200px" alt="" >   
                            <div class="product-absolute-options"></div>
                            @endif
                            </a>
                            <div class="product-text-dt">
                                
                                <h4 class="sp_ten">{{ $ch->chth_ten }}</h4>
                                <h6>Địa chỉ:{{$ch->chth_diaChi}}</h6>
                                <p>Liên hệ:{{$ch->chth_soDienThoai}} - {{$ch->chth_email}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                <div class="col-md-12">
                    <div class="more-product-btn">
                        <button class="show-more-btn hover-btn" ng-hide="limit >12?false:true" >Xem thêm</button>
                    </div>
                    <div class="more-product-btn">
                        <button class="show-less-btn hover-btn" >Rút gọn</button>
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

        app.controller('locationController',function($scope,$http){
                $http({
                method: 'GET',
                url: "{{ route('api.tinhtp') }}",
                }).then(function successCallback(response) {
                    console.log(response);
                    $scope.dsTinhTp = response.data.result;
                }, function errorCallback(response) {
                    console.log('thất bại');
                });
                $scope.timcuahangtheotp = function(tp_ma) {
                window.location.href="{{ route('frontend.shop') }}?ttp_ma="+tp_ma;
                }
            });
      
        app.controller('dsSanPhamController',function($scope,$http){
            
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