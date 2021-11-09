 <!-- sidebar -->
 <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
     <div class="c-sidebar-brand d-lg-down-none">
         <img src="{{ asset('logo.png') }}" style="width:auto" alt="logo"><small><b>SMARKET</b></small>
     </div>
     <ul class="c-sidebar-nav">
         <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('admin')}}">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                 </svg> Dashboard</a></li>
     
         @can('admin')
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                 </svg>Cửa hàng tập hóa</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.cuahangtaphoa.index') }}"><span class="c-sidebar-nav-icon"></span>Danh sách</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.cuahangtaphoa.create') }}"><span class="c-sidebar-nav-icon"></span>Thêm mới</a></li>
             </ul>
         </li>
         @endcan
         
            <?php
             if(Session::has('user')) 
                $user = Session::get('user')[0];
           ?>
        @can('viewAny',App\Models\CuaHangTapHoa::class)
            @if($user->vt_ma==2)
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                 </svg>Quản lý cửa hàng</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.cuahangtaphoa.index') }}"><span class="c-sidebar-nav-icon"></span>Xem</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.cuahangtaphoa.create') }}"><span class="c-sidebar-nav-icon"></span>Thêm mới</a></li>
             </ul>
         </li>
            @endif
         @endcan
         @can('viewAny',App\Models\SanPham::class)
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                 </svg>Quản lý mặt hàng</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.sanpham.index') }}"><span class="c-sidebar-nav-icon"></span>Danh sách</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.sanpham.create') }}"><span class="c-sidebar-nav-icon"></span>Thêm mới</a></li>
             </ul>
         </li>
         @endcan
         @can('admin')
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                 </svg>Quản lý khách hàng</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.khachhang.index') }}"><span class="c-sidebar-nav-icon"></span>Danh sách</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.khachhang.create') }}"><span class="c-sidebar-nav-icon"></span>Thêm mới</a></li>
             </ul>
         </li>
         @endcan
         @can('viewAny',App\Models\DonHang::class)
         <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.donhang.index') }}">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
                 </svg>Đơn hàng</a></li>
        @endcan
         <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                 </svg> Icons</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span class="badge badge-success">Free</span></a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons - Brand</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons - Flag</a></li>
             </ul>
         </li>
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
                 </svg> Notifications</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/alerts.html"><span class="c-sidebar-nav-icon"></span> Alerts</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/badge.html"><span class="c-sidebar-nav-icon"></span> Badge</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/modals.html"><span class="c-sidebar-nav-icon"></span> Modals</a></li>
             </ul>
         </li>
        
       
     </ul>
     <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
 </div>
 <!-- end sidebar -->