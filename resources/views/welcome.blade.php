@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}" xmlns="http://www.w3.org/1999/html">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 d-none d-md-block d-lg-block d-xl-block" style="margin-top: 0; padding-top: 2%;">
                <div class="card">
                    <div class="card-header background-nav">
                        <i class="fa fa-filter"></i>
                        <span style="font-weight: bold;">
                            Search By Make
                        </span>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($car_makes as $car_make)
                            <li class="list-group-item">
                                <img src="{{ asset('images/car_logos/'.$car_make->image_name) }}" alt="">
                                <a href="{{ url('/car-search-results?carMake='.$car_make->slug.'&carModel=any_model') }}">
                                   <span style="font-weight: bold;">
                                       {{ $car_make->description }}
                                   </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div style="padding-top: 5%;">
                    <div class="col-md-12 d-sm-none d-md-none d-lg-none d-xl-none">
                        <p>
                            <a class="btn btn-primary btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-search"></i>
                                <span style="font-weight: bold;">
                                            Find a car on sale
                                            </span>
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample" style="padding-left: 0; padding-right: 0;">
                            <div class="col-md-12" style="padding-left: 0; padding-right: 0;">
                                <form method="get" action="{{ route('carSearchResults') }}">
                                    <div class="" style="height: 450px; margin-top: 0; padding-left: 6%; padding-right: 0;">
                                        <div class="row col-md-12" style="padding-left: 0; padding-right: 0;">
                                            <div class="card card-signin col-md-12" style="height: 90%; padding-left: 0; padding-right: 0;">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        <i class="fa fa-search"></i>
                                                        <span style="font-weight: bold;">
                                            Find a car on sale
                                            </span>
                                                    </h6>
                                                    <div class="form-group">
                                                        <label for="carMake">
                                                <span style="font-weight: bold;">
                                                    Make
                                                </span>
                                                        </label>
                                                        <select name="carMake" class="form-control" id="car_make">
                                                            <option value="any_make" selected>Any Make</option>
                                                            @foreach($car_makes as $car_make)
                                                                <option value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="carModel">
                                                <span style="font-weight: bold;">
                                                Model
                                                </span>
                                                        </label>
                                                        <select name="carModel" class="form-control" id="car_model">
                                                            <option value="any_model" selected>Any Model</option>
                                                            @foreach($car_models as $car_model)
                                                                <option value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="yearFrom">
                                                    <span style="font-weight: bold;">
                                                    Year
                                                    </span>
                                                            </label>
                                                            <select name="yearFrom" class="form-control" id="yearFrom">
                                                                <option value="year_from">From</option>
                                                                @for($next_year; $next_year >= $start_year; $next_year--)
                                                                    <option value="{{ $next_year }}">{{ $next_year }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="yearTo">To</label>
                                                            <?php
                                                            $start_year = 2004;
                                                            $next_year = 2019;
                                                            ?>
                                                            <select name="yearTo" class="form-control" id="yearTo">
                                                                <option value="year_to">To</option>
                                                                @for($next_year; $next_year >= $start_year; $next_year--)
                                                                    <option value="{{ $next_year }}">{{ $next_year }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>


                                                        <button class="btn btn-block" style="background-color: tomato; color: white; font-weight: bold;" type="submit">Search Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <h5 class="text-center d-sm-none d-md-none d-lg-none d-xl-none">
                        <span style="font-weight: bold;">
                          Featured Ads
                        </span>
                    </h5>

                    <h5 class="text-left d-none d-sm-block d-md-block d-lg-block d-xl-block" >
                        <span style="font-weight: bold;">
                          Featured Ads
                        </span>
                    </h5>


                    <div class="col-md-12 text-center row d-md-none d-lg-none d-xl-none mx-auto" style="padding-left: 0px;">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($featured_cars as $featured_car)
                                    <?php

                                    if($featured_car->type == 'bulk'){

                                        $vehicle_front_image = getBulkVehicleFrontImage($featured_car->bulk_ad->user_bulk_import_id);

                                    }else{
                                        $vehicle_front_image = getVehicleFrontImage($featured_car->vehicle_detail->id);
                                    }
                                    ?>
                                    <div class="carousel-item {{ $featured_car->vehicle_detail_id == $active_car_id ? 'active' : '' }}">
                                        <div class="card col-md-4 mx-auto text-center" style="height: 270px; width: 100%; overflow: hidden; margin-bottom: 2%;">
                                            @if($featured_car->type == 'bulk')
                                                <a href="{{ route('singleCarView', $featured_car->bulk_ad->vehicle_detail_id) }}">
                                                    <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap" style="max-width: 100%; height: auto;">
                                                </a>
                                            @else
                                                <a href="{{ route('singleCarView', $featured_car->vehicle_detail_id) }}">
                                                    <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap" style="max-width: 100%; height: auto;">
                                                </a>
                                            @endif

                                            <div class="card-body" style="padding: 0; margin: 0;">
                                            </div>
                                            <div class="card-footer" style="padding: 0; background-color: white;">
                                                @if($featured_car->type == 'bulk')
                                                    <a href="{{ route('singleCarView', $featured_car->bulk_ad->vehicle_detail_id) }}">
                                                        <h6 style="color: tomato;">
                                                            {{ $featured_car->bulk_ad->vehicle_detail->car_make->name }}
                                                        </h6>
                                                        <h6>
                                                            Car Id : {{ $featured_car->bulk_ad->vehicle_detail->unique_identifier }}
                                                        </h6>
                                                    </a>
                                                    <h6 style="color: tomato;">Price : {{ $featured_car->bulk_ad->vehicle_detail->price }}</h6>
                                                @else
                                                    <div style="padding-top: 3%;">
                                                        <a href="{{ route('singleCarView', $featured_car->vehicle_detail->id) }}">
                                                            <h6 style="color: tomato">
                                                                {{ $featured_car->vehicle_detail->car_make->name }}
                                                                {{ $featured_car->vehicle_detail->car_model->name }}
                                                                {{ $featured_car->vehicle_detail->year }}
                                                            </h6>
                                                            <h6>
                                                                Car Id : {{ $featured_car->vehicle_detail->unique_identifier }}
                                                            </h6>
                                                        </a>
                                                        <h6 style="color: tomato;">KES {{ number_format($featured_car->vehicle_detail->price, 2) }}</h6>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="height: 50%;  border-radius: 60px;">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="height: 50%;  border-radius: 60px;">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-12 row" style="padding-left: 0px;" >
                        <div id="carouselExampleOneControls" class="carousel slide col-md-12" data-ride="carousel">
                            <div class="carousel-inner col-md-12">

                                @if($featured_cars->count() > 0)
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @for($i = 0; $i<6; $i++)

                                                @if(isset($featured_cars[$i]))
                                                    <?php

                                                    if($featured_cars[$i]->type == 'bulk'){

                                                        $vehicle_front_image = getBulkVehicleFrontImage($featured_cars[$i]->bulk_ad->user_bulk_import_id);

                                                    }else{
                                                        $vehicle_front_image = getVehicleFrontImage($featured_cars[$i]->vehicle_detail->id);
                                                    }

                                                    ?>
                                                    <div class="card col-md-4 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem; border: none;">
                                                        @if($featured_cars[$i]->type == 'bulk')
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @else
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @endif

                                                        <div class="card-body" style="padding: 0; margin: 0;">
                                                        </div>
                                                        <div class="card-footer" style="padding: 0; background-color: white;">
                                                            @if($featured_cars[$i]->type == 'bulk')
                                                                <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}" class="text-center">
                                                                    <h6 style="color: tomato;">
                                                                        {{ $featured_cars[$i]->bulk_ad->vehicle_detail->car_make->name }}
                                                                    </h6>
                                                                    <h6>
                                                                        Car Id : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->unique_identifier }}
                                                                    </h6>
                                                                </a>
                                                                <h6 style="color: tomato;" class="text-center">Price : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->price }}</h6>
                                                            @else
                                                                <div style="padding-top: 3%;">
                                                                    <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail->id) }}">
                                                                        <h6>
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_make->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_model->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->year }}
                                                                        </h6>
                                                                        <h6>
                                                                            Car Id : {{ $featured_cars[$i]->vehicle_detail->unique_identifier }}
                                                                        </h6>
                                                                    </a>
                                                                    <h6>KES {{ number_format($featured_cars[$i]->vehicle_detail->price, 2) }}</h6>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                @endif

                                @if($featured_cars->count() > 6)
                                    <div class="carousel-item">
                                        <div class="row">
                                            @for($i=6; $i<12; $i++)

                                                @if(isset($featured_cars[$i]))

                                                    <?php

                                                    if($featured_cars[$i]->type == 'bulk'){

                                                        $vehicle_front_image = getBulkVehicleFrontImage($featured_cars[$i]->bulk_ad->user_bulk_import_id);

                                                    }else{
                                                        $vehicle_front_image = getVehicleFrontImage($featured_cars[$i]->vehicle_detail->id);
                                                    }

                                                    ?>

                                                    <div class="card col-md-4 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem; border: none;">
                                                        @if($featured_cars[$i]->type == 'bulk')
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @else
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @endif

                                                        <div class="card-body" style="padding: 0; margin: 0;">
                                                        </div>
                                                        <div class="card-footer" style="padding: 0; background-color: white;">
                                                            @if($featured_cars[$i]->type == 'bulk')
                                                                <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}" class="text-center">
                                                                    <h6 style="color: tomato;">
                                                                        {{ $featured_cars[$i]->bulk_ad->vehicle_detail->car_make->name }}
                                                                    </h6>
                                                                    <h6>
                                                                        Car Id : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->unique_identifier }}
                                                                    </h6>
                                                                </a>
                                                                <h6 style="color: tomato;" class="text-center">Price : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->price }}</h6>
                                                            @else
                                                                <div style="padding-top: 3%;">
                                                                    <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail->id) }}">
                                                                        <h6>
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_make->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_model->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->year }}
                                                                        </h6>
                                                                        <h6>
                                                                            Car Id : {{ $featured_cars[$i]->vehicle_detail->unique_identifier }}
                                                                        </h6>
                                                                    </a>
                                                                    <h6>KES {{ number_format($featured_cars[$i]->vehicle_detail->price, 2) }}</h6>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                @endif

                                @if($featured_cars->count() > 12)
                                    <div class="carousel-item">
                                        <div class="row">
                                            @for($i=12; $i<18; $i++)

                                                @if(isset($featured_cars[$i]))

                                                    <?php

                                                    if($featured_cars[$i]->type == 'bulk'){

                                                        $vehicle_front_image = getBulkVehicleFrontImage($featured_cars[$i]->bulk_ad->user_bulk_import_id);

                                                    }else{
                                                        $vehicle_front_image = getVehicleFrontImage($featured_cars[$i]->vehicle_detail->id);
                                                    }

                                                    ?>

                                                    <div class="card col-md-4 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem; border: none;">
                                                        @if($featured_cars[$i]->type == 'bulk')
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @else
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @endif

                                                        <div class="card-body" style="padding: 0; margin: 0;">
                                                        </div>
                                                        <div class="card-footer" style="padding: 0; background-color: white;">
                                                            @if($featured_cars[$i]->type == 'bulk')
                                                                <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}" class="text-center">
                                                                    <h6 style="color: tomato;">
                                                                        {{ $featured_cars[$i]->bulk_ad->vehicle_detail->car_make->name }}
                                                                    </h6>
                                                                    <h6>
                                                                        Car Id : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->unique_identifier }}
                                                                    </h6>
                                                                </a>
                                                                <h6 style="color: tomato;" class="text-center">Price : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->price }}</h6>
                                                            @else
                                                                <div style="padding-top: 3%;">
                                                                    <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail->id) }}">
                                                                        <h6>
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_make->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_model->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->year }}
                                                                        </h6>
                                                                        <h6>
                                                                            Car Id : {{ $featured_cars[$i]->vehicle_detail->unique_identifier }}
                                                                        </h6>
                                                                    </a>
                                                                    <h6>KES {{ number_format($featured_cars[$i]->vehicle_detail->price, 2) }}</h6>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                @endif

                                @if($featured_cars->count() > 18)
                                    <div class="carousel-item">
                                        <div class="row">
                                            @for($i=18; $i<24; $i++)

                                                @if(isset($featured_cars[$i]))

                                                    <?php

                                                    if($featured_cars[$i]->type == 'bulk'){

                                                        $vehicle_front_image = getBulkVehicleFrontImage($featured_cars[$i]->bulk_ad->user_bulk_import_id);

                                                    }else{
                                                        $vehicle_front_image = getVehicleFrontImage($featured_cars[$i]->vehicle_detail->id);
                                                    }

                                                    ?>

                                                    <div class="card col-md-4 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem; border: none;">
                                                        @if($featured_cars[$i]->type == 'bulk')
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @else
                                                            <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail_id) }}">
                                                                <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                                            </a>
                                                        @endif

                                                        <div class="card-body" style="padding: 0; margin: 0;">
                                                        </div>
                                                        <div class="card-footer" style="padding: 0; background-color: white;">
                                                            @if($featured_cars[$i]->type == 'bulk')
                                                                <a href="{{ route('singleCarView', $featured_cars[$i]->bulk_ad->vehicle_detail_id) }}" class="text-center">
                                                                    <h6 style="color: tomato;">
                                                                        {{ $featured_cars[$i]->bulk_ad->vehicle_detail->car_make->name }}
                                                                    </h6>
                                                                    <h6>
                                                                        Car Id : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->unique_identifier }}
                                                                    </h6>
                                                                </a>
                                                                <h6 style="color: tomato;" class="text-center">Price : {{ $featured_cars[$i]->bulk_ad->vehicle_detail->price }}</h6>
                                                            @else
                                                                <div style="padding-top: 3%;">
                                                                    <a href="{{ route('singleCarView', $featured_cars[$i]->vehicle_detail->id) }}">
                                                                        <h6 style="font-size: 12px;">
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_make->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->car_model->name }}
                                                                            {{ $featured_cars[$i]->vehicle_detail->year }}
                                                                        </h6>
                                                                        <h6>
                                                                            Car Id : {{ $featured_cars[$i]->vehicle_detail->unique_identifier }}
                                                                        </h6>
                                                                    </a>
                                                                    <h6>
                                                                        KES {{ number_format($featured_cars[$i]->vehicle_detail->price, 2) }}
                                                                    </h6>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <a class="carousel-control-prev d-none d-md-block d-lg-block d-xl-block" href="#carouselExampleOneControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next d-none d-md-block d-lg-block d-xl-block" href="#carouselExampleOneControls" role="button" data-slide="next" >
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div style="padding-top: 5%;">
                    <div class="col-md-12 row">
                        <div class="card col-md-3 d-none d-sm-block d-md-block d-lg-block d-xl-block"  style="width: 12rem;">
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['cars']) }}">
                                    <img class="card-img-top" src="{{ asset('images/car-uni.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title text-center">
                                    <a href="{{ route('filterByCategory', ['cars']) }}">
                                    <span style="font-weight: bold;">
                                        Cars
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <div class="card col-md-3 d-none d-sm-block d-md-block d-lg-block d-xl-block"  style="width: 12rem;">
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['motorbikes']) }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/bike-uni.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title text-center">
                                    <a href="{{ route('filterByCategory', ['motorbikes']) }}">
                                    <span style="font-weight: bold;">
                                    Motorbikes
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <div class="card col-md-3 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem;">
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['trucks_and_trailers']) }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/truck.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title">
                                    <a href="{{ route('filterByCategory', ['trucks_and_trailers']) }}">
                                    <span style="font-weight: bold;">
                                    Trucks & Trailers
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <div class="card col-md-3 d-none d-sm-block d-md-block d-lg-block d-xl-block"  style="width: 12rem;">
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['vans_and_buses']) }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/van-uni1.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title">
                                    <a href="{{ route('filterByCategory', ['vans_and_buses']) }}">
                                    <span style="font-weight: bold;">
                                    Vans & Buses
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 row mx-auto" style="padding-left: 0px;">
                        <div class="card col-md-12 d-sm-none d-md-none d-lg-none d-xl-none" >
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['cars']) }}">
                                    <img class="card-img-top" src="{{ asset('images/car-uni.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title text-center">
                                    <a href="{{ route('filterByCategory', ['cars']) }}">
                                    <span style="font-weight: bold;">
                                        Cars
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <div class="card col-md-12 d-sm-none d-md-none d-lg-none d-xl-none">
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['motorbikes']) }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/bike-uni.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title text-center">
                                    <a href="{{ route('filterByCategory', ['motorbikes']) }}">
                                    <span style="font-weight: bold;">
                                    Motorbikes
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <div class="card col-md-12 d-sm-none d-md-none d-lg-none d-xl-none">
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['trucks_and_trailers']) }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/truck.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title text-center">
                                    <a href="{{ route('filterByCategory', ['trucks_and_trailers']) }}">
                                    <span style="font-weight: bold;">
                                    Trucks & Trailers
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <div class="card col-md-12 d-sm-none d-md-none d-lg-none d-xl-none">
                            <div class="card-body">
                                <a href="{{ route('filterByCategory', ['vans_and_buses']) }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/van-uni1.jpeg') }}" alt="Card image cap">
                                </a>
                                <h5 class="card-title text-center">
                                    <a href="{{ route('filterByCategory', ['vans_and_buses']) }}">
                                    <span style="font-weight: bold;">
                                    Vans & Buses
                                    </span>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-none d-sm-block d-md-block d-lg-block d-xl-block">
                <div class="col-md-12">
                    <form method="get" action="{{ route('carSearchResults') }}">
                        <div class="" style="height: 450px; margin-top: 0; padding-top: 11%;">
                            <div class="row col-md-12">
                                <div class="card card-signin col-md-12" style="height: 90%;">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <i class="fa fa-search"></i>
                                            <span style="font-weight: bold;">
                                            Find a car on sale
                                            </span>
                                        </h6>
                                        <div class="form-group">
                                            <label for="carMake">
                                                <span style="font-weight: bold;">
                                                    Make
                                                </span>
                                            </label>
                                            <select name="carMake" class="form-control" id="car_make">
                                                <option value="any_make" selected>Any Make</option>
                                                @foreach($car_makes as $car_make)
                                                    <option value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="carModel">
                                                <span style="font-weight: bold;">
                                                Model
                                                </span>
                                            </label>
                                            <select name="carModel" class="form-control" id="car_model">
                                                <option value="any_model" selected>Any Model</option>
                                                @foreach($car_models as $car_model)
                                                    <option value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="yearFrom">
                                                    <span style="font-weight: bold;">
                                                    Year
                                                    </span>
                                                </label>
                                                <select name="yearFrom" class="form-control" id="yearFrom">
                                                    <option value="year_from">From</option>
                                                    @for($next_year; $next_year >= $start_year; $next_year--)
                                                        <option value="{{ $next_year }}">{{ $next_year }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="yearTo">To</label>
                                                <?php
                                                $start_year = 2004;
                                                $next_year = 2019;
                                                ?>
                                                <select name="yearTo" class="form-control" id="yearTo">
                                                    <option value="year_to">To</option>
                                                    @for($next_year; $next_year >= $start_year; $next_year--)
                                                        <option value="{{ $next_year }}">{{ $next_year }}</option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <button class="btn btn-block" style="background-color: tomato; color: white; font-weight: bold;" type="submit">Search Now</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

                <h5 class="text-center">
                        <span style="font-weight: bold;">
                        Popular Brands
                        </span>
                </h5>


                <div class="col-md-12 text-center">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/audi.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=audi&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Audi
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/toyota.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=toyota&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Toyota
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/nissan.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=nissan&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Nissan
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/subaru.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=subaru&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Subaru
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/honda.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=honda&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Honda
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/landrover.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=landrover&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Land Rover
                                        </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-12 text-center">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/mitsubishi.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=mitsubishi&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Mitsubishi
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/mercedes_benz.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=mercedes_benz&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Mercedes Benz
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/mazda.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=mazda&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Mazda
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/volkswagen.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=volkswagen&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Volkswagen
                                        </span>

                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/bmw.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=bmw&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        BMW
                                        </span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('images/car_logos/isuzu.png') }}" alt="">
                            <a href="{{ url('/car-search-results?carMake=isuzu&carModel=any_model') }}">
                                        <span style="font-weight: bold;">
                                        Isuzu
                                        </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div style="padding-top: 3%;">
                    <h5 class="text-center">
                        Locations
                    </h5>

                    <div class="col-md-12 text-center">
                        <ul class="list-group">
                            @foreach($areas as $area)
                                <li class="list-group-item">
                                    <a href="{{ route('filterByLocation', [$area->id]) }}">
                                        <i class="fa fa-map-marker"></i>
                                        {{ $area->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-12 text-center">
                        <ul class="list-group">
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <hr>

    <footer class="footer">
        <div class="container mx-auto text-center">
            <div class="col-md-12 row text-center">
                <div class="col-md-3">
                    <ul style="color: black; list-style: none;">
                        <li class="">
                            <a href="" style="color: black;">
                                About Us
                            </a>
                        </li>
                        <li class="">
                            <a href="" style="color: black;">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <ul style="color: black; list-style: none;">
                        <li class="">
                            <a href="" style="color: black;">
                                Terms and Conditions
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ env('APP_URL').'sitemap.xml' }}" style="color: black;">
                                Site Map
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <ul style="color: black; list-style: none;">
                        <li class="">
                            <a href="" style="color: black;">
                                Facebook
                            </a>
                        </li>
                        <li class="">
                            <a href="" style="color: black;">
                                Twitter
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <ul style="color: black; list-style: none;">
                        <li class="">
                            <a href="" style="color: black;">
                                Instagram
                            </a>
                        </li>
                        <li class="">
                            <a href="" style="color: black;">
                                Youtube
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <p class="text-center">
            &copy; {{ \Carbon\Carbon::now()->year }} Univas Auto Connect
        </p>
    </footer>

    @push('scripts')
        <script>
            jQuery(document).ready(function($){
                $('#car_make').change(function(){
                    $.get("{{ url('/api/dropdown')}}",
                        { option: $(this).val() },
                        function(data) {
                            var model = $('#car_model');
                            model.empty();

                            model.append("<option selected value='any_model'>Choose...</option>");

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
