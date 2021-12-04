@extends('frontend.layouts.master')
@section('title')
Chi tiết sản phẩm
@endsection

@section('custom-css')
<style>
    .color-discount::after {
        content: none;
    }

    .cart-product-img {
        cursor: pointer;
    }

    .star-rating input {
        display: none;
    }
    .product-group-dt{
        padding: 0px;
    }
    .star-rating label {
        font-size: 15px;
        color: #444;
        padding: 5px;
        float: right;
        transition: all 0.2s ease;
    }
    .rating{
        float: left;
    }
    .product_rating{ 
        max-height: 200px;
        overflow-y: auto;
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
                        <li class="breadcrumb-item"><a href="{{ route('frontend.product') }}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $sp->sp_ten }}</li>
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
                <div class="product-dt-view">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div id="sync1" class="owl-carousel owl-theme">
                                @if(count($dsHinhAnhLienQuan)>0)
                                @foreach($dsHinhAnhLienQuan as $ha)
                                @if(file_exists('storage/products/'.$ha->hasp_hinhAnh))
                                <div class="item">
                                    <img src="{{ asset('storage/products/'.$ha->hasp_hinhAnh) }}" alt="">
                                </div>
                                @else

                                @endif
                                @endforeach
                                @else
                                <div class="item">
                                    <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                                </div>
                                @endif
                            </div>
                            <div id="sync2" class="owl-carousel owl-theme">
                                @if(count($dsHinhAnhLienQuan)>0)
                                @foreach($dsHinhAnhLienQuan as $ha)
                                @if(file_exists('storage/products/'.$ha->hasp_hinhAnh))
                                <div class="item">
                                    <img src="{{ asset('storage/products/'.$ha->hasp_hinhAnh) }}" alt="">
                                </div>
                                @else

                                @endif
                                @endforeach
                                @else
                                <div class="item">
                                    <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="product-dt-right">
                                <h2>{{ $sp->sp_ten }}</h2>
                                <div class="no-stock">
                                    <p class="pd-no">Mã SP:<span>{{ $sp->sp_ma }}</span></p>
                                    <p class="stock-qty">Có sẵn<span>(tại cửa hàng)</span></p>
                                </div>

                                <div class="custom-rating">
                                    <div class="row">
                                        <div class="col-md-3" style="width: fit-content;">
                                            <h4>Điểm đánh giá:</h4>
                                        </div>
                                        <div class="col-md-5" style="display: contents;">
                                                <ul class=" list-inline rating">
                                                        @for($count=1; $count <=5; $count++)
                                                            @php
                                                                if($count <= $diemDanhGia && $diemDanhGia > 0){
                                                                    $color ='color: #fd4;';

                                                                }else{
                                                                    $color = 'color:#ccc;';
                                                                }
                                                            @endphp
                                                            <li data-rating="{{$diemDanhGia}}" class="rating" style="{{$color}} font-size:20px">&#9733;</li>
                                                        @endfor

                                                </ul>
                                               <span style="font-size: 15px;">({{ count($dsDanhGia) }} lượt đánh giá)</span>
                                            
                                        </div>
                                    </div>


                                </div>
                                <br>
                                <div class="product-group-dt">
                                    <ul>
                                        <li>
                                            <div class="main-price color-discount">Giá bán:<span style="font-size: 24px;color: #c10017;">{{ number_format($gia->dgmh_gia,'0',',','.') }} <small>đ</small></span></div>
                                        </li>
                                    </ul>
                                    <ul class="gty-wish-share">
                                        <li>
                                            <ngcart-addtocart template-url="{{ asset('vendors/ngCart/template/ngCart/addtocart-detail.html') }}" id="{{$sp->sp_ma}}" name="{{$sp->sp_ten}}" price="{{$gia->dgmh_gia}}" quantity="<%qty%>" quantity-max="{{ 100 }}" data="{ sp_hinh_url: '{{ asset('storage/products/' . $sp->sp_anhDaiDien) }}' }">
                                            </ngcart-addtocart>
                                        </li>
                                    </ul>
                                </div>
                                <p class="pp-descp">
                                <table class="table" style="width:50%; margin-left:0px;">
                                    <tbody>
                                        <tr align="text-left">
                                            <td width="10px" style="font-weight: bold;">Hạn sử dụng:</td>
                                            <td width="30px">{{ $sp->sp_hanDung }}</td>
                                        </tr>
                                    </tbody>
                                </table>


                                </p>
                                <div class="pdp-details">

                                    <span style="text-align: left; font-weight: 600;"><i>Tại Cửa hàng</i></span>

                                    <div class="pdp-group-dt">

                                        <div class="item">
                                            <a href="/shop/{{$shop->chth_ma}}"> <img src="{{ asset('storage/avatarshop/'.$shop->cuahangtaphoa->chth_anhDaiDien) }}" width="100px" alt="">
                                            </a>
                                        </div>
                                        <div class="pdp-text-dt">
                                            <span style="font-size: larger; font-weight: bold;">{{ $shop->cuahangtaphoa->chth_ten }}</span>
                                            <p>{{ $shop->cuahangtaphoa->chth_soDienThoai }}
                                                {{ $shop->cuahangtaphoa->chth_email }}
                                            </p>
                                            <p>{{ $shop->cuahangtaphoa->chth_diaChi }} </p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="pdpt-bg">
                    <div class="pdpt-title">
                        <h4>Sản phẩm tương tự</h4>
                    </div>

                    <div class="pdpt-body scrollstyle_4">
                        @foreach($dsSanPhamLienQuan as $sp)
                        <div class="cart-item border_radius">
                            <div class="cart-product-img">
                                <img onclick="location.href='/product/{{$sp->sp_ma}}'" src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                                <!--   <div class="offer-badge">4% OFF</div> -->
                            </div>
                            <div class="cart-text">
                                <p>Có sẵn<span>(Tại cửa hàng)</span></p>
                                <h4 class="sp_ten">{{ $sp->sp_ten }}</h4>
                                <div class="product-price">{{ number_format($sp->dongiamathang->dgmh_gia,'0',',','.') }} <small>đ</small></div>
                                <ngcart-addtocart template-url="{{ asset('vendors/ngCart/template/ngCart/addtocart.html') }}" id="{{$sp->sp_ma}}" name="{{$sp->sp_ten}}" price="{{$sp->dongiamathang->dgmh_gia}}" quantity="<%qty%>" quantity-max="{{ 100 }}" data="{ sp_hinh_url: '{{ asset('storage/products/' . $sp->sp_anhDaiDien) }}' }">
                                </ngcart-addtocart>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="pdpt-bg">
                    <div class="pdpt-title">
                        <h4>Thông tin chi tiết</h4>
                    </div>
                    <div class="pdpt-body scrollstyle_4">
                        <div class="pdct-dts-1">
                            <div class="pdct-dt-step table-responsive">
                                <table class="table  " style="width:80%; margin-left:0px;">
                                    <tbody>
                                        <tr align="text-left">
                                            <td width="150px" style="font-weight: bold;">Loại sản phẩm:</td>
                                            <td>{{ $sp->loaisanpham->lsp_ten }}</td>
                                        </tr>
                                        <tr align="text-left">
                                            <td style="font-weight: bold;">Nhà sản xuất:</td>
                                            <td>{{ $sp->nhasanxuat->nsx_ten }}</td>
                                        </tr>
                                        <tr align="text-left">
                                            <td style="font-weight: bold;">Thành phần:</td>
                                            <td>{{ $sp->sp_thanhPhan }}</td>
                                        </tr>
                                        <tr align="text-left">
                                            <td style="font-weight: bold;">Bảo quản:</td>
                                            <td>{{ $sp->sp_baoQuan }}</td>
                                        </tr>
                                        <tr align="text-left">
                                            <td style="font-weight: bold;">Cách dùng:</td>
                                            <td>{{ $sp->sp_cachDung }}</td>
                                        </tr>
                                        <tr align="text-left">
                                            <td style="font-weight: bold;">Hạn sử dụng:</td>
                                            <td>{{ $sp->sp_hanDung }}</td>
                                        </tr>
                                        <tr align="text-left">
                                            <td style="font-weight: bold;">Lưu ý:</td>
                                            <td>{{ $sp->sp_ghiChu }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pdct-dt-step">
                                <h4>Thông tin liên quan sản phẩm</h4>
                                <div class="product_attr">
                                    <p>{{ $sp->sp_moTaNgan }}</p>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="pdct-dt-step pdpt-bg">
                    <h4>Đánh giá sản phẩm</h4>
                    <div class="product_rating">
                        @foreach($dsDanhGia as $index=>$dg)
                        <div class="col-md-2 rating">
                            <img src="{{ asset('themes/gambo/images/avatar/user.jpg') }}" height="50px" alt="">
                            <p style="text-align: start;">{{$dg->kh_taiKhoan }}***</p>
                        </div>
                        <div class="col-md-10 rating">
                            <ul class=" list-inline rating">
                                    @for($count=1; $count <=5; $count++)
                                        @php

                                            if($count <= $dg->dg_soDiem && $dg->dg_soDiem > 0){
                                                $color ='color: #fd4;';

                                            }else{
                                                $color = 'color:#ccc;';
                                            }
                                        @endphp
                                        <li data-rating="" class="rating" style="{{$color}} font-size:20px">&#9733;</li>
                                    @endfor

                            </ul><br>
                            <p>{{ $dg->dg_noiDung }}</p>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script src="{{ asset('themes/gambo/js/product.thumbnail.slider.js') }}"></script>

@endsection