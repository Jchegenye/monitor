<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title Page--}}
    <title>{{ Helper::custom_app_name() }} | @yield('title')</title>

    {{-- css--}}
    @include('layouts.inner.css')

</head>

<body class="wrapper">

        {{-- Sidebar --}}
        @section('sidebar')
            @include('layouts.inner.sidebar')
        @show

        <div id="dashboard">

            {{-- Top Menu --}}
            @section('top-menu')
                @include('layouts.inner.top-menu')
            @show

            @yield('content')
            
        </div>

    {{-- js--}}
    @include('layouts.inner.js')

</body>
</html>