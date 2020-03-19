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
                        <h5 class="card-title text-center">Register as Dealer</h5>
                        <form class="form-signin" action="{{ route('register') }}" method="post">
                            @csrf

                            <div class="form-label-group">
                                <input type="text" name="name" id="inputName" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="E.g John Doe" required autofocus>
                                <label for="inputName">Name</label>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-label-group">
                                <input type="email" name="email" id="inputEmail" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="E.g example@gmail.com" required autofocus>
                                <label for="inputEmail">Email</label>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input id="phone_number" type="text" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required>

                                <label for="phone_number">Phone Number (E.g 0712345678)</label>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
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

                            <div class="form-label-group">
                                <input type="password" id="inputPasswordConfirmation" name="password_confirmation" class="form-control" placeholder="Password" required>
                                <label for="inputPasswordConfirmation">Repeat Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" name="termsAndConditions" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">
                                    Accept terms and conditions
                                </label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                            <hr class="my-4">
                            <a href="{{ route('login') }}" class="">Sign In</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
