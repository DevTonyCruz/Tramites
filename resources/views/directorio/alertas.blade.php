@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Directorio</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/directorio') }}">Directorio</a></li>
                        <li class="breadcrumb-item active">Fechas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Listado de fechas</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="datatable" class="table mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de cumpleaños</th>
                            <th>Fecha de contacto</th>
                            <th>Fecha de profesión</th>
                            <th>Fecha de importante</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fechas as $fecha)
                        <tr>
                            <td>{{ $fecha['nombre'] }}</td>
                            @php
                                $fecha_cumpleanios = '--------';
                                if($fecha['fechas']['cumpleanios'] !== false){
                                    $fecha_cumpleanios = $fecha['fechas']['cumpleanios'];
                                }
                            @endphp
                            <td>{{ $fecha_cumpleanios }}</td>
                            @php
                                $fecha_contacto = '--------';
                                if($fecha['fechas']['contacto'] !== false){
                                    $fecha_contacto = $fecha['fechas']['contacto'];
                                }
                            @endphp
                            <td>{{ $fecha_contacto }}</td>
                            @php
                                $fecha_feriado = '--------';
                                if($fecha['fechas']['feriado'] !== false){
                                    $fecha_feriado = $fecha['fechas']['feriado'];
                                }
                            @endphp
                            <td>{{ $fecha_feriado }}</td>
                            @php
                                $fecha_importante = '--------';
                                if($fecha['fechas']['importante'] !== false){
                                    $fecha_importante = $fecha['fechas']['importante'];
                                }
                            @endphp
                            <td>{{ $fecha_importante }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagecss')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select/bootstrap-select.min.css') }}">
@endsection

@section('pagescript')
<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
@endsection
