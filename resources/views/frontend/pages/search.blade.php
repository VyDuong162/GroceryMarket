@extends('frontend.layouts.master')
@section('title')
Sản phẩm
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
                        <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
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
                        <h2>Sản phẩm</h2>
                    </div>
                    <a href="#" class="filter-btn pull-bs-canvas-right">Tìm kiếm</a>
                    <div class="product-sort">
                        <div class="ui selection dropdown vchrt-dropdown">
                            <input name="gender" type="hidden" value="default">
                            <i class="dropdown icon d-icon"></i>
                            <div class="text">Lọc sản phẩm</div>
                            <div class="menu">
                                <div class="item" data-value="0">Tất cả</div>
                                <div class="item" data-value="1">Giá - thấp đến cao</div>
                                <div class="item" data-value="2">Giá - cao đến thấp</div>
                                <div class="item" data-value="3">Tên sản phẩm</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-list-view" ng-controller="dsSanPhamController">
            <div class="row">
                    @foreach($dsSanPham as $index=>$sp)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item mb-30">
                            <a href="" class="product-img">
                                <a href="product/{{$sp->sp_anhDaiDien}}"><img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt=""></a>
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
                        <button class="show-more-btn hover-btn" ng-click="limit=dsSanPham.length">Xem thêm</button>
                    </div>
                    <div class="more-product-btn">
                        <button class="show-less-btn hover-btn" >Rút gọn</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="thongbao" class="row">
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
            $scope.dsSanPham = "{{$dsSanPham}}";
            $scope.soluong = "{{$soluong}}";
            $scope.arr1chieu = "{{$arr1chieu}}";
            if($scope.dsSanPham.length==0){
                document.getElementById("thongbao").innerHTML=' <div class="alert alert-warning" role="alert"> Không tìm thấy sản phẩm !!</div>';    
            }
                $scope.layanh = function(url) {
                    $scope.http = new XMLHttpRequest();

                    $scope.http.open('HEAD', url, false);
                    $scope.http.send();
                    if ($scope.http.status == 200) {
                        return true;
                    } else {
                        return false;
                    }
                }
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