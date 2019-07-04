@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endsection
@section('content')
    <div class="container-fluid">

        <div class="col-md-10" style="margin-top: 1%; margin-left: 6.5%; padding-top: 0.5%; padding-bottom: 0.5%;">

            @if($car_make != 'any_make')
                <h4>
                 <span style="color: black;">
              {{ strtoupper($car_make) }} {{ strtoupper($car_model) }} for Sale in Kenya
            </span>
                </h4>
            @else
                <h4>
                 <span style="color: black;">
              Latest Vehicles for Sale in Kenya
            </span>
                </h4>
            @endif

            <hr>

            <div>
                {{ $vehicles->count() }} Results
                <div class="dropdown float-right">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Date Posted</a>
                        <a class="dropdown-item" href="#">Price (Low to High)</a>
                        <a class="dropdown-item" href="#">Price (High to Low)</a>
                        <a class="dropdown-item" href="#">Mileage</a>
                        <a class="dropdown-item" href="#">Year (New to Old)</a>
                        <a class="dropdown-item" href="#">Year (Old to New)</a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-filter"></i>  Filter
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">MAKE <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">MODEL <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">BODY TYPE <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">YEAR <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">PRICE <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">LOCATION <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">FUEL TYPE <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">TRANSMISSION <i class="fa fa-caret-down float-right"></i></li>
                            <li class="list-group-item">COLOUR <i class="fa fa-caret-down float-right"></i></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    @foreach($vehicles as $vehicle)
                        @if($carSearchRepository->checkIfAdIsOnline($vehicle))
                            <a href="{{ route('singleCarView', $vehicle->id) }}" style="text-decoration: none;">
                                <div class="card" style="margin-bottom: 1%;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php
                                                $vehicle_front_image = getVehicleFrontImage($vehicle->id)
                                                ?>
                                                <img class="card-img-top"  src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                            </div>
                                            <div class="col-md-4">
                                                <h4 style="color: black;">
                                                    {{ $vehicle->car_make->name }} - {{ $vehicle->car_model->name }}
                                                </h4>
                                                <p style="color: darkgray; margin-top: 0; padding-top: 0;">
                                                    {{ $vehicle->year }} - {{ $vehicle->fuel_type }} - {{ $vehicle->transmission_type->name }}
                                                </p>

                                            </div>
                                            <div class="col-md-4">
                                                <h4 style="color: black;">
                                                    KSH {{ number_format($vehicle->price, 2) }}
                                                </h4>
                                                <p style="color: darkgray; margin-top: 0; padding-top: 0;">
                                                    {{ strtoupper($vehicle->negotiable_price) }}
                                                </p>

                                                <div class="row col-md-12" style="margin-top: 10%;">
                                                    <div class="col-md-4">
                                                        <i class="fa fa-phone"></i>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <i class="fa fa-comment"></i>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                @if($vehicles->count())
                    <div class="offset-md-5">
                        {{$vehicles->render("pagination::bootstrap-4")}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
