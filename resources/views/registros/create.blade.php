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
                        <li class="breadcrumb-item"><a href="{{ route('directorio.index') }}"><i
                                    class="ti ti-home"></i></a></li>
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
                                <form class="form-horizontal" id="form-registros"
                                    action="{{ url('registros/' . $registro->id) }}" method="POST"
                                    accept-charset="UTF-8" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="section-title mt-5 mb-5">
                                        <h4>Información</h4>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="nombre" class="form-control-label">Nombre<span
                                                    class="text-danger ml-2">*</span></label>
                                            <input type="text" id="nombre" name="nombre"
                                                class="form-control{{ $errors->has('nombre') ? ' has-error' : '' }}"
                                                placeholder="Ingrese su nombre" value="{{ $registro->nombre }}"
                                                required>
                                            @if ($errors->has('nombre'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Apellido paterno<span
                                                    class="text-danger ml-2">*</span></label>
                                            <input type="text" id="appaterno" name="appaterno"
                                                class="form-control{{ $errors->has('appaterno') ? ' has-error' : '' }}"
                                                placeholder="Ingrese su apellido paterno"
                                                value="{{ $registro->apellido_paterno }}" required>

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
                                                value="{{ $registro->apellido_materno }}" required>
                                            @if ($errors->has('apmaterno'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('apmaterno') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Sexo<span
                                                    class="text-danger ml-2">*</span></label>
                                            <select class="form-control" id="sexo" name="sexo">
                                                <option value="S" disabled>
                                                    Seleccionar</option>
                                                <option value="H" {{ ($registro->clave == 'H') ? 'selected' : '' }}>
                                                    Masculino</option>
                                                <option value="M" {{ ($registro->clave == 'M') ? 'selected' : '' }}>
                                                    Femenino</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Clave</label>
                                            <input type="text" id="clave" name="clave"
                                                class="form-control{{ $errors->has('clave') ? ' has-error' : '' }}"
                                                placeholder="Ingrese la clave del registro"
                                                value="{{ $registro->clave }}" required>
                                            @if ($errors->has('clave'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('clave') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Correo electrónico</label>
                                            <div class="input-group">
                                                <span class="input-group-addon addon-secondary">
                                                    <i class="la la-at"></i>
                                                </span>
                                                <input type="text" id="email" name="email"
                                                    class="form-control{{ $errors->has('email') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese su correo electrónico"
                                                    value="{{ $registro->correo }}" required>
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Teléfono</label>
                                            <div class="input-group">
                                                <span class="input-group-addon addon-secondary">
                                                    <i class="la la-phone"></i>
                                                </span>
                                                <input type="text" id="phone" name="phone"
                                                    class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese su teléfono" value="{{ $registro->telefono }}">
                                                @if ($errors->has('phone'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label class="form-control-label">Fecha de nacimiento<span
                                                    class="text-danger ml-2">*</span></label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon addon-secondary">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                    <input type="text" name="fecha_nacimiento" id="fecha_nacimiento"
                                                        class="form-control datepicker{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}"
                                                        value="{!! \Carbon\Carbon::parse($registro->fecha_nac)->format('m/d/Y') !!}">

                                                    @if ($errors->has('fecha_nacimiento'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 mb-3">
                                            <label for="lugar_nacimiento" class="form-control-label">Lugar de
                                                nacimiento</label>
                                            <input type="text" id="lugar_nacimiento" name="lugar_nacimiento"
                                                class="form-control{{ $errors->has('lugar_nacimiento') ? ' has-error' : '' }}"
                                                placeholder="Ingrese algún pasatiempo"
                                                value="{{ $registro->lugar_nacimiento }}" required>
                                            @if ($errors->has('lugar_nacimiento'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('lugar_nacimiento') }}</strong>
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
                                                    placeholder="Ingrese su facebook" value="{{ $registro->facebook }}">
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
                                                    placeholder="Ingrese instagram" value="{{ $registro->instagram }}">
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
                                                    placeholder="Ingrese twitter" value="{{ $registro->twitter }}">
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
                                    <div id="registros">
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-control-label">Calle<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="calle" name="calle"
                                                    class="form-control{{ $errors->has('calle') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese una calle" value="{{ $registro->calle }}">
                                                @if ($errors->has('calle'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('calle') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Núm. Exterior<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="num_ext" name="num_ext"
                                                    class="form-control{{ $errors->has('num_ext') ? ' has-error' : '' }}"
                                                    placeholder="Num. num_ext" value="{{ $registro->num_ext }}">
                                                @if ($errors->has('num_ext'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('num_ext') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2">
                                                <label class="form-control-label">Núm. Interior</label>
                                                <input type="text" id="num_int" name="num_int"
                                                    class="form-control{{ $errors->has('num_int') ? ' has-error' : '' }}"
                                                    placeholder="Núm. num_int" value="{{ $registro->num_int }}">
                                                @if ($errors->has('num_int'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('num_int') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Código Postal<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="codigo_postal" name="codigo_postal"
                                                    class="form-control{{ $errors->has('codigo_postal') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese el código postal"
                                                    value="{{ $registro->codigo_postal }}">
                                                @if ($errors->has('codigo_postal'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('codigo_postal') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Estado<span
                                                        class="text-danger ml-2">*</span></label>
                                                <select class="form-control state-data" id="state" name="state"
                                                    onchange="SepomexObject.getLocation('registros', this.value);"
                                                    require>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Municipio<span
                                                        class="text-danger ml-2">*</span></label>
                                                <select class="form-control location-data" id="city" name="city"
                                                    onchange="SepomexObject.getColony('registros', this.value);"
                                                    disabled require>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Colonia<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="colonia" name="colonia"
                                                    class="form-control{{ $errors->has('colonia') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese una colonia" value="{{ $registro->colonia }}">
                                                @if ($errors->has('colonia'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('colonia') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Código del entidad<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="entidad" name="entidad"
                                                    class="form-control{{ $errors->has('entidad') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese el código de la entidad"
                                                    value="{{ $registro->entidad }}">
                                                @if ($errors->has('entidad'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('entidad') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Distrito<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="distrito" name="distrito"
                                                    class="form-control{{ $errors->has('distrito') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese el distrito" value="{{ $registro->distrito }}">
                                                @if ($errors->has('distrito'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('distrito') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Código del municipio<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="municipio" name="municipio"
                                                    class="form-control{{ $errors->has('municipio') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese el código del municipio"
                                                    value="{{ $registro->municipio }}">
                                                @if ($errors->has('municipio'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('municipio') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Sección<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="seccion" name="seccion"
                                                    class="form-control{{ $errors->has('seccion') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese la sección" value="{{ $registro->seccion }}">
                                                @if ($errors->has('seccion'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('seccion') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Código de la localidad<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="localidad" name="localidad"
                                                    class="form-control{{ $errors->has('localidad') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese el código de la localidad"
                                                    value="{{ $registro->localidad }}">
                                                @if ($errors->has('localidad'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('localidad') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-2 mb-3">
                                                <label class="form-control-label">Manzana<span
                                                        class="text-danger ml-2">*</span></label>
                                                <input type="text" id="manzana" name="manzana"
                                                    class="form-control{{ $errors->has('manzana') ? ' has-error' : '' }}"
                                                    placeholder="Ingrese la manzana" value="{{ $registro->manzana }}">
                                                @if ($errors->has('manzana'))
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $errors->first('manzana') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section-title mt-5 mb-5">
                                        <h4>Información politica</h4>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-xl-4 mb-3">
                                            <label for="simpatizante" class="form-control-label">Simpatizante</label>
                                            <input type="text" id="simpatizante" name="simpatizante"
                                                class="form-control{{ $errors->has('simpatizante') ? ' has-error' : '' }}"
                                                placeholder="Ingrese un simpatizante"
                                                value="{{ $registro->simpatizante }}" required>
                                            @if ($errors->has('simpatizante'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('simpatizante') }}</strong>
                                            </span>
                                            @endif
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
<script src="{{ asset('assets/vendors/js/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/js/components/datepicker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/general/request.js') }}"></script>
<script src="{{ asset('assets/js/general/registros.js') }}"></script>

<script type="text/javascript">
    $("#save-button").on('click', function(){
        $("#form-registros").submit();
    })

    SepomexObject.getStates('registros');
    SepomexObject.getLocation('registros', 'Nayarit', 'Tepic');
</script>
@endsection