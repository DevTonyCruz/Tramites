@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Roles</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/roles') }}">Roles</a></li>
                        <li class="breadcrumb-item active">Nuevo</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="widget has-shadow col-lg-6 col-md-12">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Nuevo</h4>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="{{ url('roles') }}">
                    @csrf
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="name" class="col-lg-3 form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name"
                                    class="form-control{{ $errors->has('name') ? ' has-error' : '' }}"
                                    placeholder="Ingrese el nombre"
                                    value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="descripcion" class="col-lg-3 form-control-label">Descripción</label>
                        <div class="col-lg-9">
                            <textarea id="descripcion" name="descripcion"
                                    class="form-control{{ $errors->has('descripcion') ? ' has-error' : '' }}"
                                    placeholder="Ingrese una descripción">{{ old('descripcion') }}</textarea>

                            @if ($errors->has('descripcion'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="em-separator separator-dashed"></div>
                    <div class="text-right">
                        <button class="btn btn-gradient-01" type="submit">Guardar</button>
                        <button class="btn btn-shadow" type="reset">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
