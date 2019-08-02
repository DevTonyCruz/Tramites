@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title"><a href="{{ route('tramites.index') }}">Tramites</a></h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('tramites.index') }}"><i class="ti ti-home"></i></a></li>
                        <!--<li class="breadcrumb-item"><a href="#">Components</a></li>-->
                        <li class="breadcrumb-item active">Tramites</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Nuevo tramite</h4>
                </div>
                <div class="widget-body">
                    <div class="row flex-row justify-content-center">
                        <div class="col-xl-10">
                            <div class="tab-content" id="tramites">
                                <form class="form-horizontal" id="form-tramites" action="{{ url('tramites') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                    @csrf
                                    <div class="section-title mt-5 mb-5">
                                        <h4>Información</h4>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="name" class="form-control-label">Nombre<span class="text-danger ml-2">*</span></label>
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
                                        <div class="col-xl-4">
                                            <label class="form-control-label">Apellido paterno<span class="text-danger ml-2">*</span></label>
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
                                        <div class="col-xl-4">
                                            <label class="form-control-label">Apellido materno</label>
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
                                    <div class="form-group row mb-5">
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-control-label">Correo electrónico</label>
                                            <div class="input-group">
                                                <span class="input-group-addon addon-secondary">
                                                    <i class="la la-at"></i>
                                                </span>
                                                <input type="text" id="email" name="email"
                                                        class="form-control{{ $errors->has('email') ? ' has-error' : '' }}"
                                                        placeholder="Ingrese su correo electrónico"
                                                        value="{{ old('email') }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-control-label">Teléfono</label>
                                            <div class="input-group">
                                                <span class="input-group-addon addon-secondary">
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
                                    </div>

                                    <div class="section-title mt-5 mb-5">
                                        <h4>Dirección</h4>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-6 mb-3">
                                            <label class="form-control-label">Calle<span class="text-danger ml-2">*</span></label>
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
                                        <div class="col-xl-2 mb-3">
                                            <label class="form-control-label">Núm. Exterior<span class="text-danger ml-2">*</span></label>
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
                                        <div class="col-xl-2">
                                            <label class="form-control-label">Núm. Interior</label>
                                            <input type="text" id="interior" name="interior"
                                                    class="form-control{{ $errors->has('interior') ? ' has-error' : '' }}"
                                                    placeholder="Núm. Interior"
                                                    value="{{ old('interior') }}">
                                            @if ($errors->has('interior'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('interior') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-2 mb-3">
                                            <label class="form-control-label">Código Postal<span class="text-danger ml-2">*</span></label>
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
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 ">
                                            <label class="form-control-label">Estado<span class="text-danger ml-2">*</span></label>
                                            <select class="form-control state-data"
                                                    id="state" name="state"
                                                    onchange="SepomexObject.getLocation('tramites', this.value);" require>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label class="form-control-label">Municipio<span class="text-danger ml-2">*</span></label>
                                            <select class="form-control location-data"
                                                    id="city" name="city"
                                                    onchange="SepomexObject.getColony('tramites', this.value);"
                                                    disabled require>
                                            </select>
                                        </div>
                                        <div class="col-xl-4">
                                            <label class="form-control-label">Colonia<span class="text-danger ml-2">*</span></label>
                                            <select class="form-control colony-data"
                                                    id="colony" name="colony"
                                                    onchange="SepomexObject.getZipCode('tramites', this.value);"
                                                    disabled require>
                                            </select>
                                            <input type="hidden" class="sepomex-id" id="sepomex_id" name="sepomex_id">
                                        </div>
                                    </div>

                                    <div class="section-title mt-5 mb-5">
                                        <h4>Información general</h4>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="seccional" class="form-control-label">Seccional<span class="text-danger ml-2">*</span></label>
                                            <input type="text" id="seccional" name="seccional"
                                            class="form-control{{ $errors->has('seccional') ? ' has-error' : '' }}"
                                            placeholder="Ingrese una seccional"
                                            value="{{ old('seccional') }}" required>
                                            @if ($errors->has('seccional'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('seccional') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="demarcacion" class="form-control-label">Demarcación<span class="text-danger ml-2">*</span></label>
                                            <input type="text" id="demarcacion" name="demarcacion"
                                            class="form-control{{ $errors->has('demarcacion') ? ' has-error' : '' }}"
                                            placeholder="Ingrese una demarcación"
                                            value="{{ old('demarcacion') }}" required>
                                            @if ($errors->has('demarcacion'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('demarcacion') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="distrito" class="form-control-label">Distrito<span class="text-danger ml-2">*</span></label>
                                            <input type="text" id="distrito" name="distrito"
                                            class="form-control{{ $errors->has('distrito') ? ' has-error' : '' }}"
                                            placeholder="Ingrese un distrito"
                                            value="{{ old('distrito') }}" required>
                                            @if ($errors->has('distrito'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('distrito') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="simpatizante" class="form-control-label">Simpatizante</label>
                                            <input type="text" id="simpatizante" name="simpatizante"
                                            class="form-control{{ $errors->has('simpatizante') ? ' has-error' : '' }}"
                                            placeholder="Ingrese el simpatizante"
                                            value="{{ old('simpatizante') }}" required>
                                            @if ($errors->has('simpatizante'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('simpatizante') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Gestión<span class="text-danger ml-2">*</span></label>
                                            <select class="form-control{{ $errors->has('gestion') ? ' has-error' : '' }}"
                                                    id="gestion" name="gestion"
                                                    require>
                                                <option value="S">Seleccionar</option>

                                                @foreach ($gestiones as $gestion)
                                                    <option value="{{ $gestion->id }}" {{ (old('gestion') == $gestion->id) ? 'selected' : '' }}>{{ $gestion->nombre }}</option>
                                                @endforeach

                                                @if ($errors->has('gestion'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('gestion') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Remitente<span class="text-danger ml-2">*</span></label>
                                            <select class="form-control{{ $errors->has('remitente') ? ' has-error' : '' }}"
                                                    id="remitente" name="remitente"
                                                    require>
                                                    <option value="S">Seleccionar</option>

                                                    @foreach ($remitentes as $remitente)
                                                        <option value="{{ $remitente->id }}" {{ (old('remitente') == $remitente->id) ? 'selected' : '' }}>{{ $remitente->nombre . ' ' . $remitente->appaterno . ' ' . $remitente->apmaterno }}</option>
                                                    @endforeach

                                                    @if ($errors->has('remitente'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $errors->first('remitente') }}</strong>
                                                        </span>
                                                    @endif
                                            </select>
                                        </div>
                                        <div class="col-xl-5">
                                            <label class="col-lg-3 form-control-label">Fecha inicial</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon addon-secondary">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                    <input type="text" name="fecha_ini" id="fecha_ini"
                                                            class="form-control datepicker{{ $errors->has('fecha_ini') ? ' has-error' : '' }}">

                                                    @if ($errors->has('fecha_ini'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $errors->first('fecha_ini') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <label class="col-lg-3 form-control-label">Fecha final</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon addon-secondary">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                    <input type="text" name="fecha_fin" id="fecha_fin"
                                                            class="form-control datepicker{{ $errors->has('fecha_ini') ? ' has-error' : '' }}">

                                                    @if ($errors->has('fecha_fin'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $errors->first('fecha_fin') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 pt-5">
                                            <div class="styled-checkbox">
                                                <input type="checkbox" name="sin_fecha" id="sin_fecha">
                                                <label for="sin_fecha">Sin fecha final</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="ife" class="form-control-label">IFE<span class="text-danger ml-2">*</span></label>
                                            <input type="text" id="ife" name="ife"
                                            class="form-control{{ $errors->has('ife') ? ' has-error' : '' }}"
                                            placeholder="Ingrese datos de IFE"
                                            value="{{ old('ife') }}" required>
                                            @if ($errors->has('ife'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('ife') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="cantidad" class="form-control-label">Cantidad<span class="text-danger ml-2">*</span></label>
                                            <input type="text" id="cantidad" name="cantidad"
                                            class="form-control{{ $errors->has('cantidad') ? ' has-error' : '' }}"
                                            placeholder="Ingrese una cantidad"
                                            value="{{ old('cantidad') }}" required>
                                            @if ($errors->has('cantidad'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('cantidad') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="foto" class="form-control-label">Fotografías</label>
                                            <input type="file" id="foto" name="foto"
                                            class="form-control{{ $errors->has('foto') ? ' has-error' : '' }}"
                                            value="{{ old('foto') }}" required>
                                            @if ($errors->has('foto'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('foto') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label for="observaciones" class="form-control-label">Observaciones<span class="text-danger ml-2">*</span></label>
                                            <textarea type="text" id="observaciones" name="observaciones"
                                            class="form-control{{ $errors->has('observaciones') ? ' has-error' : '' }}"
                                            placeholder="Ingrese alguna observacíon"
                                            value="{{ old('observaciones') }}" required></textarea>
                                            @if ($errors->has('observaciones'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('observaciones') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-12 mb-3 text-right">
                                            <button type="button" class="btn btn-info mr-1 mb-2" id="save-button"><i class="la la-save"></i>Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Row -->
</div>
@endsection

@section('pagecss')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select/bootstrap-select.min.css') }}">
@endsection

@section('pagescript')
<script src="{{ asset('assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('assets/js/components/wizard/form-wizard.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/components/datepicker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/general/sepomex.js') }}"></script>
<script src="{{ asset('assets/js/general/request.js') }}"></script>
<script src="{{ asset('assets/js/general/tramites.js') }}"></script>

<script type="text/javascript">
    SepomexObject.getStates('tramites');
    SepomexObject.getLocation('tramites', 'Nayarit', 'Tepic');
    SepomexObject.getColonyByStateAndLocation('tramites', 'Nayarit', 'Tepic');

    $("#save-button").on('click', function(){
        $("#form-tramites").submit();
    })
</script>
@endsection
