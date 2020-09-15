@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endsection
@section('content')
    <div class="container-fluid">

        <div class="col-md-10 mx-auto" style="margin-top: 1%;  padding-top: 0.5%; padding-bottom: 0.5%;">

            @if($car_make != 'any_make')
                <h4>
                 <span style="color: black;">
              {{ strtoupper($car_make) }} {{ strtoupper($car_model) }} for Sale in Kenya
            </span>
                </h4>
            @else
                <h4>
                 <span style="color: black;">
             We found  {{ $vehicles->count() }} results
            </span>
                </h4>
            @endif

            <hr>

            <div class="row">
                <div class="col-md-12">
                    @foreach($vehicles as $vehicle)
                        @if($carSearchRepository->checkIfAdIsOnline($vehicle))
                            <div class="card" style="margin-bottom: 1%;">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <a href="{{ route('singleCarView', $vehicle->id) }}" style="text-decoration: none;">

                                                <?php
                                                $vehicle_front_image = getVehicleFrontImage($vehicle->id)
                                                ?>
                                                <img class="card-img-top"  src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}"  alt="Card image cap">
                                            </a>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="{{ route('singleCarView', $vehicle->id) }}" style="text-decoration: none;">



                                                <h4 style="color: black;">
                                                    {{ $vehicle->car_make->name }} - {{ $vehicle->car_model->name }} {{ $vehicle->year }}
                                                </h4>

                                                <h6 style="color: black;">
                                                    Posted :  {{ $vehicle->created_at->diffForHumans() }}
                                                </h6>

                                                <?php
                                                $user_verification = $userVerificationRepository->checkIfUserIsVerified($vehicle)
                                                ?>

                                                <h6>
                                                    @if($user_verification != false)
                                                        <i class="fa fa-check alert-success"></i>
                                                    <span class="alert-success">
                                                                                                              Verified Seller
                                                    </span>
                                                        <i class="fa fa-certificate alert-success"></i>
                                                    @endif
                                                </h6>

                                                <p style="margin-top: 0; padding-top: 0;">
                                                    {{ $vehicle->fuel_type }} - {{ $vehicle->transmission_type->name }}
                                                </p>

                                                <div>
                                                    <?php
                                                    $user_profile = $carSearchRepository->returnAdProfile($vehicle)
                                                    ?>

                                                    @if($user_profile != false)
                                                        <a href="{{ route('indexDealerProfile', [$user_profile->user_id]) }}">
                                                            @if($user_profile->user_picture != 'null')
                                                            <img  src="{{ asset('storage/images/dealers/'.$user_profile->user_picture) }}" class="img-thumbnail" width="20%" alt="...">
                                                            @endif
                                                            <h6 style="margin-top: 2%; font-weight: bold;">
                                                                {{ $user_profile->business_name }}
                                                            </h6>
                                                        </a>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="{{ route('singleCarView', $vehicle->id) }}" style="text-decoration: none;">

                                                <h4 style="color: black;">
                                                    KSH {{ number_format($vehicle->price, 2) }}
                                                </h4>
                                                <p style="margin-top: 0; padding-top: 0;">
                                                    Negotiation : {{ strtoupper($vehicle->negotiable_price) }}
                                                </p>

                                                <div>
                                                    <button class="btn btn-block" style="background-color: black;">
                                                        <span style="color: white; font-weight: bold;">
                                                            <i class="fa fa-phone"></i>Show Contact
                                                        </span>
                                                    </button>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
