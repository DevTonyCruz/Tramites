@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Remitente</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/remitente') }}">Remitente</a></li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="widget has-shadow col-lg-6 col-md-12">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Editar</h4>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="{{ url('remitente/' . $remitente->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="nombre" class="col-lg-3 form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="nombre" name="nombre"
                                    class="form-control{{ $errors->has('nombre') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su nombre"
                                    value="{{  $remitente->nombre }}" required>
                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="first-last-name" class="col-lg-3 form-control-label">Apellido paterno</label>
                        <div class="col-lg-9">
                            <input type="text" id="first-last-name" name="appaterno"
                                    class="form-control{{ $errors->has('appaterno') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su apellido paterno"
                                    value="{{  $remitente->appaterno }}" required>

                            @if ($errors->has('appaterno'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('appaterno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="second-last-name" class="col-lg-3 form-control-label">Apellido materno</label>
                        <div class="col-lg-9">
                            <input type="text" id="second-last-name" name="apmaterno"
                                    class="form-control{{ $errors->has('apmaterno') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su apellido materno"
                                    value="{{  $remitente->apmaterno }}" required>
                            @if ($errors->has('apmaterno'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('apmaterno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="em-separator separator-dashed"></div>
                    <div class="text-right">
                        <button class="btn btn-gradient-01" type="submit">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
