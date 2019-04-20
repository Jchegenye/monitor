<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title Page--}}
    <title>{{ Helper::custom_app_name() }} - @yield('title')</title>

    {{--Favicon--}}
    <link rel="shortcut icon" type="image/ico" href="{{ asset('favicon.ico')}}" />

    {{-- Bootstrap CSS--}}
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    {{-- Main CSS--}}
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" media="all">

    {{-- Fontfaces CSS--}}
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">

</head>

<body class="wrapper">

        {{-- Sidebar --}}
        @section('sidebar')
            @include('layouts.inner.sidebar')
        @show

        <div id="content">

            {{-- Top Menu --}}
            @section('top-menu')
                @include('layouts.inner.top-menu')
            @show

            @yield('content')
            
        </div>

    {{-- Jquery JS --}}
    <script src="{{ asset('vendor/jquery-3.2.1.min.js')}}"></script>

    {{-- Bootstrap JS--}}
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

    {{-- Main JS--}}
    <script src="{{ asset('js/main.js')}}"></script>

</body>
</html>