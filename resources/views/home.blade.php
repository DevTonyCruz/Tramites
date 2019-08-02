@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- End Page Header -->
    <div class="row mb-3">
        <div class="col-xl-4"></div>
        <div class="col-xl-4 col-md-6">
            <div class="widget widget-23 bg-gradient-09 d-flex justify-content-center align-items-center has-shadow">
                <div class="widget-body text-center">
                    <div class="title text-grey-dark"><small>BIENVENIDO</small></div>
                    <div class="title text-grey-dark">{{ Auth::user()->name . ' ' . Auth::user()->first_last_name . ' ' . Auth::user()->second_last_name }}</div>
                    <div class="title text-grey">Tramites</div>
                </div>
            </div>
        </div>
        <div class="col-xl-4"></div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <a href="{{ url('/tramites') }}" class="w-100">
                <div class="widget widget-23 bg-gradient-06 d-flex justify-content-center align-items-center">
                    <div class="widget-body text-center">
                        <i class="ti ti-archive text-light"></i>
                        <div class="title">TRAMITES</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="{{ url('/tramites') }}" class="w-100">
                <div class="widget widget-23 bg-gradient-07 d-flex justify-content-center align-items-center">
                    <div class="widget-body text-center">
                        <i class="ti ti-folder text-light"></i>
                        <div class="title">MÓDULO 2</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-md-6">
            <a href="{{ url('/tramites') }}" class="w-100">
                <div class="widget widget-23 bg-gradient-08 d-flex justify-content-center align-items-center">
                    <div class="widget-body text-center">
                        <i class="ti ti-list text-light"></i>
                        <div class="title">MÓDULO 3</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
