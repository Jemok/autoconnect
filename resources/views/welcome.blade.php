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
                                {{--<i class="fa fa-caret-down float-right"></i>--}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8">

                    </div>
                </div>

                <div style="padding-top: 5%;" class="d-none d-md-block d-lg-block d-xl-block">
                    <h5 class="text-left">
                        <span style="font-weight: bold;">
                          Featured Ads
                        </span>
                    </h5>

                    <div class="col-md-12 row" style="padding-left: 0px;" >
                        @foreach($featured_cars as $featured_car)
                            <?php

                            if($featured_car->type == 'bulk'){

                                $vehicle_front_image = getBulkVehicleFrontImage($featured_car->bulk_ad->user_bulk_import_id);

                            }else{
                                $vehicle_front_image = getVehicleFrontImage($featured_car->vehicle_detail->id);
                            }
                            ?>
                            <div class="card col-md-4"  style="width: 12rem; border: none;">
                                @if($featured_car->type == 'bulk')
                                    <a href="{{ route('singleCarView', $featured_car->bulk_ad->vehicle_detail_id) }}">
                                        <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                    </a>
                                @else
                                    <a href="{{ route('singleCarView', $featured_car->vehicle_detail_id) }}">
                                        <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
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
                                        </a>
                                        <h6 style="color: tomato;">Price : {{ $featured_car->bulk_ad->vehicle_detail->price }}</h6>
                                    @else
                                        <div style="padding-top: 3%;">
                                            <a href="{{ route('singleCarView', $featured_car->vehicle_detail->id) }}">
                                                <h6 style="color: black; font-size: 12px; font-weight: bold;">
                                                    {{ $featured_car->vehicle_detail->car_make->name }}
                                                    {{ $featured_car->vehicle_detail->car_model->name }}
                                                    {{ $featured_car->vehicle_detail->year }}
                                                </h6>
                                            </a>
                                            <h6 style="color: black; font-weight: bold;">KES {{ number_format($featured_car->vehicle_detail->price, 2) }}</h6>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-12 row d-none d-md-block d-lg-block d-xl-block" style="padding-left: 0px;" >
                        @foreach($featured_cars as $featured_car)
                            <?php

                            if($featured_car->type == 'bulk'){

                                $vehicle_front_image = getBulkVehicleFrontImage($featured_car->bulk_ad->user_bulk_import_id);

                            }else{
                                $vehicle_front_image = getVehicleFrontImage($featured_car->vehicle_detail->id);
                            }
                            ?>
                            <div class="card col-md-4"  style="width: 12rem; border: none;">
                                @if($featured_car->type == 'bulk')
                                    <a href="{{ route('singleCarView', $featured_car->bulk_ad->vehicle_detail_id) }}">
                                        <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                    </a>
                                @else
                                    <a href="{{ route('singleCarView', $featured_car->vehicle_detail_id) }}">
                                        <img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
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
                                        </a>
                                        <h6 style="color: tomato;">Price : {{ $featured_car->bulk_ad->vehicle_detail->price }}</h6>
                                    @else
                                        <div style="padding-top: 3%;">
                                            <a href="{{ route('singleCarView', $featured_car->vehicle_detail->id) }}">
                                                <h6 style="color: black; font-size: 12px; font-weight: bold;">
                                                    {{ $featured_car->vehicle_detail->car_make->name }}
                                                    {{ $featured_car->vehicle_detail->car_model->name }}
                                                    {{ $featured_car->vehicle_detail->year }}
                                                </h6>
                                            </a>
                                            <h6 style="color: black; font-weight: bold;">KES {{ number_format($featured_car->vehicle_detail->price, 2) }}</h6>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div style="padding-top: 5%;">

                    <div class="col-md-12 row">
                        <div class="card col-md-3 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem;">
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

                        <div class="card col-md-3 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem;">
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

                        <div class="card col-md-3 d-none d-md-block d-lg-block d-xl-block"  style="width: 12rem;">
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
                </div>


                <h5 class="text-left" style="padding-top: 5%">
                        <span style="font-weight: bold;">
                         More Featured Ads
                        </span>
                </h5>

                <div class="col-md-12 row" style="padding-left: 0px; margin-top: 1%">
                    @foreach($featured_standard_cars as $featured_car)
                        <?php

                        if($featured_car->type == 'bulk'){

                            $vehicle_front_image = getBulkVehicleFrontImage($featured_car->bulk_ad->user_bulk_import_id);

                        }else{
                            $vehicle_front_image = getVehicleFrontImage($featured_car->vehicle_detail->id);
                        }
                        ?>
                        {{--<div class="card col-md-4"  style="width: 12rem; border: none;">--}}
                        <div class="col-md-6 col-lg-4 item" style="height: 250px; width: 210px; overflow: hidden; margin-bottom: 2%; border: solid lightgrey 1px;">
                            @if($featured_car->type == 'bulk')
                                <div class="row">
                                    <a class="lightbox" href="{{ route('singleCarView', $featured_car->bulk_ad->vehicle_detail_id) }}">
                                        {{--<p style="color: black;">--}}
                                        {{--{{ $vehicle_image->image_area }}--}}
                                        {{--</p>--}}
                                        <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" style="height: 150px;">
                                    </a>
                                </div>
                            @else
                                <div class="row">
                                    <a class="lightbox" href="{{ route('singleCarView', $featured_car->vehicle_detail_id) }}">
                                        {{--<p style="color: black;">--}}
                                        {{--{{ $vehicle_image->image_area }}--}}
                                        {{--</p>--}}
                                        <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" style="height: 150px;">
                                    </a>
                                </div>
                            @endif
                            <div class="card-footer" style="padding: 0; background-color: white;">
                                @if($featured_car->type == 'bulk')
                                    <a href="{{ route('singleCarView', $featured_car->bulk_ad->vehicle_detail_id) }}">
                                        <h6 style="color: tomato; font-weight: bold;">
                                            {{ $featured_car->bulk_ad->vehicle_detail->car_make->name }}
                                        </h6>
                                        <h6>
                                            {{ $featured_car->bulk_ad->vehicle_detail->car_model->name }}
                                            {{ $featured_car->bulk_ad->vehicle_detail->year }}
                                        </h6>
                                    </a>
                                    <h6 style="color: tomato; font-weight: bold;">Price : {{ $featured_car->bulk_ad->vehicle_detail->price }}</h6>
                                @else
                                    <div>
                                        <a href="{{ route('singleCarView', $featured_car->vehicle_detail->id) }}">
                                            <h6 style="color: black; font-size: 12px; font-weight: bold;">
                                                {{ $featured_car->vehicle_detail->car_make->name }}
                                            </h6>
                                            <h6>
                                                {{ $featured_car->vehicle_detail->car_model->name }}
                                                {{ $featured_car->vehicle_detail->year }}
                                            </h6>
                                        </a>
                                        <h6 style="color: black; font-weight: bold;">KES {{ number_format($featured_car->vehicle_detail->price, 2) }}</h6>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{--<div style="height: 200px; width: 200px; overflow: hidden;">--}}
                        {{--@if($featured_car->type == 'bulk')--}}
                        {{--<a href="{{ route('singleCarView', $featured_car->bulk_ad->vehicle_detail_id) }}">--}}
                        {{--<img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">--}}
                        {{--</a>--}}
                        {{--@else--}}
                        {{--<a href="{{ route('singleCarView', $featured_car->vehicle_detail_id) }}">--}}
                        {{--<img class="img-fluid" src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">--}}
                        {{--</a>--}}
                        {{--@endif--}}
                        {{--</div>--}}


                        {{--</div>--}}
                    @endforeach
                </div>

                <div style="padding-top: 2%;">
                    <div class="col-md-12 row">
                        {{--<div class="col-md-6 text-center">--}}
                        {{--<ul class="list-group">--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/audi.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=audi&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Audi--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/toyota.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=toyota&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Toyota--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/nissan.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=nissan&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Nissan--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/subaru.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=subaru&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Subaru--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/honda.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=honda&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Honda--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/landrover.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=landrover&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Land Rover--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-6 text-center">--}}
                        {{--<ul class="list-group">--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/mitsubishi.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=mitsubishi&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Mitsubishi--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/mercedes_benz.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=mercedes_benz&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Mercedes Benz--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/mazda.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=mazda&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Mazda--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/volkswagen.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=volkswagen&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Volkswagen--}}
                        {{--</span>--}}

                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/bmw.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=bmw&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--BMW--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<img src="{{ asset('images/car_logos/isuzu.png') }}" alt="">--}}
                        {{--<a href="{{ url('/car-search-results?carMake=isuzu&carModel=any_model') }}">--}}
                        {{--<span style="font-weight: bold;">--}}
                        {{--Isuzu--}}
                        {{--</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
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

                                            {{--<div>--}}
                                            {{--<p class="text-center">--}}
                                            {{--<a class="btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
                                            {{--Show more search options--}}
                                            {{--</a>--}}
                                            {{--</p>--}}
                                            {{--</div>--}}

                                            <button class="btn btn-block" style="background-color: tomato; color: white; font-weight: bold;" type="submit">Search Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-signin card-body">
                                            <h1 class="card-title">
                                                More Search Options
                                            </h1>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="minPrice">Min Price</label>
                                                    <select name="minPrice" class="form-control" id="minPrice">
                                                        <option value="min_price">Min Price</option>
                                                        <option value="100000">KES 100,000</option>
                                                        <option value="500000">KES 500,000</option>
                                                        <option value="700000">KES 700,000</option>
                                                        <option value="1000000">KES 1,000,000</option>
                                                        <option value="1500000">KES 1,500,000</option>
                                                        <option value="2000000">KES 2,000,000</option>
                                                        <option value="2500000">KES 2,500,000</option>
                                                        <option value="3000000">KES 3,000,000</option>
                                                        <option value="3500000">KES 3,500,000</option>
                                                        <option value="4000000">KES 4,000,000</option>
                                                        <option value="4500000">KES 4,500,000</option>
                                                        <option value="5000000">KES 5,000,000</option>
                                                        <option value="10000000">KES 10,000,000</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="maxPrice">Max Price</label>
                                                    <select name="maxPrice" class="form-control" id="maxPrice">
                                                        <option value="max_price" selected>Max Price</option>
                                                        <option value="100000">KES 100,000</option>
                                                        <option value="500000">KES 500,000</option>
                                                        <option value="700000">KES 700,000</option>
                                                        <option value="1000000">KES 1,000,000</option>
                                                        <option value="1500000">KES 1,500,000</option>
                                                        <option value="2000000">KES 2,000,000</option>
                                                        <option value="2500000">KES 2,500,000</option>
                                                        <option value="3000000">KES 3,000,000</option>
                                                        <option value="3500000">KES 3,500,000</option>
                                                        <option value="4000000">KES 4,000,000</option>
                                                        <option value="4500000">KES 4,500,000</option>
                                                        <option value="5000000">KES 5,000,000</option>
                                                        <option value="10000000">KES 10,000,000</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="keyword">Keyword</label>
                                                <input type="text" name="keyword" class="form-control" id="keyWord" aria-describedby="keyWordHelp" placeholder="Enter a key word">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="area">Locations</label>
                                                    <select name="location" class="form-control" id="location">
                                                        <option value="any_location">Any Location</option>
                                                        @foreach($areas as $area)
                                                            <option value="{{ $area->code }}">{{ $area->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="bodyType">Body Types</label>
                                                    <select name="bodyType" class="form-control" id="bodyType">
                                                        <option value="any_body_type">Any Body Type</option>
                                                        @foreach($body_types as $body_type)
                                                            <option value="{{ $body_type->slug }}">{{ $body_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="colourType">Colours</label>
                                                    <select name="colourType" class="form-control" id="colourType">
                                                        <option value="any_colour_type">Any Colour</option>
                                                        @foreach($colour_types as $colour_type)
                                                            <option value="{{ $colour_type->slug }}">{{ $colour_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="transmission_type">Transmission</label>
                                                    <select name="transmission_type" class="form-control" id="transmission_type">
                                                        <option value="any_transmission">Any Transmission</option>
                                                        @foreach($transmission_types as $transmission_type)
                                                            <option value="{{ $transmission_type->slug }}">{{ $transmission_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="carCondition">Conditions</label>
                                                    <select name="carCondition" class="form-control" id="carCondition">
                                                        <option value="any_condition">Any Condition</option>
                                                        @foreach($car_conditions as $car_condition)
                                                            <option value="{{ $car_condition->slug }}">{{ $car_condition->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="fuelType">Fuel Types</label>
                                                    <select name="fuelType" class="form-control" id="fuelType">
                                                        <option value="any_fuel_type">Any Fuel Type</option>
                                                        @foreach($fuel_types as $fuel_type)
                                                            <option value="{{ $fuel_type->slug }}">{{ $fuel_type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
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


    {{--<div class="container-fluid">--}}
    {{--<div style="padding: 2%;">--}}
    {{--<h1 class="text-center mb-3">Featured Cars</h1>--}}
    {{--</div>--}}
    {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
    {{--<div class="carousel-inner row w-100 mx-auto">--}}
    {{--<div class="carousel-item col-md-4 active">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<div class="card" style="overflow-y: hidden;">--}}
    {{--<div style="overflow: hidden; height: 180px;">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<img class="card-img-top img-fluid" src="{{ asset('images/car-1.jpeg') }}" alt="Card image cap">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="card-body">--}}
    {{--<h4 class="card-title">--}}
    {{--Chevrolet Captiva--}}
    {{--</h4>--}}
    {{--<p class="card-text">KES 2,400,000</p>--}}
    {{--<p class="card-text">--}}
    {{--<i class="fa fa-map-marker"></i>--}}
    {{--<small class="text-muted">--}}
    {{--Nairobi--}}
    {{--</small>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="carousel-item col-md-4">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<div class="card" style="overflow-y: hidden;">--}}
    {{--<div style="overflow: hidden; height: 180px;">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<img class="card-img-top img-fluid" src="{{ asset('images/car-2.jpeg') }}" alt="Card image cap">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="card-body">--}}
    {{--<h4 class="card-title">Volkswagen Tiguan</h4>--}}
    {{--<p class="card-text">KES 1,900,000</p>--}}
    {{--<p class="card-text">--}}
    {{--<i class="fa fa-map-marker"></i>--}}
    {{--<small class="text-muted">Nairobi</small>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="carousel-item col-md-4">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<div class="card" style="overflow-y: hidden;">--}}
    {{--<div style="overflow: hidden; height: 180px;">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<img class="card-img-top img-fluid" src="{{ asset('images/car-3.jpeg') }}" alt="Card image cap">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="card-body">--}}
    {{--<h4 class="card-title">Jeep</h4>--}}
    {{--<p class="card-text">KES 4,500,000</p>--}}
    {{--<p class="card-text">--}}
    {{--<i class="fa fa-map-marker"></i>--}}
    {{--<small class="text-muted">Nairobi</small>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="carousel-item col-md-4">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<div class="card">--}}
    {{--<div style="overflow: hidden; height: 180px;">--}}
    {{--<a href="{{ route('singleCarView') }}">--}}
    {{--<img class="card-img-top img-fluid" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--<div class="card-body">--}}
    {{--<h4 class="card-title">Mitsubishi Lancer</h4>--}}
    {{--<p class="card-text">KES 2,500,000</p>--}}
    {{--<p class="card-text">--}}
    {{--<i class="fa fa-map-marker"></i>--}}
    {{--<small class="text-muted">Nairobi</small>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">--}}
    {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
    {{--<span class="sr-only">Previous</span>--}}
    {{--</a>--}}
    {{--<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">--}}
    {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
    {{--<span class="sr-only">Next</span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    <hr>

    <footer class="footer">
        <div class="container">
            <div class="col-md-12 row">
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
    <script src="{{ asset('js/carousel.js') }}"></script>
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
