 <!-- sidebar -->
 <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
     <div class="c-sidebar-brand d-lg-down-none">
         <img src="{{ asset('logo.png') }}"  height="50" alt="logo"><small><b>SMARTKET</b></small>
     </div>
     <ul class="c-sidebar-nav">
         <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{route('admin')}}">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                 </svg> Dashboard</a></li>
       <!--   <li class="c-sidebar-nav-title">Theme</li>
         <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-drop') }}"></use>
                 </svg> Colors</a></li>
         <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="typography.html">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
                 </svg> Typography</a></li>
         <li class="c-sidebar-nav-title">Components</li> -->
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                 </svg>Cửa hàng tập hóa</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.cuahangtaphoa.index') }}"><span class="c-sidebar-nav-icon"></span>Danh sách</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.cuahangtaphoa.create') }}"><span class="c-sidebar-nav-icon"></span>Thêm mới</a></li>

             </ul>
         </li>
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-cursor') }}"></use>
                 </svg>Sản phẩm</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.sanpham.index') }}"><span class="c-sidebar-nav-icon"></span>Danh sách</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.sanpham.create') }}"><span class="c-sidebar-nav-icon"></span>Thêm mới</a></li>
             </ul>
         </li>
         <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.donhang.index') }}">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-chart-pie') }}"></use>
                 </svg>Đơn hàng</a></li>
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
         <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="widgets.html">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-calculator') }}"></use>
                 </svg> Widgets<span class="badge badge-info">NEW</span></a></li>
         <li class="c-sidebar-nav-divider"></li>
         <li class="c-sidebar-nav-title">Extras</li>
         <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                 <svg class="c-sidebar-nav-icon">
                     <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-star') }}"></use>
                 </svg> Pages</a>
             <ul class="c-sidebar-nav-dropdown-items">
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="login.html" target="_top">
                         <svg class="c-sidebar-nav-icon">
                             <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                         </svg> Login</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="register.html" target="_top">
                         <svg class="c-sidebar-nav-icon">
                             <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                         </svg> Register</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="404.html" target="_top">
                         <svg class="c-sidebar-nav-icon">
                             <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                         </svg> Error 404</a></li>
                 <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="500.html" target="_top">
                         <svg class="c-sidebar-nav-icon">
                             <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bug') }}"></use>
                         </svg> Error 500</a></li>
             </ul>
         </li>
       
     </ul>
     <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
 </div>
 <!-- end sidebar -->