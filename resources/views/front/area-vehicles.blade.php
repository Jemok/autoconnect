@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endsection
@section('content')
    <div class="container-fluid">

        <div class="col-md-10 mx-auto" style="margin-top: 1%; margin-left: 6.5%; padding-top: 0.5%; padding-bottom: 0.5%;">


            <h4>
                 <span style="color: black;">
              You are viewing Vehicles in : {{ $area->name }}
            </span>
            </h4>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    @foreach($vehicles as $vehicle)
                        @if($carSearchRepository->checkIfAdIsOnline($vehicle->vehicle_detail))
                            <a href="{{ route('singleCarView', $vehicle->vehicle_detail->id) }}" style="text-decoration: none;">
                                <div class="card" style="margin-bottom: 1%;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <?php
                                                $vehicle_front_image = getVehicleFrontImage($vehicle->vehicle_detail->id)
                                                ?>
                                                <img class="card-img-top"  src="{{ asset('storage/images/cars/'.$vehicle_front_image) }}" alt="Card image cap">
                                            </div>

                                            <div class="col-md-4">

                                                <?php
                                                $user_verification = $userVerificationRepository->checkIfUserIsVerified($vehicle->vehicle_detail)
                                                ?>

                                                <h6 style="color: black;">
                                                    {{ $vehicle->vehicle_detail->car_make->name }} - {{ $vehicle->vehicle_detail->car_model->name }} {{ $vehicle->vehicle_detail->year }}
                                                </h6>
                                                <h6>
                                                    @if($user_verification != false)
                                                        <i class="fa fa-check"></i> Verified Seller <i class="fa fa-certificate"></i>
                                                    @endif
                                                </h6>
                                                <p style="color: darkgray; margin-top: 0; padding-top: 0;">
                                                    {{ $vehicle->vehicle_detail->fuel_type }} - {{ $vehicle->vehicle_detail->transmission_type->name }}
                                                </p>

                                                <div >
                                                    <?php
                                                    $user_profile = $carSearchRepository->returnAdProfile($vehicle->vehicle_detail)
                                                    ?>

                                                    @if($user_profile != false)
                                                        <img  src="{{ asset('storage/images/dealers/'.$user_profile->user_picture) }}" class="img-thumbnail" width="20%" alt="...">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <h4 style="color: black;">
                                                    KSH {{ number_format($vehicle->vehicle_detail->price, 2) }}
                                                </h4>
                                                <p style="color: darkgray; margin-top: 0; padding-top: 0;">
                                                    Negotiation : {{ strtoupper($vehicle->vehicle_detail->negotiable_price) }}
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

                                                <div>
                                                    <button class="btn background-nav btn-block">
                                                        Show Contacts
                                                    </button>
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
