@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row bs-wizard wizard-second-div">
                    <div class="col bs-wizard-step">
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
                        <a href="#" class="bs-wizard-dot"></a>
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
                        <div class="progress" ><div class="progress-bar" style="background-color: black;"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step disabled"><!-- complete -->
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
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
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
                        <div class="card-header background-nav" style="font-weight: bold;">
                            Sell Your Vehicle
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            Provide your car details below :

                            <form method="POST" action="{{ route('updateUserSingleImportVehicle', [$vehicleDetail->id]) }}">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col">
                                        <label for="car_make" style="font-weight: bold;">Make*</label>
                                        <select name="car_make" id="car_make" class="form-control {{ $errors->has('car_make') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose a Make</option>
                                            @foreach($car_makes as $car_make)
                                                @if(old('car_make') == $car_make->slug)
                                                    <option selected value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                                @else
                                                    @if($vehicleDetail->car_make_id == $car_make->id)
                                                        <option value="{{ $vehicleDetail->car_make->slug }}" selected>{{ $vehicleDetail->car_make->name }}</option>
                                                    @else
                                                        <option value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('car_make'))
                                            <small id="carMakeHelp" class="form-text text-danger">
                                                {{ $errors->first('car_make') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="car_model" style="font-weight: bold;">Model*</label>
                                        <select name="car_model" id="car_model" class="form-control {{ $errors->has('car_model') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose a Model</option>
                                            @foreach($car_models as $car_model)
                                                @if(old('car_model') == $car_model->slug)
                                                    <option selected value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                                @else
                                                    @if($vehicleDetail->car_model_id == $car_model->id)
                                                        <option value="{{ $vehicleDetail->car_model->slug }}" selected>{{ $vehicleDetail->car_model->name }}</option>
                                                    @else
                                                        <option value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('car_model'))
                                            <small id="carModelHelp" class="form-text text-danger">
                                                {{ $errors->first('car_model') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="car_series" style="font-weight: bold;">Series</label>
                                        <select name="car_series" id="car_series" class="form-control">
                                            <option selected disabled>Choose a Series</option>
                                            {{--<option></option>--}}
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="year" style="font-weight: bold;">Year*</label>
                                        <select name="year"  id="year" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" required>
                                            <option selected disabled>Choose...</option>
                                            @for($next_year; $next_year >= $start_year; $next_year--)
                                                @if(old('year') == $next_year)
                                                    <option selected value="{{ $next_year }}">{{ $next_year }}</option>
                                                @else
                                                    @if($vehicleDetail->year == $next_year)
                                                        <option value="{{ $next_year }}" selected>{{ $next_year }}</option>
                                                    @else
                                                        <option value="{{ $next_year }}">{{ $next_year }}</option>
                                                    @endif
                                                @endif
                                            @endfor
                                        </select>
                                        @if($errors->has('year'))
                                            <small id="yearHelp" class="form-text text-danger">
                                                {{ $errors->first('year') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="mileage" style="font-weight: bold;">Mileage (km) *</label>
                                        <input type="number" name="mileage" id="mileage" class="form-control {{ $errors->has('mileage') ? 'is-invalid' : '' }}" value="{{ old('mileage') != null ? old('mileage') : (int) $vehicleDetail->mileage }}" placeholder="">
                                        @if ($errors->has('mileage'))
                                            <small id="mileage" class="form-text text-danger">
                                                {{ $errors->first('mileage') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="body_type" style="font-weight: bold;">Body Type *</label>
                                        <select name="body_type" id="body_type" class="form-control {{ $errors->has('body_type') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose...</option>
                                            @foreach($body_types as $body_type)
                                                @if(old('body_type') == $body_type->slug)
                                                    <option selected value="{{ $body_type->slug }}">{{ $body_type->description }}</option>
                                                @else
                                                    @if($vehicleDetail->body_type_id == $body_type->id)
                                                        <option value="{{ $vehicleDetail->body_type->slug }}" selected>{{ $vehicleDetail->body_type->description }}</option>
                                                    @else
                                                        <option value="{{ $body_type->slug }}">{{ $body_type->description }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('body_type'))
                                            <small id="bodyTypeHelp" class="form-text text-danger">
                                                {{ $errors->first('body_type') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="transmission_type" style="font-weight: bold;">Transmission Type *</label>
                                        <select name="transmission_type" id="transmission_type" class="form-control {{ $errors->has('transmission_type') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose...</option>
                                            @foreach($transmission_types as $transmission_type)
                                                @if(old('transmission_type') == $transmission_type->slug)
                                                    <option selected value="{{ $transmission_type->slug }}">{{ $transmission_type->description }}</option>
                                                @else
                                                    @if($vehicleDetail->transmission_type_id == $transmission_type->id)
                                                        <option  value="{{ $vehicleDetail->transmission_type->slug }}" selected>{{ $vehicleDetail->transmission_type->description }}</option>
                                                    @else
                                                        <option  value="{{ $transmission_type->slug }}">{{ $transmission_type->description }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('transmission_type'))
                                            <small id="transmissionTypeHelp" class="form-text text-danger">
                                                {{ $errors->first('transmission_type') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="condition" style="font-weight: bold;">Condition *</label>
                                        <select name="car_condition" id="condition" class="form-control {{ $errors->has('car_condition') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose...</option>
                                            @foreach($car_conditions as $car_condition)
                                                @if(old('car_condition') == $car_condition->slug)
                                                    <option selected value="{{ $car_condition->slug }}">{{ $car_condition->description }}</option>
                                                @else
                                                    @if($vehicleDetail->car_condition_id == $car_condition->id)
                                                        <option value="{{ $vehicleDetail->car_condition->slug }}" selected>{{ $vehicleDetail->car_condition->description }}</option>
                                                    @else
                                                        <option value="{{ $car_condition->slug }}">{{ $car_condition->description }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('car_condition'))
                                            <small id="carConditionHelp" class="form-text text-danger">
                                                {{ $errors->first('car_condition') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="duty" style="font-weight: bold;">Duty *</label>
                                        <select name="duty" id="duty" class="form-control {{ $errors->has('duty') ? 'is-invalid' : '' }}">
                                            <option selected disabled="">Choose...</option>
                                            @foreach($duties as $duty)
                                                @if(old('duty') == $duty->slug)
                                                    <option selected value="{{ $duty->slug }}">{{ $duty->description }}</option>
                                                @else
                                                    @if($vehicleDetail->duty_id == $duty->id)
                                                        <option value="{{ $vehicleDetail->duty->slug }}" selected>{{ $vehicleDetail->duty->description }}</option>
                                                    @else
                                                        <option value="{{ $duty->slug }}">{{ $duty->description }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('duty'))
                                            <small id="dutyHelp" class="form-text text-danger">
                                                {{ $errors->first('duty') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="price" style="font-weight: bold;">Price (KSH) *</label>
                                        <input type="number" name="price" id="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') != null ? old('price') : (int) $vehicleDetail->price }}" placeholder="">
                                        @if($errors->has('duty'))
                                            <small id="priceHelp" class="form-text text-danger">
                                                {{ $errors->first('price') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input {{ $errors->has('negotiable_price') ? 'is-invalid' : '' }}" name="negotiable_price" type="checkbox" value="allowed" id="negotiable_price" {{ $vehicleDetail->negotiable_price == 'allowed' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="negotiable_price" style="font-weight: bold;">
                                                Price is negotiable
                                            </label>
                                            @if($errors->has('negotiable_price'))
                                                <small id="negotiablePriceHelp" class="form-text text-danger">
                                                    {{ $errors->first('negotiable_price') }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <span style="font-weight: bold;">
                                    Add Features (improve ad quality)
                                </span>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="fuel_type" style="font-weight: bold;">Fuel Type</label>
                                        <select name="fuel_type" id="fuel_type" class="form-control {{ $errors->has('fuel_type') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose...</option>
                                            @foreach($fuel_types as $fuel_type)
                                                @if(old('fuel_type') == $duty->slug)
                                                    <option selected value="{{ $fuel_type->slug }}">{{ $fuel_type->description }}</option>
                                                @else
                                                    @if($vehicleDetail->fuel_type == $fuel_type->slug)
                                                        <option value="{{ $vehicleDetail->fuel_type }}" selected>{{ $vehicleDetail->fuel_type }}</option>
                                                    @else
                                                        <option value="{{ $fuel_type->slug }}">{{ $fuel_type->description }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('fuel_type'))
                                            <small id="fuelTypeHelp" class="form-text text-danger">
                                                {{ $errors->first('fuel_type') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="engine_size" style="font-weight: bold;">Engine size (cc)</label>
                                        <input type="text" id="engine_size" name="engine_size" class="form-control {{ $errors->has('engine_size') ? 'is-invalid' : '' }}" value="{{ old('engine_size') != null ? old('engine_size') : $vehicleDetail->engine_size }}" placeholder="">
                                        @if($errors->has('engine_size'))
                                            <small id="engineSizeHelp" class="form-text text-danger">
                                                {{ $errors->first('engine_size') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="interior" style="font-weight: bold;">Interior</label>
                                        <select name="interior" id="interior" class="form-control {{ $errors->has('interior') ? 'is-invalid' : '' }}">
                                            {{--<option selected disabled>Choose...</option>--}}
                                            @foreach($interiors as $interior)
                                                @if(old('interior') == $interior->slug)
                                                    <option selected value="{{ $interior->slug }}">{{ $interior->description }}</option>
                                                @else
                                                    @if($vehicleDetail->interior == $interior->slug)
                                                        <option value="{{ $vehicleDetail->interior }}" selected>{{ $vehicleDetail->interior }}</option>
                                                    @else
                                                        <option value="{{ $interior->slug }}">{{ $interior->description }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('interior'))
                                            <small id="interiorHelp" class="form-text text-danger">
                                                {{ $errors->first('interior') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="colour_type" style="font-weight: bold;">Colour Type*</label>
                                        <select name="colour_type" id="colour_type" class="form-control {{ $errors->has('colour_type') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose...</option>
                                            @foreach($colour_types as $colour_type)
                                                @if(old('colour_type') == $duty->slug)
                                                    <option selected  value="{{ $colour_type->slug }}">
                                                        {{ $colour_type->description }}
                                                    </option>
                                                @else
                                                    @if($vehicleDetail->colour_type_id == $colour_type->id)
                                                        <option value="{{ $vehicleDetail->colour_type->slug }}" selected>
                                                            {{ $vehicleDetail->colour_type->description }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $colour_type->slug }}">
                                                            {{ $colour_type->description }}
                                                        </option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('colour_type'))
                                            <small id="colourTypeHelp" class="form-text text-danger">
                                                {{ $errors->first('colour_type') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="drive_type" style="font-weight: bold;">Drive Type</label>
                                        <select name="drive_type" id="drive_type" class="form-control {{ $errors->has('drive_type') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose...</option>
                                            @foreach($drive_types as $drive_type)
                                                @if(old('drive_type') == $drive_type->slug)
                                                    <option selected  value="{{ $drive_type->slug }}">
                                                        {{ $drive_type->description }}
                                                    </option>
                                                @else
                                                    @if($vehicleDetail->drive_type == $drive_type->slug)
                                                        <option selected value="{{ $drive_type->slug }}">{{ $drive_type->description }}</option>
                                                    @else
                                                        <option value="{{ $drive_type->slug }}">{{ $drive_type->description }}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('drive_type'))
                                            <small id="driveTypeHelp" class="form-text text-danger">
                                                {{ $errors->first('drive_type') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="col">
                                        <label for="colour_type" style="font-weight: bold;">Drive Setup*</label>
                                        <select name="drive_setup" id="drive_setup" class="form-control {{ $errors->has('drive_setup') ? 'is-invalid' : '' }}">
                                            <option selected disabled>Choose...</option>
                                            @foreach($drive_setups as $drive_setup)
                                                @if(old('drive_setup') == $drive_setup->slug)
                                                    <option selected  value="{{ $drive_setup->slug }}">
                                                        {{ $drive_setup->description }}
                                                    </option>
                                                @else
                                                    @if($vehicleDetail->drive_setup == $drive_setup->slug)
                                                        <option selected  value="{{ $drive_setup->slug }}">
                                                            {{ $drive_setup->description }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $drive_setup->slug }}">
                                                            {{ $drive_setup->description }}
                                                        </option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('drive_setup'))
                                            <small id="driveSetUpHelp" class="form-text text-danger">
                                                {{ $errors->first('drive_setup') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="description" style="font-weight: bold;">Description </label>
                                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="3">{{ old('description') != null ? old('description') : $vehicleDetail->description  }}</textarea>
                                        @if($errors->has('description'))
                                            <small id="descriptionHelp" class="form-text text-danger">
                                                {{ $errors->first('description') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>

                                <span style="font-weight: bold;">
                                    Select your vehicle features
                                </span>

                                <div class="form-row">
                                    @foreach($vehicle_features as $vehicle_feature)
                                        <div class="form-group col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" {{ checkIfCarFeatureInArray($vehicle_feature->slug, $selected_vehicle_features_array)  ?  "checked" : "" }} name="{{ $vehicle_feature->slug }}" value="{{ $vehicle_feature->slug }}" id="{{ $vehicle_feature->slug }}">
                                                <label class="form-check-label" for="gridCheck" style="font-weight: bold;">
                                                    {{ $vehicle_feature->description }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <button type="submit" class="btn btn-success btn-lg float-right">
                                    <i class="fa fa-check"></i>
                                    Save and Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#flash-overlay-modal').modal();

            jQuery(document).ready(function($){
                $('#car_make').change(function(){
                    $.get("{{ url('/api/dropdown')}}",
                        { option: $(this).val() },
                        function(data) {
                            var model = $('#car_model');
                            model.empty();

                            model.append("<option selected disabled>Choose a Model</option>");

                            $.each(data, function(index, element) {
                                model.append("<option value='"+ element.slug +"'>" + element.name + "</option>");
                            });
                        }
                    );
                });


                $('#car_model').change(function(){
                    $.get("{{ url('/api/dropdown-series')}}",
                        { option: $(this).val() },
                        function(data) {
                            var model = $('#car_series');
                            model.empty();

                            model.append("<option selected disabled>Choose a Series</option>");

                            $.each(data, function(index, element) {
                                model.append("<option value='"+ element.slug +"'>" + element.name + "</option>");
                            });
                        }
                    );
                });
            });
        </script>
    @endpush
@endsection
