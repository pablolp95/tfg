<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    @yield('css')
</head>
<body>
<div id="wrapper">
    <div id="header">
        @yield('nav')
    </div>
    <div id="content">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="/components/jquery/dist/jquery.min.js"></script>
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
