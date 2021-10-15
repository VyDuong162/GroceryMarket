<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TapHoaOnline - @yield('title', config('app.name', '@Master Layout'))</title>
     <!-- CoreUI for Bootstrap CSS -->
    <link href="{{ asset('coreui/vendor/css/coreui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('coreui/vendor/css/coreui-chartjs.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('coreui/vendor/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('coreui/vendor/css/coreui-chartjs.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
    <!-- Styles custom-->
  
    
    @yield('custom-css')

</head>

<body >
    <!-- Sidebar -->
    @include('backend.layouts.partials.sidebar')
    <!-- End Sidebar -->
        
        <div class="c-wrapper c-fixed-components">
            <!--  Navbar -->
            @include('backend.layouts.partials.navbar')
            <!-- End Navbar -->
            <!-- Content -->
            <div class="c-body">
                <main role='main'> <!-- class="c-main" -->
                    <div class="container-fluid">
                        <div class="fade-in">
                            <div class="row">
                                @include('backend.layouts.partials.error-message')
                                @include('backend.layouts.partials.flash-message')
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </main>

            </div>
              <!-- End Content -->
        </div>
       <!-- Include script angularJS --> 
 
    <!-- coreui -->
    <script src="{{ asset('coreui/js/main.js') }}"></script>

    <script src="{{ asset('coreui/vendor/js/coreui.min.js') }}"></script>
    <script src="{{ asset('coreui/vendor/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('coreui/vendor/js/svgxuse.min.js') }}"></script>
    <script src="{{ asset('coreui/vendor/js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('coreui/vendor/js/coreui-utils.js') }}"></script>
    <!-- Optional JavaScript -->
    <script src="{{ asset('vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendors/popperjs/popper.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js')}}"></script>

    <!--thông báo Lỗi  -->
    <script src="{{ asset('vendors/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendors/jquery-validation/localization/messages_vi.min.js') }}"></script>
    @yield('custom-scripts')
</body>

</html>