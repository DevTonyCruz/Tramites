@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Permisos</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/roles') }}">Permisos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Administrador</h4>
                    Todos los accesos
                    <p></p>

                    <div class="custom-control custom-checkbox">
                        <input id="select-all" type="checkbox" class="custom-control-input">
                        <label for="select-all" class="custom-control-label">Selecciona todo</label>
                    </div>

                    <button onclick="document.getElementById('permissions-form').submit();" type="submit" class="btn btn-primary mt-3">Guardar
                    </button>

                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form id="permissions-form" action="{{ url('roles/permission/' . $id) }}" method="post">
                @csrf
                @method('put')

                <div class="card-columns">

                    @foreach($permisos['grupos'] as $controller)
                    <div class="">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-right">
                                <i class="mdi mdi-key-variant widget-icon"></i>
                                </div>

                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">{{ $controller }}</h5>

                                <p class="mb-2 text-muted">
                                    <span class="text-success mr-2"><i class="mdi mdi-view-list"></i>Acciones</span>
                                </p>


                                @foreach($permisos['permisos'] as $permiso)
                                    @if($controller == $permiso['controller'])
                                        @php
                                        $checked = ""
                                        @endphp
                                        @if(in_array($permiso['id'], $permisos['relacion']))
                                            @php
                                            $checked = "checked"
                                            @endphp
                                        @endif
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" {{ $checked }} id="permiso_{{ $permiso['id'] }}" name="{{ $controller }}[]" value="{{ $permiso['id'] }}" class="custom-control-input">
                                            <label for="permiso_{{ $permiso['id'] }}" class="custom-control-label">{{ $permiso['name'] }}</label>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('pagescript')

<script src="{{ asset('js/actions/roles.js') }}" defer></script>

@stop
