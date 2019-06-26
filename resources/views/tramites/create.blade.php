@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Tramites</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/tramites') }}">Tramites</a></li>
                        <li class="breadcrumb-item active">Nuevo</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="tramites">
        <div class="widget has-shadow col-lg-6 col-md-12">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Nuevo</h4>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="{{ url('tramites') }}">
                    @csrf
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="name" class="col-lg-3 form-control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="name" name="name"
                                    class="form-control{{ $errors->has('name') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su nombre"
                                    value="{{ old('name') }}" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="appaterno" class="col-lg-3 form-control-label">Apellido paterno</label>
                        <div class="col-lg-9">
                            <input type="text" id="appaterno" name="appaterno"
                                    class="form-control{{ $errors->has('appaterno') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su apellido paterno"
                                    value="{{ old('appaterno') }}" required>

                            @if ($errors->has('appaterno'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('appaterno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="apmaterno" class="col-lg-3 form-control-label">Apellido materno</label>
                        <div class="col-lg-9">
                            <input type="text" id="apmaterno" name="apmaterno"
                                    class="form-control{{ $errors->has('apmaterno') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su apellido materno"
                                    value="{{ old('apmaterno') }}" required>
                            @if ($errors->has('apmaterno'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('apmaterno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="email" class="col-lg-3 form-control-label">Email</label>
                        <div class="col-lg-9 input-group">
                            <span class="input-group-addon addon-primary">
                                <i class="la la-at"></i>
                            </span>
                            <input type="text" id="email" name="email"
                                    class="form-control{{ $errors->has('email') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su email"
                                    value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="phone" class="col-lg-3 form-control-label">Teléfono</label>
                        <div class="col-lg-9 input-group">
                            <span class="input-group-addon addon-primary">
                                <i class="la la-phone"></i>
                            </span>
                            <input type="text" id="phone" name="phone"
                                    class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su teléfono"
                                    value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="direccion" class="col-lg-3 form-control-label">Dirección</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" id="direccion" name="direccion"
                                            class="form-control{{ $errors->has('direccion') ? ' has-error' : '' }}"
                                            placeholder="Ingrese una calle"
                                            value="{{ old('direccion') }}">
                                    @if ($errors->has('direccion'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" id="interior" name="interior"
                                            class="form-control{{ $errors->has('interior') ? ' has-error' : '' }}"
                                            placeholder="Num. Interior"
                                            value="{{ old('interior') }}">
                                    @if ($errors->has('interior'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('interior') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" id="exterior" name="exterior"
                                            class="form-control{{ $errors->has('exterior') ? ' has-error' : '' }}"
                                            placeholder="Num. Exterior"
                                            value="{{ old('exterior') }}">
                                    @if ($errors->has('exterior'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('exterior') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="zip_code" class="col-lg-3 form-control-label">Código Postal</label>
                        <div class="col-lg-9">
                            <input type="text" id="zip_code" name="zip_code"
                                    class="form-control{{ $errors->has('zip_code') ? ' has-error' : '' }} zip-code"
                                    placeholder="Ingrese el código postal"
                                    value="{{ old('zip_code') }}"
                                    onkeyup="SepomexObject.searchZip('tramites')">
                            @if ($errors->has('zip_code'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('zip_code') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="estados" class="col-lg-3 form-control-label">Estado</label>
                        <div class="col-lg-9">
                            <select class="form-control state-data"
                                    id="state_shipping" name="state_shipping"
                                    onchange="SepomexObject.getLocation('tramites', this.value);" require>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="Municipios" class="col-lg-3 form-control-label">Municipio</label>
                        <div class="col-lg-9">
                            <select class="form-control location-data"
                                    id="city_shipping" name="city_shipping"
                                    onchange="SepomexObject.getColony('tramites', this.value);"
                                    disabled require>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="Municipios" class="col-lg-3 form-control-label">Municipio</label>
                        <div class="col-lg-9">
                            <select class="custom-select colony-data"
                                    id="colony_shipping" name="colony_shipping"
                                    onchange="SepomexObject.getZipCode('tramites', this.value);"
                                    disabled require>
                            </select>
                        </div>
                        <input type="hidden" class="sepomex-id" id="sepomex_id" name="sepomex_id">
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="direccion" class="col-lg-3 form-control-label">Calle</label>
                        <div class="col-lg-9">
                            <input type="text" id="direccion" name="direccion"
                                    class="form-control{{ $errors->has('direccion') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su teléfono"
                                    value="{{ old('direccion') }}">
                            @if ($errors->has('direccion'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
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

@section('pagecss')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select/bootstrap-select.min.css') }}">
@endsection

@section('pagescript')
<script src="{{ asset('assets/vendors/js/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/js/general/sepomex.js') }}"></script>
<script src="{{ asset('assets/js/general/request.js') }}"></script>

<script type="text/javascript">
    SepomexObject.getStates('tramites');
</script>
@endsection
