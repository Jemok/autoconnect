@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row bs-wizard wizard-second-div">
                    <div class="col bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">
                             <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Vehicle Details
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                   <strong>
                                Vehicle Details
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step disabled"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Vehicle Pictures
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                               <strong>
                                Vehicle Pictures
                            </strong>
                            </span>
                        </div>
                        <div class="progress" ><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Contact Details
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                     Contact Details
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col bs-wizard-step disabled"><!-- active -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                              Payment
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                Payment
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>
                </div>

                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header background-nav" style="font-weight: bold;">Your Contact Details</div>

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
                                        <label for="name" style="font-weight: bold;">Name*</label>
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
                                        <label for="inputState" style="font-weight: bold;">Email*</label>
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
                                        <label for="inputState" style="font-weight: bold;">Country Code*</label>
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
                                        <label for="inputState" style="font-weight: bold;">Phone Number*</label>
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
                                        <small id="emailHelp" class="form-text text-muted" style="font-weight: bold;">Use your Mpesa number, this will be used to make payment in the next step</small>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputState" style="font-weight: bold;">Area/City*</label>
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

                                <div style="padding-top: 2%;">
                                    <a href="{{ route('createVehiclePictures', $vehicleId) }}" class="btn btn-danger float-left">
                                        <i class="fa fa-arrow-left"></i>
                                        Previous
                                    </a>

                                    <button type="submit" class="btn btn-success float-right">
                                        <i class="fa fa-check"></i>
                                        Next
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    @endpush
@endsection
