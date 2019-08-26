@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Usuarios</h2>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="ti ti-user"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/users') }}">Usuarios</a></li>
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
                <form class="form-horizontal" method="POST" action="{{ url('users') }}">
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
                        <label for="first-last-name" class="col-lg-3 form-control-label">Apellido paterno</label>
                        <div class="col-lg-9">
                            <input type="text" id="first-last-name" name="first_last_name"
                                    class="form-control{{ $errors->has('first_last_name') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su apellido paterno"
                                    value="{{ old('first_last_name') }}" required>

                            @if ($errors->has('first_last_name'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('first_last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="second-last-name" class="col-lg-3 form-control-label">Apellido materno</label>
                        <div class="col-lg-9">
                            <input type="text" id="second-last-name" name="second_last_name"
                                    class="form-control{{ $errors->has('second_last_name') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su apellido materno"
                                    value="{{ old('second_last_name') }}" required>
                            @if ($errors->has('second_last_name'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('second_last_name') }}</strong>
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
                        <label for="second-last-name" class="col-lg-3 form-control-label">Roles</label>
                        <div class="col-lg-9">
                            <select class="form-control{{ $errors->has('rol_id') ? ' has-error' : '' }}"
                                    id="rol_id" name="rol_id"
                                    require>
                                <option value="S">Seleccionar</option>

                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}" {{ (old('rol_id') == $rol->id) ? 'selected' : '' }}>{{ $rol->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('rol_id'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('rol_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="password" class="col-lg-3 form-control-label">Contraseña</label>
                        <div class="col-lg-9">
                            <input type="password" id="password" name="password"
                                    class="form-control{{ $errors->has('password') ? ' has-error' : '' }}"
                                    placeholder="Ingrese su contraseña"
                                    value="{{ old('password') }}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="password-confirm" class="col-lg-3 form-control-label">Confirmar contraseña</label>
                        <div class="col-lg-9">
                            <input type="password" id="password-confirm" name="password_confirmation"
                                    class="form-control"
                                    placeholder="Confirme su contraseña" required>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#phone').mask('00-00-00-00-00');
    });
</script>
@endsection
