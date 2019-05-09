<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    {{-- Title Page--}}
    <title>{{ CommonHelper::custom_app_name() }} | @yield('title')</title>
    
    <meta charset="UTF-8">
    <meta name="robots" content="nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex,nofollow"/> 
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

            <div id="app">
                @yield('content')
            </div>

        </div>
        
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>