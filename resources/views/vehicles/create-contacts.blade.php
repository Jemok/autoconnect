@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Contact Details</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('storeVehicleContacts', $vehicleId) }}">

                            {{ csrf_field() }}

                            <div class="form-row">
                                <div class="col">
                                    <label for="name">Name*</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" id="name">
                                    @if($errors->has('name'))
                                        <small id="nameHelp" class="form-text text-danger">
                                            {{ $errors->first('name') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="inputState">Email*</label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email">
                                    @if($errors->has('email'))
                                        <small id="emailHelp" class="form-text text-danger">
                                            {{ $errors->first('email') }}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Country Code*</label>
                                    <select name="country_code" id="inputState" class="form-control {{ $errors->has('country_code') ? 'is-invalid' : '' }}">
                                        <option selected disabled>Choose...</option>
                                        <option value="254">+254</option>
                                    </select>
                                    @if($errors->has('country_code'))
                                        <small id="countryCodeHelp" class="form-text text-danger">
                                            {{ $errors->first('country_code') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="inputState">Phone Number*</label>
                                    <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" placeholder="E.g 0712675071">
                                    @if($errors->has('phone_number'))
                                        <small id="phoneNumberHelp" class="form-text text-danger">
                                            {{ $errors->first('phone_number') }}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Area/City*</label>
                                    <select name="area" id="inputState" class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}">
                                        <option selected disabled>Choose...</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('area'))
                                        <small id="areHelp" class="form-text text-danger">
                                            {{ $errors->first('area') }}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <a href="{{ route('createVehiclePictures', $vehicleId) }}" class="btn btn-danger float-left">Previous</a>

                            <button type="submit" class="btn btn-success float-right">Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    @endpush
@endsection
