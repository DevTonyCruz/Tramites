@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Fechas</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/fechas') }}">Fechas</a></li>
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
                <form class="form-horizontal" method="POST" action="{{ url('fechas') }}">
                    @csrf
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="nombre" class="col-lg-3 form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="nombre" name="nombre"
                                    class="form-control{{ $errors->has('nombre') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su nombre"
                                    value="{{ old('nombre') }}" required>
                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="fecha" class="col-lg-3 form-control-label">Fecha</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-addon addon-secondary">
                                    <i class="la la-calendar"></i>
                                </span>
                                <input type="text" name="fecha" id="fecha"
                                        class="form-control datepicker{{ $errors->has('fecha') ? ' has-error' : '' }}">

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
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

@section('pagescript')
<script src="{{ asset('assets/vendors/js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/components/datepicker/datepicker.js') }}"></script>

<script type="text/javascript">
    $("#save-button").on('click', function(){
        $("#form-tramites").submit();
    })
</script>
@endsection

