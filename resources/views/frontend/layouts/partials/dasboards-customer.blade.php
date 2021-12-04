<div class="col-lg-3 col-md-4">
    <div class="left-side-tabs">
        <div class="dashboard-left-links">
           <!--  <a href="dashboard_overview.html" class="user-item"><i class="uil uil-apps"></i>Bảng điều khiển</a> -->
            <a href="/my-orders" class="user-item {{ Request::is('my-orders/*') ? 'active' : '' }}"><i class="uil uil-box"></i>Đơn hàng của tôi</a>
           <!--  <a href="dashboard_my_rewards.html" class="user-item"><i class="uil uil-gift"></i>Khuyến mãi của tôi -->
            </a>
            <a href="dashboard_my_wallet.html" class="user-item"><i class="uil uil-wallet"></i>Ví của tôi
            </a>
            <a href="/my-wishlist" class="user-item {{ Request::is('my-wishlist') ? 'active' : '' }}"><i class="uil uil-heart"></i>Sản phẩm yêu thích</a>
            <a href="/my-address" class="user-item {{ Request::is('my-address') ? 'active' : '' }}"><i class="uil uil-location-point"></i>Địa chỉ</a>
            <a href="javascript:$('#logout-form').submit();" class="user-item"><i class="uil uil-exit"></i>Đăng xuất</a>
        </div>
    </div>
</div>