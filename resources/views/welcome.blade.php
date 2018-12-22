@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endsection
@section('content')
    <div class="col-md-12 row" style="background-image: url({{ asset('images/auto-range.jpg') }}); height: 550px; margin-top: 0; padding-top: 5%;">
        <div class="card col-md-4" style="height: 90%; margin-left: 2.5%;">
            <div class="card-body">
                <h1 class="card-title">
                    Find a car on sale
                </h1>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Make</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Model</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Year</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">To</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div>
                            <p class="text-center">
                                <a class="btn-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Show more search options
                                </a>
                            </p>
                        </div>

                        <a href="{{ route('carSearchResults') }}" class="btn btn-block" style="background-color: tomato; color: white; font-weight: bold;">Search Now</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <h1 class="card-title">
                        More Search Options
                    </h1>

                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keyword</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a key word">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Locations</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Body Types</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Colours</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Transmission</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Conditions</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Fuel Types</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <a href="{{ route('carSearchResults') }}" class="btn btn-block" style="background-color: tomato; color: white; font-weight: bold;">Search Now</a>

                    </form>


                </div>
            </div>
        </div>
    </div>
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
    @endpush
@endsection
