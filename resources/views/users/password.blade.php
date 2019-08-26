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
                        <li class="breadcrumb-item active">Cambiar contraseña</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="widget has-shadow col-lg-6 col-md-12">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Cambiar contraseña</h4>
            </div>
            <div class="widget-body">
                <form class="form-horizontal" method="POST" action="{{ url('users/' . $user->id . '/password') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="my_password" class="col-lg-3 form-control-label">Contraseña actual</label>
                        <div class="col-9">
                            <input type="password"
                                class="form-control{{ $errors->has('my_password') ? ' is-invalid' : '' }}"
                                id="my_password" name="my_password" placeholder="Ingrese su contraseña actual" required>
                            @if ($errors->has('my_password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('my_password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="password" class="col-lg-3 form-control-label">Nueva contraseña</label>
                        <div class="col-9">
                            <input type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                                name="password" placeholder="Ingrese su nueva contraseña" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label for="password_confirmation" class="col-lg-3 form-control-label">Confirmar nueva contraseña</label>
                        <div class="col-9">
                            <input type="password"
                                class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                id="password_confirmation" name="password_confirmation"
                                placeholder="Confirme su nueva contraseña" required>
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

@section('pagescript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#phone').mask('00-00-00-00-00');
    });
</script>
@endsection

