<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title Page--}}
    <title>{{ CommonHelper::custom_app_name() }} | @yield('title')</title>

    {{-- js-css--}}
    @include('layouts.inner.js-css')

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
            
            @include('myflashalert::message')
            @include('layouts.inner.notification')

            @yield('content')
            
        </div>

    </body>
</html>