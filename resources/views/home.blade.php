@extends('layouts.master')

@section('title', 'Main Dashboard')

@section('content')

    <h2>@yield('title')</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Statistics (coming soon)

            </div>
        </div>
    </div>

@endsection
