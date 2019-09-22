@extends('layouts.app')

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title"><a href="{{ url('/configuration') }}">Configuraciones</a></h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti ti-user"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/configuration') }}">Configuraciones</a></li>
                            <li class="breadcrumb-item active">Listado</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Listado</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                <table id="datatable" class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Llave</th>
                            <th>Valor</th>
                            <!-- <th>Activo</th> -->
                            <th>Fecha de registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($configurations as $config)
                            @if($config->visible && $config->alias !="maps")
                            <tr>
                                <td>{{ $config->id }}</td>
                                <td>{{ $config->key }}</td>
                                <td>
                                    @switch($config->type)
                                        @case('file')
                                            @if($config->value == '')
                                            <img src="" class="img-thumbnail preview" width="100px">
                                            @else
                                            <img src="{{ asset($config->value) }}" class="img-thumbnail preview" width="100px">
                                            @endif
                                            @break
                                        @case('color')
                                            <span class="badge" style="background-color: {{ $config->value }}">{{ $config->value }}</span>
                                            @break
                                        @default
                                        {{ $config->value }}
                                    @endswitch
                                </td>
                                <!-- <td>
                                    @php
                                    $checked = ""
                                    @endphp
                                    @if($config->status == 1)
                                    @php
                                    $checked = "checked"
                                    @endphp
                                    @endif

                                    <input type="checkbox" id="switch_{{ $config->id }}" {{ $checked }}
                                        data-switch="success"
                                        onchange="document.getElementById('form_update_{{ $config->id }}').submit();">
                                    <label for="switch_{{ $config->id }}" data-on-label="Si" data-off-label="No"
                                        class="mb-0 d-block"></label>

                                    <form method="POST" id="form_update_{{ $config->id }}" class="inline"
                                        action="{{ url('admin/configuration/status/' . $config->id) }}">
                                        @method('PUT')
                                        @csrf
                                    </form>
                                </td>-->
                                <td>{{ $config->created_at }}</td>
                                <td class="td-actions">
                                    <a href="{{ url('configuration/' . $config->id . '/edit') }}" title="Editar"><i class="la la-edit edit"></i></a >
                                </td>
                            </tr>
                            @endif
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
@endsection

@section('pagescript')
<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/general/forms.js') }}"></script>
@endsection
