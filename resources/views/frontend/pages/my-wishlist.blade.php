@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
@endsection

@section('main-content')
<div class="">

    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="left-side-tabs">
                <div class="dashboard-left-links">
                    <a href="dashboard_overview.html" class="user-item"><i class="uil uil-apps"></i>Bảng điều khiển</a>
                    <a href="my-orders" class="user-item "><i class="uil uil-box"></i>Đơn hàng của tôi</a>
                    <a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>Khuyến mãi của tôi
                    </a>
                    <a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>Ví của tôi
                    </a>
                    <a href="my-wishlist" class="user-item active"><i class="uil uil-heart"></i>Sản phẩm yêu thích</a>
                    <a href="my-address" class="user-item"><i class="uil uil-location-point"></i>Địa chỉ</a>
                    <a href="sign_in.html" class="user-item"><i class="uil uil-exit"></i>Đăng xuất</a>
                </div>
            </div>
        </div>
            <div class="col-lg-9 col-md-8" ng-controller="wishlistController">
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tab">
                                <h4><i class="uil uil-heart"></i>Sản phẩm yêu thích ({{ $soluong }})</h4>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="pdpt-bg">
                                <div class="wishlist-body-dtt">
                                    @if($soluong > 0)
                                    @foreach($dsSanPham as $sp)
                                    <div class="cart-item">
                                        <div class="cart-product-img">
                                            @if(file_exists('storage/products/'.$sp->sp_anhDaiDien))
                                            <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="anhdaidien">
                                            @else
                                            <img src="#" alt="anhdaidien">
                                            @endif
                                            <!--   <div class="offer-badge">4% OFF</div> -->
                                        </div>
                                        <div class="cart-text">
                                           <a href="#"> <h4 >{{$sp->sp_ten}}</h4></a> 
                                            <h6>{{$sp->chth_ten}} - <span>{{$sp->chth_diaChi}}</span></h6> <br>
                                            <div class="cart-item-price">{{number_format($sp->dgmh_gia, 0, ',', '.') }} đ</div>
                                            
                                            <button type="button" onclick="removetowish('{{$sp->sp_ma}}',false)" class="cart-close-btn"><i class="uil uil-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else

                                    @endif
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
<script>
    function removetowish(sp_ma, status) {
        $.ajax({
            method: "POST",
            url: "{{route('frontend.mywishliststore')}}",
            data: {
                "sp_ma": sp_ma,
                "status": status,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
               window.location.reload();
            }
        });
    }
 app.controller('wishlistController',function($scope,$http){

 });
</script>
   
@endsection