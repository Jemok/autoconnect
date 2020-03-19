@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/login-design.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                @include('flash::message')
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Univas Autoconnect Sign In</h5>
                        <form class="form-signin" action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="form-label-group">
                                <input type="email" name="email" id="inputEmail" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Email address</label>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                            <hr class="my-4">
                            <a href="{{ route('password.request') }}" class="">Forgot password ?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
