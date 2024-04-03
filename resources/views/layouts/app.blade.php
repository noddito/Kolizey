<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
    @vite(['resources/sass/app.sass'])
    <!-- Fonts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('head')
</head>
<body>
@include('inc.header')
@yield('content')
</body>
</html>
