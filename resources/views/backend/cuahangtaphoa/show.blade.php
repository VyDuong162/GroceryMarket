@extends('backend.layouts.master')

@section('title')
khách hàng
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
<h2 class="mt-30 page-title">Cửa hàng</h2>
<ol class="breadcrumb mb-30">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.cuahangtaphoa.index') }}">Cửa hàng</a></li>
    <li class="breadcrumb-item active">Xem thông tin chi tiết cửa hàng</li>
</ol>
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card card-static-2 mb-30">
            <div class="card-body-table">
                <div class="shop-content-left pd-20">
                    <div class="shop_img">
                        @if(!file_exists('storage/avatarshop/'.$chth->chth_anhDaiDien))

                        <img src="{{ asset('themes/gambo/images/avatar/default_chth.jpg') }}"  alt="hinhdaidien">

                        @else

                        <img src="{{ asset('storage/avatarshop/'.$chth->chth_anhDaiDien) }}" alt="hinhdaidien">

                        @endif
                    </div>
                    <div class="shop-dt-left">
                        <h4>{{ $chth->chth_ten }}</h4>




                        @foreach($kh->laydiachi($kh->px_ma) as $dc)

                        <span>{{ $dc->diachi }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-static-2 mb-30">
            <div class="card-body-table">
                <div class="shopowner-content-left pd-20">
                    <div class="shopowner-dt-left">
                        <h4>{{ $kh->kh_hoTen }}</h4>
                        <span>{{ $kh->vaitro->vt_ten }}</span>
                    </div>
                    <div class="shopowner-dts">
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Tài khoản đăng nhập</span>
                            <span class="right-dt">{{ $kh->kh_taiKhoan }}</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Số điện thoại</span>
                            <span class="right-dt">{{ $chth->chth_soDienThoai }}</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Email</span>
                            <span class="right-dt"><a>{{ $chth->chth_email }}</a></span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Địa chỉ </span>
                            <span class="right-dt">{{ $chth->laydiachi($chth->px_ma)[0]->diachi }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card card-static-2 mb-30">
            <div class="card-body-table">
                <div class="shopowner-content-left pd-20">
                    <div class="shopowner-dts mt-0">
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Tên cửa hàng</span>
                            <span class="right-dt">{{ $chth->chth_ten }}</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Khu vực</span>
                            <span class="right-dt">{{ $chth->laytp($chth->px_ma)->ttp_ten }}</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Vị trí</span>
                            <span class="right-dt">{{ $chth->layqh($chth->px_ma)->qh_ten }},{{ $chth->layqh($chth->px_ma)->px_ten }}</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Trạng thái cửa hàng</span>
                            <span class="right-dt">{{ $chth->chth_trangThai==1 ?'Hoạt động':'ngừng hoạt động' }}</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Giờ mở cửa</span>
                            <span class="right-dt">09.00 AM</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Giờ đóng cửa</span>
                            <span class="right-dt">10.00 PM</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Đia chỉ cụ thể</span>
                            <span class="right-dt">{{ $chth->chth_diaChi }}</span>
                        </div>
                        <div class="shopowner-dt-list">
                            <span class="left-dt">Mô tả cửa hàng</span>
                            <span class="right-dt">{!!$chth->chth_moTa!!}.</span>
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