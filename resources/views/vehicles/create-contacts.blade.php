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
                                    @if(old('name') != null)
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Name" id="name">
                                    @elseif(old('name') == null && isset($vehicle_detail->vehicle_contact->name))
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $vehicle_detail->vehicle_contact->name }}" placeholder="Name" id="name">
                                    @else
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Name" id="name">
                                    @endif
                                    @if($errors->has('name'))
                                        <small id="nameHelp" class="form-text text-danger">
                                            {{ $errors->first('name') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="inputState">Email*</label>
                                    @if(old('email') != null)
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" id="email_old">
                                    @elseif(old('name') == null && isset($vehicle_detail->vehicle_contact->email))
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $vehicle_detail->vehicle_contact->email }}" placeholder="Email" id="email">
                                    @else
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Email" id="email_real">
                                    @endif

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
                                        <option value="254" selected>+254</option>
                                    </select>
                                    @if($errors->has('country_code'))
                                        <small id="countryCodeHelp" class="form-text text-danger">
                                            {{ $errors->first('country_code') }}
                                        </small>
                                    @endif
                                </div>
                                <div class="col">
                                    <label for="inputState">Phone Number*</label>
                                    @if(old('phone_number') != null)
                                        <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" value="{{ old('phone_number') }}" placeholder="Phone Number" id="phone_number_old">
                                    @elseif(old('phone_number') == null && isset($vehicle_detail->vehicle_contact->phone_number))
                                        <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" value="{{ $vehicle_detail->vehicle_contact->phone_number }}" placeholder="Phone Number" id="phone_number">
                                    @else
                                        <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" value="{{ old('phone_number') }}" placeholder="Phone Number" id="phone_number_real">
                                    @endif
                                    @if($errors->has('phone_number'))
                                        <small id="phoneNumberHelp" class="form-text text-danger">
                                            {{ $errors->first('phone_number') }}
                                        </small>
                                    @endif
                                    <small id="emailHelp" class="form-text text-muted">Use your Mpesa number, will be used to make payment in the next step</small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Area/City*</label>
                                    <select name="area" id="inputState" class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}">
                                        <option selected disabled>Choose...</option>
                                        @foreach($areas as $area)
                                            @if(old('area') == $area->id)
                                                <option selected="selected" value="{{ $area->id }}">{{ $area->name }}</option>
                                            @elseif(!empty($vehicle_detail->vehicle_contact->area_id))
                                                @if($vehicle_detail->vehicle_contact->area_id == $area->id)
                                                    <option selected value="{{ $vehicle_detail->vehicle_contact->area_id }}">{{ $area->name  }}</option>
                                                @else
                                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                @endif
                                            @else
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endif
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
