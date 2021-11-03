@extends('frontend.layouts.master')
@section('title')
Shoping cart
@endsection

@section('custom-css')
@endsection

@section('main-content')
<div class="gambo-Breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đơn hàng của tôi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="left-side-tabs">
                    <div class="dashboard-left-links">
                        <a href="dashboard_overview.html" class="user-item"><i class="uil uil-apps"></i>Bảng điều khiển</a>
                        <a href="dashboard_my_orders.html" class="user-item active"><i class="uil uil-box"></i>Đơn hàng của tôi</a>
                        <a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>Khuyến mãi của tôi
                        </a>
                        <a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>Ví của tôi
                        </a>
                        <a href="dashboard_my_wishlist.html" class="user-item"><i class="uil uil-heart"></i>Sản phẩm yêu thích</a>
                        <a href="dashboard_my_addresses.html" class="user-item"><i class="uil uil-location-point"></i>Địa chỉ</a>
                        <a href="sign_in.html" class="user-item"><i class="uil uil-exit"></i>Đăng xuất</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title-tab">
                                <h4><i class="uil uil-box"></i>Đơn hàng</h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="track-order">
                                <h4>Theo dõi đơn hàng</h4>
                                <div class="bs-wizard" style="border-bottom:0;">
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Chờ xác nhận</div>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="#" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Hủy</div>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="#" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Đang xử lý</div>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="#" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Đang vận chuyển</div>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="#" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Đã giao</div>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="#" class="bs-wizard-dot"></a>
                                    </div>
                                    <div class="bs-wizard-step complete">
                                        <div class="text-center bs-wizard-stepnum">Chờ đánh giá</div>
                                        <div class="progress">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <a href="#" class="bs-wizard-dot"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="donhangTable" class="table ucp-table table-hover"  ng-show="false">
                            <thead>
                                <tr>
                                    <th style="width:30px">Mã ĐH</th>
                                    <th>Ngày đặt</th>
                                    <th>Giá trị</th>
                                    <th>Địa chỉ nhận</th>
                                    <th>Thông tin sản phẩm</th>
                                    <th>Ghi chú</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                @foreach($dsDonHang as $dh)
                                <tr>
                                    @if($dh->dh_ma < 10) <?php $dh_ma = '000' . $dh->dh_ma ?> @elseif($dh->dh_ma > 10 && $dh->dh_ma < 100) <?php $dh_ma = '00' . $dh->dh_ma ?> @endif <td>DH{{ $dh_ma }}</td>

                                            <td>{{ $dh->dh_taoMoi }}</td>
                                            <td>{{ number_format($dh->dh_giaTri,'0',',','.') }} <small>đ</small></td>
                                            <td>{{ $dh->dh_diaChi }}</td>
                                            <td>Thông tin sản phẩm</td>
                                            <td>{{ $dh->dh_ghiChu }}</td>
                                            <td>
                                                @if($dh->dh_trangThai == 0)
                                                <span class="badge-item badge-status">Chờ xác nhận</span>
                                                @elseif($dh->dh_trangThai == 1)
                                                <span class="badge-item badge-danger">Đã hủy</span>
                                                @elseif($dh->dh_trangThai == 2)
                                                <span class="badge-item badge-warning">Đang Xử lý</span>
                                                @elseif($dh->dh_trangThai == 3)
                                                <span class="badge-item badge-status">Đang giao</span>
                                                @elseif($dh->dh_trangThai == 4)
                                                <span class="badge-item badge-status">Đã giao</span>
                                                @elseif($dh->dh_trangThai == 5)
                                                <span class="badge-item badge-secondary">Chờ đánh giá</span>
                                                @elseif($dh->dh_trangThai == 6)
                                                <span class="badge-item badge-success">Hoàn thành</span>
                                                @endif
                                            </td>
                                            <td class="action-btns">

                                                <a href="{{ route('admin.donhang.show',$dh->dh_ma) }}" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
                                                <button type="submit" class="edit-btn btn-delete" title="Hủy"><i class="fas fa-trash-alt"></i></button>
                                                @if($dh->dh_trangThai >= 4)
                                                <a href="{{ route('donhang.inhoadon',$dh->dh_ma) }}" class="btn-print" style="float: left;" title="Print"><i class="fas fa-print"></i></a>
                                                @endif
                                            </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
@endsection