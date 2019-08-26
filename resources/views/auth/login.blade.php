@extends('layouts.auth')

@section('content')
<div class="container-fluid no-padding h-100">
        <div class="row flex-row h-100 bg-white">
            <!-- Begin Left Content -->
            <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                <div class="elisyam-bg background-01">
                    <div class="elisyam-overlay overlay-01"></div>
                    <div class="authentication-col-content mx-auto">
                        <h1 class="gradient-text-01">
                            Bienvenido a ADRLABS
                        </h1>
                        <span class="description">
                            Sistema de gestión y control de tramites gubernamentales.
                        </span>
                    </div>
                </div>
            </div>
            <!-- End Left Content -->
            <!-- Begin Right Content -->
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                <!-- Begin Form -->
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="javascript:void(0)">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <h3>Iniciar sesión</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="group material-input">
                            <input type="email" id="email" name="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="email">Correo electrónico</label>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="group material-input">
                            <input id="password" name="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="password">Contraseña</label>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col text-left">
                                <div class="styled-checkbox">
                                    <input type="checkbox" name="checkbox" id="remeber">
                                    <label for="remeber">Recordarme</label>
                                </div>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button type="submit" class="btn btn-lg btn-gradient-01">
                                Entrar
                            </button>
                        </div>

                    </form>
                </div>
                <!-- End Form -->
            </div>
            <!-- End Right Content -->
        </div>
        <!-- End Row -->
    </div>
@endsection

@section('js')
@if (session('status'))
    <script type="text/javascript">
        $(document).ready(function(){
            $("#modal-form-errors-auth").modal();
        });
</script>
@endif
@endsection
