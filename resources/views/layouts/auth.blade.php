<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/authstyle.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Scripts -->
    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 21px !important;
        }
    </style>
    @stack('header_extras')
</head>

<body>
    <div id="app">
        <main>
            @include('layouts.partials.alert')
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/plugins/select2/js/select2.full.min.js')}}"></script>
    @stack('footer_extras')
</body>

</html>