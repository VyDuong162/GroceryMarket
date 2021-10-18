@extends('backend.layouts.master')

@section('title')
khách hàng - Xem chi tiết
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
<h2 class="mt-30 page-title">Khách hàng</h2>
<ol class="breadcrumb mb-30">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.khachhang.index') }}">Khách hàng</a></li>
    <li class="breadcrumb-item active">Xem thông tin khách hàng</li>
</ol>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card card-static-2 mb-30">
            <div class="card-body-table">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="shopowner-content-left text-center pd-20">
                            <div class="customer_img">
                                <img src="{{ asset('themes/gambo/images/avatar/img-5.jpg') }} " alt="">
                            </div>
                            <div class="shopowner-dt-left mt-4">
                                <h4>{{ $kh->kh_hoTen }}</h4>
                                <span>{{ $kh->vaitro->vt_ten }}</span>
                            </div>
                            <ul class="product-dt-purchases">
                                <li>
                                    <div class="product-status">
                                        Đơn hàng <span class="badge-item-2 badge-status">{{ $demdh }}</span>
                                    </div>
                                </li>
                                <li>
                                    @if($demcuahang > 0)
                                    <div class="product-status">
                                        Cửa hàng <span class="badge-item-2 badge-status">{{ $demcuahang }}</span>
                                    </div>
                                    @endif
                                </li>
                            </ul>

                        </div>

                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="shopowner-content-right text-center pd-20">
                            <div class="shopowner-dts">
                                <div class="shopowner-dt-list">
                                    <span class="left-dt">Giới tính</span>
                                    @if($kh->kh_gioiTinh== 0)
                                    <span class="right-dt">Nam</span>
                                    @else
                                    <span class="right-dt">Nữ</span>
                                    @endif
                                </div>
                                <div class="shopowner-dt-list">
                                    <span class="left-dt">Ngày Sinh</span>
                                    <span class="right-dt">{{$kh->kh_ngaySinh->format('d/m/Y') }}</span>
                                </div>
                                <div class="shopowner-dt-list">
                                    <span class="left-dt">Số điện thoại</span>
                                    <span class="right-dt">{{$kh->phoneNumber($kh->kh_soDienThoai)}}</span>
                                </div>
                                <div class="shopowner-dt-list">
                                    <span class="left-dt">Email</span>
                                    <span class="right-dt"><a href="" class="__cf_email__">{{ $kh->kh_email }}</a></span>
                                </div>
                                <div class="shopowner-dt-list">
                                    <span class="left-dt">Địa chỉ</span>
                                    @foreach($kh->laydiachi($kh->px_ma) as $dc)
                                        
                                        <span class="right-dt">{{ $dc->diachi }}</span>
                                       @endforeach
                                   
                                </div>
                                @if($demcuahang > 0)
                                <div class="shopowner-dt-list">
                                    <span class="left-dt">Tên cửa hàng</span>
                                   
                                    @foreach($cuahang as $index => $ch)
                                        <span class="right-dt">{{ $ch->gettencuahang()  }}</span>
                                    @endforeach
                                </div>
                                @endif
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