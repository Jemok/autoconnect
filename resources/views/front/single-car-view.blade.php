@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="col-md-6" style="margin-top: 2%; margin-left: 6.5%; padding-top: 0.5%; padding-bottom: 0.5%; background-color: tomato;">
            <span style="color: white;">
              {{ $vehicle_detail->car_make->name }}
                -
                {{ $vehicle_detail->car_model->name }}
            </span>
        </div>

        <div class="row">
            <div class="col-md-6" style="margin-top: 2%; margin-left: 6.5%; padding-top: 0.5%; padding-bottom: 0.5%;">
                <div class="card">
                    <div class="card-header">
                        {{ $vehicle_detail->year }}

                        {{ $vehicle_detail->car_make->name }}
                        -
                        {{ $vehicle_detail->car_model->name }}

                        <div class="float-right">
                            Ksh {{ $vehicle_detail->price }}
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="card-group">
                            @foreach($vehicle_images as $vehicle_image)
                                <div class="col-md-4">
                                    <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_image->image_name) }}" alt="Card image cap">
                                </div>
                            @endforeach
                            {{--<div class="card">--}}
                            {{--<img class="card-img-top" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">--}}
                            {{--</div>--}}
                            {{--<div class="card">--}}
                            {{--<img class="card-img-top" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">--}}
                            {{--</div>--}}
                            {{--<div class="card">--}}
                            {{--<img class="card-img-top" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">--}}
                            {{--</div>--}}
                            {{--<div class="card">--}}
                            {{--<img class="card-img-top" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">--}}
                            {{--</div>--}}
                        </div>

                        {{--<div class="card-group" style="margin-top: 1%;">--}}
                        {{--<div class="card">--}}
                        {{--<img class="card-img-top" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">--}}
                        {{--</div>--}}
                        {{--<div class="card">--}}
                        {{--<img class="card-img-top" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        <h4 style="margin-top: 2%; font-weight: bold;">
                            Description
                        </h4>

                        <p>
                            {{ $vehicle_detail->description }}
                        </p>

                        <h4 style="margin-top: 2%; font-weight: bold;">
                            Overview
                        </h4>

                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Mileage (km)
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->mileage }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Condition
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->car_condition->description }}
                                </p>
                            </div>

                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Body Type
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->body_type->description }}
                                </p>
                            </div>

                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Colour
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->colour_type->description }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Drive Type
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    4 Wheel Drive
                                </p>
                            </div>
                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Fuel
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->fuel_type }}
                                </p>
                            </div>

                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Drive Setup
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    Righthand Drive
                                </p>
                            </div>

                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Transmission
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->transmission_type->description }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Duty Type
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->duty->description }}
                                </p>
                            </div>
                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Interior Type
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    Leather
                                </p>
                            </div>

                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Door Count
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    5
                                </p>
                            </div>

                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Engine Size
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->engine_size }}
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h5 style="font-weight: bold;">
                                    Year
                                </h5>
                                <p style="margin-top: 0; padding-top: 0;">
                                    {{ $vehicle_detail->year }}
                                </p>
                            </div>
                        </div>

                        <hr>

                        <h4 style="margin-top: 2%; font-weight: bold;">
                            Features
                        </h4>

                        <div class="row">
                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i>  Air Conditioning
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Air Bags
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i>  Alloy Wheels
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> AM/FM Radio
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Anti-Lock Brakes
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Armrests
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> CD Player
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Electric Windows
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Fog Lights
                                </p>
                            </div>
                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Power Steering
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Tinted Windows
                                </p>
                            </div>

                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Traction Control
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <p style="margin-top: 0; padding-top: 0;">
                                    <i class="fa fa-check text-success"></i> Wheel Locks
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 2%;">
                <div class="card">
                    <div class="card-header">
                        Contact Seller
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            For an immediate response call this seller
                        </p>

                        <button class="btn btn-block">
                            Call this seller
                        </button>

                        <hr>

                        <h4 class="card-title text-center">
                            REQUEST CALL BACK
                        </h4>


                        <form action="{{ route('storeAdStatusCallback', [$ad_status->id]) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputFirstName">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="inputFirstName" placeholder="Your First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputSecondName">Second Name</label>
                                    <input type="text" name="last_name" class="form-control" id="inputSecondName" placeholder="Your Second Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPhoneNumber">Phone Number (E.g 0712675071)</label>
                                <input type="text" class="form-control" name="phone_number" id="inputPhoneNumber" placeholder="E.g 0712675071">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="E.g example@gmail.com">
                            </div>
                            <button type="submit" class="btn btn-block">
                                Call Me Back
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    @endpush
@endsection
