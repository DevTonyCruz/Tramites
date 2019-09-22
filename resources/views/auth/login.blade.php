@extends('layouts.auth')

@section('content')
<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
            <div class="elisyam-bg background-01" style="background-image: url('{{ asset($img_system) }}'); ">
                @php
                $default = 'rgb(0,0,0)';
                $gradient = 'linear-gradient(135deg,rgba(46,52,81,.4) 0%,rgba(52,40,104,.95) 100%)';

                //Return default if no color_system provided
                if(!empty($color_system)){
                    //Sanitize $color_system if "#" is provided
                    if ($color_system[0] == '#' ) {
                        $color_system = substr( $color_system, 1 );
                    }

                    //Check if color_system has 6 or 3 characters and get values
                    if (strlen($color_system) == 6) {
                        $hex = array( $color_system[0] . $color_system[1], $color_system[2] . $color_system[3], $color_system[4] . $color_system[5] );

                        //Convert hexadec to rgb
                        $rgb = array_map('hexdec', $hex);

                        //Check if opacity is set(rgba or rgb)
                        $opacity = 0.75;
                        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
                        $gradient = 'linear-gradient(135deg,rgba(46,52,81,.4) 0%, ' . $output . ' 100%)';
                    } elseif ( strlen( $color_system ) == 3 ) {
                        $hex = array( $color_system[0] . $color_system[0], $color_system[1] . $color_system[1], $color_system[2] . $color_system[2] );

                        //Convert hexadec to rgb
                        $rgb = array_map('hexdec', $hex);

                        //Check if opacity is set(rgba or rgb)
                        $opacity = 0.95;
                        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
                        $gradient = 'linear-gradient(135deg,rgba(46,52,81,.4) 0%, ' . $output . ' 100%)';
                    }
                    
                }
                @endphp
                <div class="elisyam-overlay" style="background: {{ $gradient }}"></div>
                <div class="authentication-col-content mx-auto">
                    <h1 class="gradient-text-01">
                        Bienvenido a {{ $name_system }}
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
                        <img src="{{ asset( $logo_system ) }}" alt="logo">
                    </a>
                </div>
                <h3>Iniciar sesión</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="group material-input">
                        <input type="email" id="email" name="email"
                            class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required
                            autofocus>
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
                        <input id="password" name="password" type="password"
                            class="{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}"
                            required>
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