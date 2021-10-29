@extends('frontend.layouts.master')

@section('custom-css')

@endsection
@section('main-content')
<div class="main-banner-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel offers-banner owl-theme">
                    <div class="item">
                        <div class="offer-item">
                            <div class="offer-item-img">
                                <div class="gambo-overlay"></div>
                                <img src="{{ asset('themes/gambo/images/banners/offer-1.jpg') }}" alt="">
                            </div>
                            <div class="offer-text-dt">
                                <div class="offer-top-text-banner">
                                    <p>6% Off</p>
                                    <div class="top-text-1">Mua nhiều hơn tiết kiệm nhiều hơn</div>
                                    <span>Rau sạch</span>
                                </div>
                                <a href="#" class="Offer-shop-btn hover-btn">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="offer-item">
                            <div class="offer-item-img">
                                <div class="gambo-overlay"></div>
                                <img src="{{ asset('themes/gambo/images/banners/offer-2.jpg') }}" alt="">
                            </div>
                            <div class="offer-text-dt">
                                <div class="offer-top-text-banner">
                                    <p>5% Off</p>
                                    <div class="top-text-1">Mua nhiều hơn tiết kiệm nhiều hơn</div>
                                    <span>Trái cây tươi</span>
                                </div>
                                <a href="#" class="Offer-shop-btn hover-btn">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="offer-item">
                            <div class="offer-item-img">
                                <div class="gambo-overlay"></div>
                                <img src="{{ asset('themes/gambo/images/banners/offer-3.jpg') }}" alt="">
                            </div>
                            <div class="offer-text-dt">
                                <div class="offer-top-text-banner">
                                    <p>3% Off</p>
                                    <div class="top-text-1">Ưu đãi hấp dẫn cho các mặt hàng mới</div>
                                    <span>Trứng & sữa cần thiết hàng ngày</span>
                                </div>
                                <a href="#" class="Offer-shop-btn hover-btn">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="offer-item">
                            <div class="offer-item-img">
                                <div class="gambo-overlay"></div>
                                <img src="{{ asset('themes/gambo/images/banners/offer-4.jpg') }}" alt="">
                            </div>
                            <div class="offer-text-dt">
                                <div class="offer-top-text-banner">
                                    <p>2% Off</p>
                                    <div class="top-text-1">Mua nhiều hơn tiết kiệm nhiều hơn</div>
                                    <span>Đồ uống</span>
                                </div>
                                <a href="#" class="Offer-shop-btn hover-btn">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="offer-item">
                            <div class="offer-item-img">
                                <div class="gambo-overlay"></div>
                                <img src="{{ asset('themes/gambo/images/banners/offer-5.jpg') }}" alt="">
                            </div>
                            <div class="offer-text-dt">
                                <div class="offer-top-text-banner">
                                    <p>3% Off</p>
                                    <div class="top-text-1">Mua nhiều hơn tiết kiệm nhiều hơn</div>
                                    <span>Quả hạch & Đồ ăn nhẹ</span>
                                </div>
                                <a href="#" class="Offer-shop-btn hover-btn">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section145" ng-controller="loaisanphamController">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title-tt">
                    <div class="main-title-left">
                        <span>Mua sắm bởi</span>
                        <h2>Thể loại</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel cate-slider owl-theme" >
                    @foreach($dsLoaiSanPham as $index =>$lsp)
                    <div class="item">
                        <a href="#" class="category-item" >
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-'.($index+1).'.svg') }}" alt="">
                            </div>
                            <h4>{{ $lsp->lsp_ten }}</h4>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section145">
    <div class="container" ng-controller="ctrlController">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title-tt">
                    <div class="main-title-left">
                        <span>Cho bạn</span>
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <a href="#" class="see-more-btn">Xem tất cả</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel featured-slider owl-theme">
                    @foreach($dsSanPhamNoiBat as $sp)
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                                <div class="product-absolute-options">
                                 <!--    <span class="offer-badge-1">6% off</span> -->
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Tại cửa hàng)</span></p>
                                <h4 class="sp_ten">{{ $sp->sp_ten }}</h4>
                                <div class="product-price">{{ number_format($sp->dgmh_gia,'0',',','.') }} <small>đ</small></div>
                                
                                <ngcart-addtocart template-url="{{ asset('vendors/ngCart/template/ngCart/addtocart.html') }}"  id="{{$sp->sp_ma}}" name="{{$sp->sp_ten}}" price="{{$sp->dgmh_gia}}" quantity="<%qty%>" quantity-max="{{ 100 }}" data="{ sp_hinh_url: '{{ asset('storage/products/' . $sp->sp_anhDaiDien) }}' }">
                                    </ngcart-addtocart>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section145">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title-tt">
                    <div class="main-title-left">
                        <span>Ưu đãi</span>
                        <h2>Giá trị tốt nhất</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#" class="best-offer-item">
                    <img src="{{ asset('themes/gambo/images/best-offers/offer-1.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#" class="best-offer-item">
                    <img src="{{ asset('themes/gambo/images/best-offers/offer-2.jpg') }}" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="#" class="best-offer-item offr-none">
                    <img src="{{ asset('themes/gambo/images/best-offers/offer-3.jpg') }}" alt="">
                    <div class="cmtk_dt">
                        <div class="product_countdown-timer offer-counter-text" data-countdown="2021/01/06">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-12">
                <a href="#" class="code-offer-item">
                    <img src="{{ asset('themes/gambo/images/best-offers/offer-4.jpg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="section145">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title-tt">
                    <div class="main-title-left">
                        <span>Cho bạn</span>
                        <h2>Mặt hàng giá tốt hôm nay</h2>
                    </div>
                    <a href="#" class="see-more-btn">Xem tất cả</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel featured-slider owl-theme">
                    @foreach($dsSanPhamHomNay as $sp)
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">6% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4 class="sp_ten">{{ $sp->sp_ten }}</h4>
                                <div class="product-price">{{ number_format($sp->dgmh_gia,0,',','.') }} <small>đ</small><span>{{ number_format($sp->dgmh_gia+10000,0,',','.') }}<small>đ</small></span></div>
                                
                                <ngcart-addtocart template-url="{{ asset('vendors/ngCart/template/ngCart/addtocart.html') }}"  id="{{$sp->sp_ma}}" name="{{$sp->sp_ten}}" price="{{$sp->dgmh_gia}}" quantity="<%qty%>" quantity-max="{{ 100 }}" data="{ sp_hinh_url: '{{ asset('storage/products/' . $sp->sp_anhDaiDien) }}' }">
                                    </ngcart-addtocart>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section145">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-title-tt">
                    <div class="main-title-left">
                        <span>Cho bạn</span>
                        <h2>Thêm mặt hàng mới</h2>
                    </div>
                    <a href="#" class="see-more-btn">Xem tất cả</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel featured-slider owl-theme">
                    @foreach($dsSanPhamMoi as $sp)
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                            <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4 class="sp_ten">{{ $sp->sp_ten }}</h4>
                                <div class="product-price">{{ number_format($sp->dgmh_gia,0,',','.') }} <small>đ</small></div>
                                
                                <ngcart-addtocart template-url="{{ asset('vendors/ngCart/template/ngCart/addtocart.html') }}"  id="{{$sp->sp_ma}}" name="{{$sp->sp_ten}}" price="{{$sp->dgmh_gia}}" quantity="<%qty%>" quantity-max="{{ 100 }}" data="{ sp_hinh_url: '{{ asset('storage/products/' . $sp->sp_anhDaiDien) }}' }">
                                    </ngcart-addtocart>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script>
    
    app.controller('loaisanphamController', function($scope,$http){
        $http({
        method: 'GET',
        url: "{{ route('api.loaisanpham') }}",
        }).then(function successCallback(response) {   
            console.log(response.data.result) ;
            $scope.dsLoaiSanPham = response.data.result;
        }, function errorCallback(response) {
            console.log('thất bại');
        });

    });
  
    $('.cart-icon').each(function() {
            var nameProduct = $(this).parent().parent().find('.sp_ten').html();
            $(this).on('click', function() {
                swal(nameProduct, "đã thêm vào giỏ !", "success");
            });
        });
</script>
@endsection