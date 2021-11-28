<!DOCTYPE html>

<html lang="en" ng-app="app">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>@yield('title')</title>
    <!-- css -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel='stylesheet' href="{{ asset('themes/gambo/vendor/unicons-2.0.1/css/unicons.css') }}" type="text/css">
    <link rel='stylesheet' href="{{ asset('themes/gambo/css/style.css') }}" type="text/css">
    <link rel='stylesheet' href="{{ asset('themes/gambo/css/responsive.css') }}" type="text/css">
    <link rel='stylesheet' href="{{ asset('themes/gambo/css/night-mode.css') }}" type="text/css">

    <link rel='stylesheet' href="{{ asset('themes/gambo/vendor/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link rel='stylesheet' href="{{ asset('themes/gambo/vendor/OwlCarousel/assets/owl.carousel.min.css') }}" type="text/css">
    <link rel='stylesheet' href="{{ asset('themes/gambo/vendor/OwlCarousel/assets/owl.theme.default.min.css') }}" type="text/css">
    <link rel='stylesheet' href="{{ asset('themes/gambo/vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/gambo/vendor/semantic/semantic.min.css') }}" type="text/css">
    <style>
        .category-by-cat li{
            float: none;
        }
        .main_logo{
            width: 130px;
        }
    </style>
    <!-- css custom -->
    @yield('custom-css')
</head>

<body>
    <!-- Header -->
    @include('frontend.layouts.partials.header')
    @include('frontend.layouts.partials.sidebar-cart')
    <!-- End Header -->
    <!-- main -->
    <main id="main">
        <div class="wrapper">
            @yield('main-content')
        </div>
    </div>
        <!-- End main -->
        <!-- Footer -->
        @include('frontend.layouts.partials.footer')
        <!-- End Footer -->
            
        <!-- js -->
        <script src="{{ asset('vendors/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('themes/gambo/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/vendor/OwlCarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/vendor/semantic/semantic.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/js/custom.js') }}"></script>
       
        <script src="{{ asset('themes/gambo/js/offset_overlay.js') }}"></script>
        <script src="{{ asset('themes/gambo/js/night-mode.js') }}"></script> 
        <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendors/momentjs/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendors/daterangepicker/daterangepicker.min.js') }}"></script>
        <script src="{{ asset('vendors/sweetalert/sweetalert.js') }}"></script>
          <!-- Include script angularJS --> 
          <script src="{{ asset('vendors/angular/angular.min.js') }}"></script>
         <!-- Include thư viện quản lý Cart - AngularJS -->
         <script src="{{ asset('vendors/ngCart/dist/ngCart.js') }}"></script>
          
            <script>
              
                var app= angular.module('app',['ngCart'],
                    function($interpolateProvider){
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                });
            
                app.controller('ctrlController',function($scope){
                $scope.qty=1;
                $scope.increment = function(){
                    $scope.qty++;
                },
                $scope.decrement = function(){
                    $scope.qty--;
                }
                });
                app.controller('locationController',function($scope,$http){
                    $http({
                    method: 'GET',
                    url: "{{ route('api.tinhtp') }}",
                    }).then(function successCallback(response) {
                        console.log(response);
                        $scope.dsTinhTp = response.data.result;
                    }, function errorCallback(response) {
                        console.log('thất bại');
                    });
                    $scope.timcuahangtheotp = function(tp_ma) {
                    window.location.href="{{ route('frontend.shop') }}?ttp_ma="+tp_ma;
                    }
                });
                app.controller('LoaiSanPhamController',function($scope,$http){
                $http({
                method: 'GET',
                url: "{{ route('api.loaisanpham') }}",
                }).then(function successCallback(response) {
                    console.log(response);
                    $scope.dsLoaiSanPham = response.data.result;
                }, function errorCallback(response) {
                    console.log('thất bại');
                });
                });

            </script>
        @yield('custom-scripts')
</body>

</html>