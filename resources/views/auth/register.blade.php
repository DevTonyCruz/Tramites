@extends('layouts.auth')

@section('content')

<div class="container-fluid no-padding h-100">
        <div class="row flex-row h-100 bg-white">
            <!-- Begin Left Content -->
            <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                <div class="elisyam-bg background-05">
                    <div class="elisyam-overlay overlay-04"></div>
                    <div class="authentication-col-content mx-auto">
                        <h1 class="gradient-text-01">
                            Be Elisyam!
                        </h1>
                        <span class="description">
                            Etiam consequat urna at magna bibendum, in tempor arcu fermentum vitae mi massa egestas.
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
                            <img src="assets/img/logo.png" alt="logo">
                        </a>
                    </div>
                    <h3>Create An Account</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="group material-input">
                            <input type="text" name="name" id="name" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Nombre</label>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="group material-input">
                            <input type="text" name="first_last_name" id="first_last_name" class="{{ $errors->has('first_last_name') ? ' is-invalid' : '' }}" value="{{ old('first_last_name') }}" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Apellido Paterno</label>

                            @if ($errors->has('first_last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="group material-input">
                            <input type="password" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Password</label>
                        </div>
                        <div class="group material-input">
                            <input type="password" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>Confirm Password</label>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col text-left">
                            <div class="styled-checkbox">
                                <input type="checkbox" name="checkbox" id="agree">
                                <label for="agree">I Accept <a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="sign-btn text-center">
                        <a href="javascript:void(0)" class="btn btn-lg btn-gradient-01">
                            Create an account
                        </a>
                    </div>
                    <div class="register">
                        Already have an account?
                        <br>
                        <a href="pages-login.html">Sign In</a>
                    </div>
                </div>
                <!-- End Form -->
            </div>
            <!-- End Right Content -->
        </div>
        <!-- End Row -->
    </div>
@endsection
