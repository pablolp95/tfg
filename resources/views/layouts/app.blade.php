<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/nav-sidebar.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
</head>
<body>
    <div id="wrapper">
        <div id="header">
            @include('nav')
        </div>
        <div id="content">
            @yield('subnav')
            @yield('content')
        </div>
        <div id="footer">
            @yield('footer')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/tfg.js') }}"></script>
    @yield('script')
</body>
</html>
