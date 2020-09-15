@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row mx-auto" style="padding-left: 11%;">


            <div class="col-md-8">
                <h1 style="margin-top: 2%; font-weight: bold;">
                   You are viewing cars from : {{ $user_profile->business_name }}
                </h1>

                <div class="col-md-4">
                    @if($user_profile != false)
                        @if($user_profile->user_picture != 'null')
                            <a href="{{ route('indexDealerProfile', [$user_profile->user_id]) }}">
                                <img  src="{{ asset('storage/images/dealers/'.$user_profile->user_picture) }}" class="img-thumbnail" width="20%" alt="...">
                            </a>
                        @endif
                    @endif
                </div>
                <h6>
                    @if($user_verification != false)
                        @if($user_verification->verification_status == 'verified')
                            <i class="fa fa-check alert-success"></i> <span class="alert-success">Verified Seller </span><i class="fa fa-certificate alert-success"></i>
                        @endif
                    @endif
                </h6>
            </div>
        </div>


        <div class="col-md-10" style="margin-top: 1%; margin-left: 11.5%; padding-top: 0.5%; padding-bottom: 0.5%;">
            <div class="row">
                <div class="col-md-12 row" style="padding-left: 0px;">
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
    </div>
@endsection
