@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}" xmlns="http://www.w3.org/1999/html">
@endsection
@section('content')
    <form method="get" action="{{ route('carSearchResults') }}">
        <div class="" style="background-image: url({{ asset('images/auto-range.jpg') }}); height: 550px; margin-top: 0; padding-top: 5%;">
            <div class="row col-md-12">
                <div class="card card-signin col-md-4" style="height: 90%; margin-left: 2.5%;">
                    <div class="card-body">
                        <h1 class="card-title">
                            Find a car on sale
                        </h1>
                        <div class="form-group">
                            <label for="carMake">Make</label>
                            <select name="carMake" class="form-control" id="car_make">
                                <option value="any_make" selected>Any Make</option>
                                @foreach($car_makes as $car_make)
                                    <option value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="carModel">Model</label>
                            <select name="carModel" class="form-control" id="car_model">
                                <option value="any_model" selected>Any Model</option>
                                @foreach($car_models as $car_model)
                                    <option value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="yearFrom">Year</label>
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

                            <div>
                                <p class="text-center">
                                    <a class="btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Show more search options
                                    </a>
                                </p>
                            </div>

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

    <div class="container-fluid">
        <div style="padding: 2%;">
            <h1 class="text-center mb-3">Featured Cars</h1>
        </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner row w-100 mx-auto">
                <div class="carousel-item col-md-4 active">
                    <a href="{{ route('singleCarView') }}">
                        <div class="card" style="overflow-y: hidden;">
                            <div style="overflow: hidden; height: 180px;">
                                <a href="{{ route('singleCarView') }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/car-1.jpeg') }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    Chevrolet Captiva
                                </h4>
                                <p class="card-text">KES 2,400,000</p>
                                <p class="card-text">
                                    <i class="fa fa-map-marker"></i>
                                    <small class="text-muted">
                                        Nairobi
                                    </small>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="carousel-item col-md-4">
                    <a href="{{ route('singleCarView') }}">
                        <div class="card" style="overflow-y: hidden;">
                            <div style="overflow: hidden; height: 180px;">
                                <a href="{{ route('singleCarView') }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/car-2.jpeg') }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Volkswagen Tiguan</h4>
                                <p class="card-text">KES 1,900,000</p>
                                <p class="card-text">
                                    <i class="fa fa-map-marker"></i>
                                    <small class="text-muted">Nairobi</small>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="carousel-item col-md-4">
                    <a href="{{ route('singleCarView') }}">
                        <div class="card" style="overflow-y: hidden;">
                            <div style="overflow: hidden; height: 180px;">
                                <a href="{{ route('singleCarView') }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/car-3.jpeg') }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Jeep</h4>
                                <p class="card-text">KES 4,500,000</p>
                                <p class="card-text">
                                    <i class="fa fa-map-marker"></i>
                                    <small class="text-muted">Nairobi</small>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="carousel-item col-md-4">
                    <a href="{{ route('singleCarView') }}">
                        <div class="card">
                            <div style="overflow: hidden; height: 180px;">
                                <a href="{{ route('singleCarView') }}">
                                    <img class="card-img-top img-fluid" src="{{ asset('images/car-4.jpeg') }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Mitsubishi Lancer</h4>
                                <p class="card-text">KES 2,500,000</p>
                                <p class="card-text">
                                    <i class="fa fa-map-marker"></i>
                                    <small class="text-muted">Nairobi</small>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div style="padding: 2%;">
        <h1 class="text-center mb-3">
            Vehicle Types
        </h1>

        <div class="col-md-12 row">
            <div class="card col-md-3"  style="width: 12rem;">
                <div class="card-body">
                    <img class="card-img-top img-fluid" src="{{ asset('images/car.png') }}" alt="Card image cap">
                    <h5 class="card-title text-center">Cars</h5>
                </div>
            </div>

            <div class="card col-md-3"  style="width: 12rem;">
                <div class="card-body">
                    <img class="card-img-top img-fluid" src="{{ asset('images/bike.png') }}" alt="Card image cap">
                    <h5 class="card-title text-center">Motorbikes</h5>
                </div>
            </div>

            <div class="card col-md-3"  style="width: 12rem;">
                <div class="card-body">
                    <img class="card-img-top img-fluid" src="{{ asset('images/trucks.png') }}" alt="Card image cap">
                    <h5 class="card-title">Trucks & Trailers</h5>
                </div>
            </div>

            <div class="card col-md-3"  style="width: 12rem;">
                <div class="card-body">
                    <img class="card-img-top img-fluid" src="{{ asset('images/bus.png') }}" alt="Card image cap">
                    <h5 class="card-title">Vans & Buses</h5>
                </div>
            </div>
        </div>
    </div>

    <div style="padding: 2%;">
        <h1 class="text-center mb-3">
            Popular Brands
        </h1>

        <div class="col-md-12 row">
            <div class="col-md-6 text-center">
                <ul class="list-group">
                    <li class="list-group-item">Audi</li>
                    <li class="list-group-item">Toyota</li>
                    <li class="list-group-item">Nissan</li>
                    <li class="list-group-item">Subaru</li>
                    <li class="list-group-item">Honda</li>
                    <li class="list-group-item">Land Rover</li>
                </ul>
            </div>

            <div class="col-md-6 text-center">
                <ul class="list-group">
                    <li class="list-group-item">Mitsubishi</li>
                    <li class="list-group-item">Mercedes Benz</li>
                    <li class="list-group-item">Mazda</li>
                    <li class="list-group-item">Volkswagen</li>
                    <li class="list-group-item">BMW</li>
                    <li class="list-group-item">Isuzu</li>
                </ul>
            </div>
        </div>


        <div class="col-md-12 center-block" style="padding: 2%;">
            <button class="btn btn-block mx-auto" style="width: 40%; color: white; background-color: tomato; font-weight: bold;">
                View All Brands
            </button>
        </div>
    </div>

    <div style="padding: 1%;">
        <h1 class="text-center mb-3">
            Locations
        </h1>

        <div class="col-md-12 row">
            <div class="col-md-6 text-center">
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Nairobi
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Kisumu
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Thika
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Mombasa
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Nakuru
                    </li>
                </ul>
            </div>

            <div class="col-md-6 text-center">
                <ul class="list-group">
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Eldoret
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Malindi
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Nyeri
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Ruiru
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-map-marker"></i>
                        Westlands
                    </li>
                </ul>
            </div>
        </div>
    </div>

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
                                Privacy Statement
                            </a>
                        </li>
                        <li class="">
                            <a href="" style="color: black;">
                                Terms and Conditions
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
                                News Letter
                            </a>
                        </li>
                        <li class="">
                            <a href="" style="color: black;">
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p class="text-center">
            &copy; 2018 Univas Auto Connect
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

                        model.append("<option selected disabled>Choose...</option>");

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
