@extends('backend.layouts.master')

@section('title')
Sản phẩm - Xem chi tiết
@endsection

@section('custom-css')
<style>
    .product-imgs .left-dt {
        flex: content;
    }

    .shopowner-dt-list {
        display: flex;
        justify-content: space-between;
    }
</style>
@endsection
@section('content')
<h2 class=" page-title">Sản phẩm</h2>
<ol class="breadcrumb mb-30">
    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.sanpham.index') }}">Sản Phẩm</a></li>
    <li class="breadcrumb-item active">Xem thông tin sản phẩm</li>
</ol>
<div class="row">
    <div class="col-lg-5 col-md-6">
        <div class="card card-static-2 mb-30">
            <div class="card-body-table">
                <div class="shopowner-content-left text-center pd-20">
                    <div class="shop_img">
                        @if(file_exists('storage/products/'.$sp->sp_anhDaiDien))
                        <img src="{{ asset('storage/products/'.$sp->sp_anhDaiDien) }}" alt="">
                        @else
                        <img src="#" alt="">
                        @endif
                    </div>
                    <small>{{ $sp->sp_ten }}</small>
                    <ul class="product-dt-purchases">
                        <li>
                            <div class="product-status">
                                Orders <span class="badge-item-2 badge-status">

                                    {{ count($dh) }}
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="product-status">
                                Shop <span class="badge-item-2 badge-status">
                                    @if(!empty($shop->chth_ma))
                                    {{ $shop->chth_ma }}
                                    @endif
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div class="shopowner-dts">
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Giá</span>
                            <span class="right-dt">
                                @if(!empty($gia->dgmh_gia))
                                {{ number_format($gia->dgmh_gia, 0, ',', '.') }} <small>VND</small>
                                @endif
                            </span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Trạng thái</span>
                            <span class="right-dt">
                                @if($sp->sp_trangThai == 1)
                                <span class="badge-item badge-status"> Còn hoạt động</span>
                                @else
                                <span class="badge-item badge-status"> Không hoạt động</span>
                                @endif
                            </span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Ngày tạo</span>
                            <span class="right-dt">{{ $sp->created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-6">
        <div class="card card-static-2 mb-30">
            <div class="card-body-table">
                <div class="shopowner-content-left text-center pd-20">
                    <div class="shopowner-dts">
                        <div class="product-imgs shopowner-dt-list text-left">

                            <span class="left-dt">Hình ảnh chi tiết</span>
                            @foreach($sp->hinhanhsanpham()->get() as $hasp)
                            @if(file_exists('storage/products/' . $hasp->hasp_hinhAnh))
                            <img src="{{ asset('storage/products/' . $hasp->hasp_hinhAnh) }}" alt="" height="100px">
                            @endif
                            @endforeach

                        </div>
                        @if(!empty($sp->sp_thanhPhan))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Thành phần:</span>
                            <span class="w-100">{{ $sp->sp_thanhPhan }}</span>
                        </div>
                        @endif
                        @if(!empty($sp->sp_cachDung))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Cách dùng:</span>
                            <span>{{ $sp->sp_cachDung }}</span>
                        </div>
                        @endif
                        @if(!empty($sp->sp_khoiLuong))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Khối lượng:</span>
                            <span>{{ $sp->sp_khoiLuong }}</span>
                        </div>
                        @endif
                        @if(!empty($sp->sp_baoQuan))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Bảo quản:</span>
                            <span>{{ $sp->sp_baoQuan }}</span>
                        </div>
                        @endif
                        @if(!empty($sp->sp_hanDung))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Hạn dùng:</span>
                            <span>{{ $sp->sp_hanDung }}</span>
                        </div>
                        @endif
                        @if(!empty($sp->sp_doiTuongDung))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Đối tượng dùng:</span>
                            <span>{{ $sp->sp_doiTuongDung }}</span>
                        </div>
                        @endif
                        @if(!empty($sp->sp_ghiChu))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Ghi chú:</span>
                            <span>{{ $sp->sp_ghiChu }}</span>
                        </div>
                        @endif
                        @if(!empty($sp->sp_moTaNgan))
                        <div class="shopowner-dt-list text-left">
                            <span class="left-dt">Mô tả ngắn:</span>
                            <span>{{ $sp->sp_moTaNgan }}</span>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-scripts')
@endsection