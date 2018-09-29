@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sell Your Vehicle</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Provide your car details

                        <form method="POST" action="{{ route('storeVehicle') }}">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col">
                                    <label for="car_make">Make*</label>
                                    <select name="car_make" id="car_make" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($car_makes as $car_make)
                                            <option value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="car_model">Model*</label>
                                    <select name="car_model" id="car_model" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($car_models as $car_model)
                                            <option  value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Series</label>
                                    <select name="car_series" id="inputState" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="year">Year*</label>
                                    <select name="year"  id="year" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @for($next_year; $next_year >= $start_year; $next_year--)
                                            <option value="{{ $next_year }}">{{ $next_year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="mileage">Mileage (km) *</label>
                                    <input type="text" name="mileage" id="mileage" class="form-control" placeholder="">
                                </div>
                                <div class="col">
                                    <label for="body_type">Body Type *</label>
                                    <select name="body_type" id="body_type" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($body_types as $body_type)
                                            <option value="{{ $body_type->slug }}">{{ $body_type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="transmission_type">Transmission Type *</label>
                                    <select name="transmission_type" id="transmission_type" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($transmission_types as $transmission_type)
                                            <option  value="{{ $transmission_type->slug }}">{{ $transmission_type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="condition">Condition *</label>
                                    <select name="car_condition" id="condition" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($car_conditions as $car_condition)
                                            <option value="{{ $car_condition->slug }}">{{ $car_condition->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="duty">Duty *</label>
                                    <select name="duty" id="duty" class="form-control">
                                        <option selected disabled="">Choose...</option>
                                        @foreach($duties as $duty)
                                            <option value="{{ $duty->slug }}">{{ $duty->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="price">Price (KSH) *</label>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" name="negotiable_price" type="checkbox" value="allowed" id="negotiable_price">
                                        <label class="form-check-label" for="negotiable_price">
                                            Price is negotiable
                                        </label>
                                    </div>
                                </div>
                            </div>

                            Add Features (improve ad quality)

                            <div class="form-row">
                                <div class="col">
                                    <label for="fuel_type">Fuel Type *</label>
                                    <select name="fuel_type" id="fuel_type" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($fuel_types as $fuel_type)
                                            <option  value="{{ $fuel_type->slug }}">{{ $fuel_type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="engine_size">Engine size (cc)</label>
                                    <input type="text" id="engine_size" name="engine_size" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="interior">Interior</label>
                                    <select name="interior" id="interior" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($interiors as $interior)
                                            <option value="{{ $interior->slug }}">{{ $interior->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="colour_type">Colour Type*</label>
                                    <select name="colour_type" id="colour_type" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($colour_types as $colour_type)
                                            <option  value="{{ $colour_type->slug }}">
                                                {{ $colour_type->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="description">Description </label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            Select your vehicle features


                            <div class="form-row">
                                @foreach($vehicle_features as $vehicle_feature)
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="{{ $vehicle_feature->slug }}" value="{{ $vehicle_feature->slug }}" id="{{ $vehicle_feature->slug }}">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ $vehicle_feature->description }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-danger float-left">Cancel</button>

                            <button type="submit" class="btn btn-success float-right">Next</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
