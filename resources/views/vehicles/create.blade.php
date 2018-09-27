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
                                        <option></option>
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
                                        <option></option>
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
                                        <option></option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Colour Type*</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option></option>
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
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Air Conditioning
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Airbags
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Alloy Wheels
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            AM/FM Radio
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Anti-Lock Brakes
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Armrests
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Bullbar
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Bulletproof
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            CD Player
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Cup Holders
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Electric Mirrors
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Electric Windows
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            External Winch
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Fog Lights
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Front Fog Lamps
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Keyless Entry
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Power Steering
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Rear Camera
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Roof Rack
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Sidesteps
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Spoilers
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Spotlight
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Sunroof
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Thumbstart Ignition
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Tinted Windows
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Traction Control
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Turbo Charged
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Wheel Locks
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Winch
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Xenon Lights
                                        </label>
                                    </div>
                                </div>
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
