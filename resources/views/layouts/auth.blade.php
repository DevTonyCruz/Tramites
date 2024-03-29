<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon-16x16.png') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/base/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/base/elisyam-1.5.min.css') }}">
</head>
<body>
    <!-- Begin Preloader -->
    <div id="preloader">
        <div class="canvas">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="loader-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- End Preloader -->

    @yield('content')

    <script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/base/core.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/nicescroll/nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/app/app.js') }}"></script>

    @yield('js')
</body>
</html>
