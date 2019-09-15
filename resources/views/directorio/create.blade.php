@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title"><a href="{{ route('directorio.index') }}">Directorio</a></h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('directorio.index') }}"><i class="ti ti-home"></i></a></li>
                        <!--<li class="breadcrumb-item"><a href="#">Components</a></li>-->
                        <li class="breadcrumb-item active">Directorio</li>
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
                    <h4>Nuevo directorio</h4>
                </div>
                <div class="widget-body">
                    <div class="row flex-row justify-content-center">
                        <div class="col-xl-10">
                            <div class="tab-content">
                                <form class="form-horizontal" id="form-directorio" action="{{ url('/directorio') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                    @csrf
                                    <div class="section-title mt-5 mb-5">
                                        <h4>Información</h4>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="nombre" class="form-control-label">Nombre<span class="text-danger ml-2">*</span></label>
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
                                        <div class="col-xl-4 mb-3">
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
                                        <div class="col-xl-4 mb-3">
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
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="hobbie" class="form-control-label">Pasatiempos</label>
                                            <input type="text" id="hobbie" name="hobbie"
                                            class="form-control{{ $errors->has('hobbie') ? ' has-error' : '' }}"
                                            placeholder="Ingrese algún pasatiempo"
                                            value="{{ old('hobbie') }}" required>
                                            @if ($errors->has('hobbie'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('hobbie') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Trabajo actual</label>
                                            <input type="text" id="trabajo" name="trabajo"
                                                    class="form-control{{ $errors->has('trabajo') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese un trabajo"
                                                    value="{{ old('trabajo') }}" required>

                                            @if ($errors->has('trabajo'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('trabajo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="section-title mt-5 mb-5">
                                        <h4>Redes sociales</h4>
                                    </div>
                                    <div class="form-group row mb-5">

                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-addon addon-secondary">
                                                    <i class="la la-facebook"></i>
                                                </span>
                                                <input type="text" id="facebook" name="facebook"
                                                        class="form-control{{ $errors->has('facebook') ? ' has-error' : '' }}"
                                                        placeholder="Ingrese su facebook"
                                                        value="{{ old('facebook') }}">
                                                @if ($errors->has('facebook'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('facebook') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Instagram</label>
                                            <div class="input-group">
                                                <span class="input-group-addon addon-secondary">
                                                    <i class="la la-instagram"></i>
                                                </span>
                                                <input type="text" id="instagram" name="instagram"
                                                        class="form-control{{ $errors->has('instagram') ? ' has-error' : '' }}"
                                                        placeholder="Ingrese instagram"
                                                        value="{{ old('instagram') }}">
                                                @if ($errors->has('instagram'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('instagram') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-addon addon-secondary">
                                                    <i class="la la-twitter"></i>
                                                </span>
                                                <input type="text" id="twitter" name="twitter"
                                                        class="form-control{{ $errors->has('twitter') ? ' has-error' : '' }}"
                                                        placeholder="Ingrese twitter"
                                                        value="{{ old('twitter') }}">
                                                @if ($errors->has('twitter'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('twitter') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-title mt-5 mb-5">
                                        <h4>Dirección</h4>
                                    </div>
                                    <div id="directorio">
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
                                                        onkeyup="SepomexObject.searchZip('directorio')">
                                                @if ($errors->has('zip_code'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Estado<span class="text-danger ml-2">*</span></label>
                                                <select class="form-control state-data"
                                                        id="state" name="state"
                                                        onchange="SepomexObject.getLocation('directorio', this.value);" require>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Municipio<span class="text-danger ml-2">*</span></label>
                                                <select class="form-control location-data"
                                                        id="city" name="city"
                                                        onchange="SepomexObject.getColony('directorio', this.value);"
                                                        disabled require>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Colonia<span class="text-danger ml-2">*</span></label>
                                                <select class="form-control colony-data"
                                                        id="colony" name="colony"
                                                        onchange="SepomexObject.getZipCode('directorio', this.value);"
                                                        disabled require>
                                                </select>
                                                <input type="hidden" class="sepomex-id" id="sepomex_id" name="sepomex_id">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-title mt-5 mb-5">
                                        <h4>Información general</h4>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="seccional" class="form-control-label">Seccional</label>
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
                                            <label for="demarcacion" class="form-control-label">Demarcación</label>
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
                                            <label for="distrito" class="form-control-label">Distrito</label>
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
                                            <label class="form-control-label">Profesión</label>
                                            <select class="form-control{{ $errors->has('id_profesion') ? ' has-error' : '' }}"
                                                    id="id_profesion" name="id_profesion"
                                                    require>
                                                <option value="S">Seleccionar</option>

                                                @foreach ($profesiones as $profesion)
                                                    <option value="{{ $profesion->id }}" {{ (old('id_profesion') == $profesion->id) ? 'selected' : '' }}>{{ $profesion->nombre }}</option>
                                                @endforeach

                                                @if ($errors->has('id_profesion'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('id_profesion') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Grupo</label>
                                            <select class="form-control{{ $errors->has('id_grupos') ? ' has-error' : '' }}"
                                                    id="id_grupos" name="id_grupos"
                                                    require>
                                                    <option value="S">Seleccionar</option>

                                                    @foreach ($grupos as $grupo)
                                                        <option value="{{ $grupo->id }}" {{ (old('id_grupos') == $grupo->id) ? 'selected' : '' }}>{{ $grupo->nombre . ' ' . $grupo->appaterno . ' ' . $grupo->apmaterno }}</option>
                                                    @endforeach

                                                    @if ($errors->has('id_grupos'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $errors->first('id_grupos') }}</strong>
                                                        </span>
                                                    @endif
                                            </select>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-control-label">Fecha de nacimiento<span class="text-danger ml-2">*</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon addon-secondary">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                    <input type="text" name="fecha_nacimiento" id="fecha_nacimiento"
                                                            class="form-control datepicker{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}"
                                                            value="{!! \Carbon\Carbon::parse(old('fecha_nacimiento'))->format('m/d/Y') !!}">

                                                    @if ($errors->has('fecha_nacimiento'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-control-label">Fecha de contacto<span class="text-danger ml-2">*</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon addon-secondary">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                    <input type="text" name="fecha_contacto" id="fecha_contacto"
                                                            class="form-control datepicker{{ $errors->has('fecha_contacto') ? ' has-error' : '' }}"
                                                            value="{!! \Carbon\Carbon::parse(old('fecha_contacto'))->format('m/d/Y') !!}">

                                                    @if ($errors->has('fecha_contacto'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $errors->first('fecha_contacto') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-control-label">Fecha importante<span class="text-danger ml-2">*</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon addon-secondary">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                    <input type="text" name="fecha_importante" id="fecha_importante"
                                                            class="form-control datepicker{{ $errors->has('fecha_importante') ? ' has-error' : '' }}"
                                                            value="{!! \Carbon\Carbon::parse(old('fecha_importante'))->format('m/d/Y') !!}">

                                                    @if ($errors->has('fecha_importante'))
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $errors->first('fecha_importante') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label for="concepto_fecha_importante" class="form-control-label">Concepto de fecha importante<span class="text-danger ml-2">*</span></label>
                                            <div class="form-group">
                                                <input type="text" id="concepto_fecha_importante" name="concepto_fecha_importante"
                                                class="form-control{{ $errors->has('concepto_fecha_importante') ? ' has-error' : '' }}"
                                                placeholder="Ingrese el concepto de la fecha importante"
                                                value="{{ old('concepto_fecha_importante') }}" required>
                                                @if ($errors->has('concepto_fecha_importante'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('concepto_fecha_importante') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label for="observaciones" class="form-control-label">Observaciones</label>
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
                                    </div>

                                    <div class="section-title mt-5 mb-5">
                                        <h4>Información politica</h4>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="coordinador_zona" class="form-control-label">Coordinador de zona</label>
                                            <input type="text" id="coordinador_zona" name="coordinador_zona"
                                            class="form-control{{ $errors->has('coordinador_zona') ? ' has-error' : '' }}"
                                            placeholder="Ingrese una coordinador_zona"
                                            value="{{ old('coordinador_zona') }}" required>
                                            @if ($errors->has('coordinador_zona'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('coordinador_zona') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="coordinador_demarcacion" class="form-control-label">Coordinador de demarcación</label>
                                            <input type="text" id="coordinador_demarcacion" name="coordinador_demarcacion"
                                            class="form-control{{ $errors->has('coordinador_demarcacion') ? ' has-error' : '' }}"
                                            placeholder="Ingrese el coordinador de demarcación"
                                            value="{{ old('coordinador_demarcacion') }}" required>
                                            @if ($errors->has('coordinador_demarcacion'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('coordinador_demarcacion') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="distrito_politico" class="form-control-label">Distrito</label>
                                            <input type="text" id="distrito_politico" name="distrito_politico"
                                            class="form-control{{ $errors->has('distrito_politico') ? ' has-error' : '' }}"
                                            placeholder="Ingrese el distrito politico"
                                            value="{{ old('distrito_politico') }}" required>
                                            @if ($errors->has('distrito_politico'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('distrito_politico') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="politico">
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-4 mb-3">
                                                <label for="demarcacion_politico" class="form-control-label">Demarcación</label>
                                                <input type="text" id="demarcacion_politico" name="demarcacion_politico"
                                                class="form-control{{ $errors->has('demarcacion_politico') ? ' has-error' : '' }}"
                                                placeholder="Ingrese la demarcación"
                                                value="{{ old('demarcacion_politico') }}" required>
                                                @if ($errors->has('demarcacion_politico'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('demarcacion_politico') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label for="seccional_politico" class="form-control-label">Seccional</label>
                                                <input type="text" id="seccional_politico" name="seccional_politico"
                                                class="form-control{{ $errors->has('seccional_politico') ? ' has-error' : '' }}"
                                                placeholder="Ingrese una cantidad"
                                                value="{{ old('seccional_politico') }}" required>
                                                @if ($errors->has('seccional_politico'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('seccional_politico') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Código Postal<span class="text-danger ml-2">*</span></label>
                                                <input type="text" id="zip_code" name="zip_code"
                                                        class="form-control{{ $errors->has('zip_code') ? ' has-error' : '' }} zip-code"
                                                        placeholder="Ingrese el código postal"
                                                        value="{{ old('zip_code') }}"
                                                        onkeyup="SepomexObject.searchZip('politico')">
                                                @if ($errors->has('zip_code'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Estado<span class="text-danger ml-2">*</span></label>
                                                <select class="form-control state-data"
                                                        id="state" name="state"
                                                        onchange="SepomexObject.getLocation('politico', this.value);" require>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Municipio<span class="text-danger ml-2">*</span></label>
                                                <select class="form-control location-data"
                                                        id="city" name="city"
                                                        onchange="SepomexObject.getColony('politico', this.value);"
                                                        disabled require>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Colonia<span class="text-danger ml-2">*</span></label>
                                                <select class="form-control colony-data"
                                                        id="colony" name="colony"
                                                        onchange="SepomexObject.getZipCode('politico', this.value);"
                                                        disabled require>
                                                </select>
                                                <input type="hidden" class="sepomex-id" id="sepomex_id_politico" name="sepomex_id_politico">
                                            </div>
                                            <div class="col-xl-12 mb-3 text-right">
                                                    <button type="button" class="btn btn-info mr-1 mb-2" id="save-button"><i class="la la-save"></i>Guardar</button>
                                                </div>
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
<script src="{{ asset('assets/js/general/directorio.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script type="text/javascript">
    SepomexObject.getStates('directorio');
    SepomexObject.getLocation('directorio', 'Nayarit', 'Tepic');
    SepomexObject.getColonyByStateAndLocation('directorio', 'Nayarit', 'Tepic');

    SepomexObject.getStates('politico');
    SepomexObject.getLocation('politico', 'Nayarit', 'Tepic');
    SepomexObject.getColonyByStateAndLocation('politico', 'Nayarit', 'Tepic');

    $("#save-button").on('click', function(){
        $("#form-directorio").submit();
    })

    $(document).ready(function(){
        $('#phone').mask('00-00-00-00-00');
    });
</script>
@endsection
