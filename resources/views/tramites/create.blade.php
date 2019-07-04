@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Forms Wizard</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Components</a></li>
                        <li class="breadcrumb-item active">Forms Wizard</li>
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
                    <h4>Wizard Example</h4>
                </div>
                <div class="widget-body">
                    <div class="row flex-row justify-content-center">
                        <div class="col-xl-10">
                            <div id="rootwizard">
                                <div class="step-container">
                                    <div class="step-wizard">
                                        <div class="progress">
                                            <div class="progressbar"></div>
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#tab1" data-toggle="tab">
                                                    <span class="step">1</span>
                                                    <span class="title">Beneficiario</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab">
                                                    <span class="step">2</span>
                                                    <span class="title">Necesidad</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">
                                                    <span class="step">3</span>
                                                    <span class="title">Gestión</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="tramites">
                                    <div class="tab-pane" id="tab1">
                                        <form id="form-beneficiario" method="POST">
                                            <div class="section-title mt-5 mb-5">
                                                <h4>Información de usuario</h4>
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
                                                    <label class="form-control-label">Apellido materno<span class="text-danger ml-2">*</span></label>
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
                                                <div class="col-xl-4 mb-3">
                                                    <label class="form-control-label">Estado<span class="text-danger ml-2">*</span></label>
                                                    <select class="form-control state-data"
                                                            id="state" name="state"
                                                            onchange="SepomexObject.getLocation('tramites', this.value);" require>
                                                    </select>
                                                </div>
                                                <div class="col-xl-4 mb-5">
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
                                            <ul class="pager wizard text-right">
                                                <li class="next d-inline-block">
                                                    <a href="javascript:;" class="btn btn-gradient-01" step="beneficiario">Siguiente</a>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="section-title mt-5 mb-5">
                                            <h4>Información general</h4>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-4 mb-3">
                                                <label for="secretaria" class="form-control-label">Secretaría<span class="text-danger ml-2">*</span></label>
                                                <input type="text" id="secretaria" name="secretaria"
                                                class="form-control{{ $errors->has('secretaria') ? ' has-error' : '' }}"
                                                placeholder="Ingrese su nombre"
                                                value="{{ old('secretaria') }}" required>
                                                @if ($errors->has('secretaria'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('secretaria') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label for="demarcacion" class="form-control-label">Demarcación<span class="text-danger ml-2">*</span></label>
                                                <input type="text" id="demarcacion" name="demarcacion"
                                                class="form-control{{ $errors->has('demarcacion') ? ' has-error' : '' }}"
                                                placeholder="Ingrese su nombre"
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
                                                placeholder="Ingrese el distrito"
                                                value="{{ old('distrito') }}" required>
                                                @if ($errors->has('distrito'))
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $errors->first('distrito') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label for="simpatizante" class="form-control-label">Simpatizante<span class="text-danger ml-2">*</span></label>
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
                                                <select class="form-control location-data"
                                                        id="gestion" name="gestion"
                                                        require>
                                                    <option value="S">Seleccionar</option>

                                                    @foreach ($gestiones as $gestion)
                                                        <option value="{{ $gestion->id }}">{{ $gestion->nombre }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Municipio<span class="text-danger ml-2">*</span></label>
                                                <select class="form-control location-data"
                                                        id="city" name="city"
                                                        onchange="SepomexObject.getColony('tramites', this.value);"
                                                        disabled require>
                                                </select>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="col-lg-3 form-control-label">Fecha inicial</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon addon-secondary">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control datepicker" placeholder="Select value">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="col-lg-3 form-control-label">Fecha final</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon addon-secondary">
                                                            <i class="la la-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control datepicker" placeholder="Select value">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-title mt-5 mb-5">
                                            <h4>Billing Information</h4>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Exp Month<span class="text-danger ml-2">*</span></label>
                                                <select name="exp-month" class="custom-select form-control">
                                                    <option value="">Select</option>
                                                    <option value="01">01</option>
                                                    <option value="02">02</option>
                                                    <option value="03">03</option>
                                                    <option value="04">04</option>
                                                    <option value="05">05</option>
                                                    <option value="06" selected>06</option>
                                                    <option value="07">07</option>
                                                    <option value="08">08</option>
                                                    <option value="09">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 mb-3">
                                                <label class="form-control-label">Exp Year<span class="text-danger ml-2">*</span></label>
                                                <select name="exp-month" class="custom-select form-control">
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023" selected>2023</option>
                                                    <option value="2024">2024</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label class="form-control-label">CVV<span class="text-danger ml-2">*</span></label>
                                                <input type="email" value="651" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <div class="col-xl-12">
                                                <div class="styled-checkbox">
                                                    <input type="checkbox" name="savecard" id="check-card">
                                                    <label for="check-card">Save this card</label>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard text-right">
                                            <li class="previous d-inline-block">
                                                <a href="javascript:;" class="btn btn-secondary ripple">Previous</a>
                                            </li>
                                            <li class="next d-inline-block">
                                                <a href="javascript:;" class="btn btn-gradient-01">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="section-title mt-5 mb-5">
                                            <h4>Confirmation</h4>
                                        </div>
                                        <div id="accordion-icon-right" class="accordion">
                                            <div class="widget has-shadow">
                                                <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne" aria-expanded="true">
                                                    <div class="card-title w-100">1. Client Informations</div>
                                                </a>
                                                <div id="IconRightCollapseOne" class="card-body collapse show" data-parent="#accordion-icon-right">
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Name</div>
                                                        <div class="col-sm-8 form-control-plaintext">David Green</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Email</div>
                                                        <div class="col-sm-8 form-control-plaintext">dgreen@elisyam.com</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Phone</div>
                                                        <div class="col-sm-8 form-control-plaintext">+00 987 654 32</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Occupation</div>
                                                        <div class="col-sm-8 form-control-plaintext">UX Designer</div>
                                                    </div>
                                                </div>
                                                <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
                                                    <div class="card-title w-100">2. Address</div>
                                                </a>
                                                <div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Address</div>
                                                        <div class="col-sm-8 form-control-plaintext">123 Century Blvd</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Country</div>
                                                        <div class="col-sm-8 form-control-plaintext">Country</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">City</div>
                                                        <div class="col-sm-8 form-control-plaintext">Los Angeles</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">State</div>
                                                        <div class="col-sm-8 form-control-plaintext">CA</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Zip</div>
                                                        <div class="col-sm-8 form-control-plaintext">90045</div>
                                                    </div>
                                                </div>
                                                <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseThree">
                                                    <div class="card-title w-100">3. Account Details</div>
                                                </a>
                                                <div id="IconRightCollapseThree" class="card-body collapse" data-parent="#accordion-icon-right">
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Username</div>
                                                        <div class="col-sm-8 form-control-plaintext">Saerox</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Password</div>
                                                        <div class="col-sm-8 form-control-plaintext"><span class="la-2x">*********</span></div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Url</div>
                                                        <div class="col-sm-8 form-control-plaintext">http://mywebsite.com</div>
                                                    </div>
                                                </div>
                                                <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseFour">
                                                    <div class="card-title w-100">4. Billing Information</div>
                                                </a>
                                                <div id="IconRightCollapseFour" class="card-body collapse" data-parent="#accordion-icon-right">
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Card Number</div>
                                                        <div class="col-sm-8 form-control-plaintext">98765432145698547</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Exp Month</div>
                                                        <div class="col-sm-8 form-control-plaintext">06</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">Exp Year</div>
                                                        <div class="col-sm-8 form-control-plaintext">2023</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-sm-3 form-control-label d-flex align-items-center">CVV</div>
                                                        <div class="col-sm-8 form-control-plaintext">651</div>
                                                    </div>
                                                    <div class="form-group row mb-5">
                                                        <div class="col-xl-12">
                                                            <div class="styled-checkbox">
                                                                <input type="checkbox" name="checkbox" id="agree">
                                                                <label for="agree">I Accept <a href="#">Terms and Conditions</a></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard text-right">
                                            <li class="previous d-inline-block">
                                                <a href="javascript:void(0)" class="btn btn-secondary ripple">Previous</a>
                                            </li>
                                            <li class="next d-inline-block">
                                                <a href="javascript:void(0)" class="finish btn btn-gradient-01" data-toggle="modal">Finish</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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
</script>
@endsection
