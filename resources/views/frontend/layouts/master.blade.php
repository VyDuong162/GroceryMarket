<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>@yield('title')</title>
    <!-- css -->
    <link rel="icon" type="image/png" href="images/fav.png">
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
    <!-- css custom -->
    @yield('custom-css')
</head>

<body>
    <!-- Header -->
    @include('frontend.layouts.partials.header')
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
        <script src="{{ asset('themes/gambo/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/vendor/OwlCarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/vendor/semantic/semantic.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('themes/gambo/js/custom.js') }}"></script>
        <script src="{{ asset('themes/gambo/js/offset_overlay.js') }}"></script>
        <script src="{{ asset('themes/gambo/js/night-mode.js') }}"></script>
        @yield('scripts-custom')
</body>

</html>