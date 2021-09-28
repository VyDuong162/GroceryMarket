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


<div class="section145">
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
                <div class="owl-carousel cate-slider owl-theme">
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-1.svg') }}" alt="">
                            </div>
                            <h4>Rau và trái cây</h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-2.svg') }}" alt="">
                            </div>
                            <h4> Hàng tạp hóa & mặt hàng chủ lực </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-3.svg') }}" alt="">
                            </div>
                            <h4> Sữa & Trứng </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-4.svg') }}" alt="">
                            </div>
                            <h4> Đồ uống </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-5.svg') }}" alt="">
                            </div>
                            <h4> Đồ ăn nhẹ </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-6.svg') }}" alt="">
                            </div>
                            <h4> Chăm sóc tại nhà </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-7.svg') }}" alt="">
                            </div>
                            <h4> Mì & nước sốt </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-8.svg') }}" alt="">
                            </div>
                            <h4> Chăm sóc cá nhân </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-9.svg') }}" alt="">
                            </div>
                            <h4> Chăm sóc thú cưng </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-10.svg') }}" alt="">
                            </div>
                            <h4> Thịt & Hải sản </h4>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" class="category-item">
                            <div class="cate-img">
                                <img src="{{ asset('themes/gambo/images/category/icon-11.svg') }}" alt="">
                            </div>
                            <h4> Thiết bị điện tử </h4>
                        </a>
                    </div>
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
                        <h2>Sản phẩm nổi bật hàng đầu</h2>
                    </div>
                    <a href="#" class="see-more-btn">Xem tất cả</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel featured-slider owl-theme">
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-1.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">6% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$12 <span>$15</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-2.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">2% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$10 <span>$13</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-3.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">5% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$5 <span>$8</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-4.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">3% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$15 <span>$20</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-5.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">2% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$9 <span>$10</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-6.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">2% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$7 <span>$8</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-7.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">1% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$6.95 <span>$7</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-8.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">3% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$8 <span>$10</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <h2>Rau & trái cây tươi</h2>
                    </div>
                    <a href="#" class="see-more-btn">Xem tất cả</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel featured-slider owl-theme">
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-11.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">6% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$12 <span>$15</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-12.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">2% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$10 <span>$13</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-13.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">5% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$5 <span>$8</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-1.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">3% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$15 <span>$20</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-5.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">2% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$9 <span>$10</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-6.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">2% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$7 <span>$8</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-14.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">1% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$6.95 <span>$7</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-3.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">3% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$8 <span>$10</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-10.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$12 <span>$15</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-9.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$10</div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-15.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">5% off</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$5</div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-11.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$15 <span>$16</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-14.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$9</div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-2.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$7</div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-5.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$6.95</div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-item">
                            <a href="#" class="product-img">
                                <img src="{{ asset('themes/gambo/images/product/img-6.jpg') }}" alt="">
                                <div class="product-absolute-options">
                                    <span class="offer-badge-1">New</span>
                                    <span class="like-icon" title="wishlist"></span>
                                </div>
                            </a>
                            <div class="product-text-dt">
                                <p>Có sẵn<span>(Trong kho)</span></p>
                                <h4>Tiêu đề sản phẩm tại đây</h4>
                                <div class="product-price">$8 <span>8.75</span></div>
                                <div class="qty-cart">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus minus-btn">
                                        <input type="number" step="1" name="quantity" value="1" class="input-text qty text">
                                        <input type="button" value="+" class="plus plus-btn">
                                    </div>
                                    <span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
                                </div>
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

@endsection