<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('components/materialize/dist/css/materialize.min.css') }}"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/public_form.css') }}"/>
    @yield('css')
</head>
<body>
    <div id="wrapper" class="blue">
        @yield('content')
    </div>

<!-- Scripts -->
<script src="{{ asset('components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('components/materialize/dist/js/materialize.min.js') }}"></script>
<script src="{{ asset('js/public_form.js') }}"></script>
@yield('script')

</body>
</html>
