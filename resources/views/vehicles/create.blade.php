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

                        <form>
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Make*</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($car_makes as $car_make)
                                            <option name="car_make" value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Model*</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($car_models as $car_model)
                                            <option name="car_model" value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Series</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Year*</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @for($next_year; $next_year >= $start_year; $next_year--)
                                            <option name="year" value="{{ $next_year }}">{{ $next_year }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Mileage (km) *</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="col">
                                    <label for="inputState">Body Type *</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($body_types as $body_type)
                                            <option name="body_type" value="{{ $body_type->slug }}">{{ $body_type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Transmission Type *</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($transmission_types as $transmission_type)
                                            <option name="transmission_type" value="{{ $transmission_type->slug }}">{{ $transmission_type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Condition *</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($car_conditions as $car_condition)
                                            <option name="car_condition" value="{{ $car_condition->slug }}">{{ $car_condition->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Duty *</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($duties as $duty)
                                            <option name="duty" value="{{ $duty->slug }}">{{ $duty->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Price (KSH) *</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Price is negotiable
                                        </label>
                                    </div>
                                </div>
                            </div>

                            Add Features (improve ad quality)

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Fuel Type *</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($fuel_types as $fuel_type)
                                            <option name="fuel_type" value="{{ $fuel_type->slug }}">{{ $fuel_type->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Engine size (cc)</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Interior</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($interiors as $interior)
                                            <option name="interior" value="{{ $interior->slug }}">{{ $interior->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Colour Type*</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach($colour_types as $colour_type)
                                            <option name="colour_type" value="{{ $colour_type->slug }}">
                                                {{ $colour_type->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="exampleFormControlTextarea1">Description </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                            Select your vehicle features


                            <div class="form-row">
                                @foreach($vehicle_features as $vehicle_feature)
                                    <div class="form-group col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                {{ $vehicle_feature->description }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </form>

                        <button class="btn btn-danger float-left">Cancel</button>

                        <a href="{{ route('createVehiclePictures') }}" class="btn btn-success float-right">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
