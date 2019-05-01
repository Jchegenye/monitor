@extends('layouts.master')

@section('title', 'Uptime Checks')

@section('content')

    <div class="container" id="main-box">

        <div class="row align-items-center">
            <div class="col-md-6 d-flex justify-content-start">
                <h6 class="mb-0">@yield('title')</h6>
            </div>
            <div class="col-md-6 d-flex justify-content-end">

                <div class="dropdown-ellipsed d-flex btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="d-flex align-items-center">
                        <div class="d-flex mr-auto">
                            <button class="dropdown-item d-flex" type="button"><b>Actions</b></button>
                        </div>
                        <div class="d-flex ml-auto mr-4">
                            <i class="fas fa-info-circle"></i>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#addNewWebsite">
                            <i class="fas fa-plus-circle"></i>Add New
                        </button>
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#importWebsite">
                            <i class="fas fa-file"></i>Import (CSV or Excel)
                        </button>
                    <div class="dropdown-divider"></div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12"><hr class=""></div>
        </div>

    </div>

    <!-- Modal (Add New) -->
    @include('dashboard.monitoring.uptime.modals.websites.add-new-website')
    @include('dashboard.monitoring.uptime.modals.websites.import-website')

@endsection
