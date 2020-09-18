@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="col-md-8" style="margin-top: 2%; margin-left: 4.5%; padding-top: 0.5%; padding-bottom: 0.5%;">
            <h1>
                <span style="color: black;">
                            {{ $vehicle_detail->car_make->name }}
                     -
                {{ $vehicle_detail->car_model->name }}

                    {{ $vehicle_detail->year }}

                    :  Ksh {{ number_format($vehicle_detail->price, 0) }}
                </span>
            </h1>

            <h6>
                Vehicle ID : {{  $vehicle_detail->unique_identifier }}

            </h6>

            <div>
                <?php
                $user_profile = $carSearchRepository->returnAdProfile($vehicle_detail)
                ?>

                @if($user_profile != false)
                    <div class="col-md-4">
                        <a href="{{ route('indexDealerProfile', [$user_profile->user_id]) }}">
                            @if($user_profile->user_picture != 'null')
                                <img  src="{{ asset('storage/images/dealers/'.$user_profile->user_picture) }}" class="img-thumbnail" width="20%" alt="...">
                            @endif
                            <h6 style="margin-top: 2%; font-weight: bold;">
                                Seller : {{ $user_profile->business_name }}
                            </h6>
                        </a>
                    </div>
                @endif
            </div>

            <?php
            $user_verification = $userVerificationRepository->checkIfUserIsVerified($vehicle_detail)
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

            Posted : {{  $vehicle_detail->created_at->diffForHumans() }}

{{--            @if(isset($vehicle_detail->vehicle_contact->phone_number))--}}
{{--                <span>--}}
{{--                    {{ $vehicle_detail->vehicle_contact->phone_number }}--}}
{{--                </span>--}}
{{--            @endif--}}

            @if(isset($vehicle_detail->vehicle_contact->area_id))
                <span>
                   in {{ $vehicle_detail->vehicle_contact->area->name }}
                </span>
            @endif

        </div>

        <div class="row">
            <div class="col-md-5" style="margin-top: 2%; margin-left: 4.5%; padding-top: 0.5%; padding-bottom: 0.5%;">
                <div class="card">
                    <div class="card-header">
                        {{ $vehicle_detail->year }}

                        {{ $vehicle_detail->car_make->name }}
                        -
                        {{ $vehicle_detail->car_model->name }}

                        -
                        {{ $vehicle_detail->year }}

                        <div class="float-right">
                            Price :  Ksh {{ number_format($vehicle_detail->price, 0) }}
                        </div>

                    </div>
                    <section class="gallery-block grid-gallery">
                        <div class="card-body">
                            <p class="text-center">
                                Click on image to enlarge
                            </p>
                            <div class="card-group">
                                @foreach($vehicle_images as $vehicle_image)
                                    <div class="col-md-4">
                                        <a class="lightbox" href="{{ asset('storage/images/cars/'.$vehicle_image->image_name) }}">
                                            <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.$vehicle_image->image_name) }}" alt="Card image cap">
                                        </a>
                                    </div>
                                @endforeach
                            </div>

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
                                        @if($vehicle_detail->drive_type != null)
                                            @if($vehicle_detail->drive_type == 'right_hand_drive')
                                                Right Hand Drive
                                            @endif

                                            @if($vehicle_detail->drive_type == 'left_hand_drive')
                                                Left Hand Drive
                                            @endif
                                        @endif
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
                                        @if($vehicle_detail->drive_type != null)
                                            @if($vehicle_detail->drive_type == '4_wheel_drive')
                                                4 Wheel Drive
                                            @endif

                                            @if($vehicle_detail->drive_type == '2_wheel_drive')
                                                2 Wheel Drive
                                            @endif
                                        @endif
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
                                        @if($vehicle_detail->interior == 'leather')
                                            Leather
                                        @endif

                                        @if($vehicle_detail->interior == 'cloth')
                                            Cloth
                                        @endif

                                        @if($vehicle_detail->interior == 'other')
                                            Other
                                        @endif
                                    </p>
                                </div>

                                <div class="col-md-3">
                                    <h5 style="font-weight: bold;">
                                        Door Count
                                    </h5>
                                    <p style="margin-top: 0; padding-top: 0;">
                                        @if($vehicle_detail->door_count != null)
                                            {{ $vehicle_detail->door_count  }}
                                        @endif
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

                            <div class="row col-md-12">
                                @foreach($other_features as $key => $value)
                                    <div class="card col-md-4">
                                        <div class="card-body">
                                         <span class="" style="font-size: 12px;">
                                             {{ $key }}
                                             @if($value != null)
                                                 <i class="fa fa-check text-success"></i>
                                             @else
                                                 <i class="fa fa-times text-danger"></i>
                                             @endif
                                         </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            {{--                            <div class="row">--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i>  Air Conditioning--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Air Bags--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i>  Alloy Wheels--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> AM/FM Radio--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Anti-Lock Brakes--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Armrests--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> CD Player--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Electric Windows--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Fog Lights--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Power Steering--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Tinted Windows--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Traction Control--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-3">--}}
{{--                                    <p style="margin-top: 0; padding-top: 0;">--}}
{{--                                        <i class="fa fa-check text-success"></i> Wheel Locks--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>
                    </section>
                </div>
            </div>

            <div class="col-md-4" style="margin-top: 2%; padding-top: 0.5%;">
                <div class="card">
                    <div class="card-header">
                        Contact Seller
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            For an immediate response call this seller
                        </p>

                        <p>
                            +2547 *** ***
                        </p>

                        <button type="button" class="btn btn-block" data-toggle="modal" data-target="#exampleModal" style="background-color: black;">
                            <span style="color: white;">
                                                            Get seller phone number
                            </span>
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Call the seller</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <h6>
                                            Please submit your contact details. This will make it easier for the seller
                                            to follow back or contact you.
                                        </h6>

                                        <hr>

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
                                            <button type="submit" class="btn btn-block" style="background-color: black;">
                                                Call Me Back
                                            </button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        {{--<button type="button" class="btn btn-primary">Send message</button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>


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

            <div class="col-md-2" style="margin-top: 2%; padding-top: 0.5%;">
                <?php
                $similar_ads = showSimilarAdsForAd($vehicle_detail->car_make->id,
                    $vehicle_detail->car_model->id,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null);
                ?>
                @if($similar_ads->count() >= 1)
                    <div class="card-header">
                        Similar vehicles
                    </div>
                    <div class="card">
                        @foreach($similar_ads as $similar_ad)
                            @if($similar_ad->id != $vehicle_detail->id)
                                <div class="card-body">
                                    @if(checkIfAdIsBulk($similar_ad->id) == false)
                                        <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.getVehicleFrontImage($similar_ad->id)) }}" alt="Card image cap">
                                    @else
                                        <?php
                                        $bulk_ad =  $bulkAdsRepository->showFromVehicleDetail($similar_ad->id);

                                        ?>
                                        <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.getBulkVehicleFrontImage($bulk_ad->user_bulk_import_id)) }}" alt="Card image cap">
                                    @endif
                                    {{ $similar_ad->car_make->name }}
                                    -
                                    {{ $similar_ad->car_model->name }}
                                    <p>
                                        Ksh {{ $similar_ad->price }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <?php
                    $more_ads = showSimilarAdsForAd('any_make',
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null);
                    ?>
                    <div class="card-header">
                        More vehicles
                    </div>
                    <div class="card">
                        @foreach($more_ads as $more_ad)
                            @if($more_ad->id != $vehicle_detail->id)
                                <div class="card-body">
                                    @if(checkIfAdIsBulk($more_ad->id) == false)
                                        <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.getVehicleFrontImage($more_ad->id)) }}" alt="Card image cap">
                                    @else
                                        <?php
                                        $bulk_ad =  $bulkAdsRepository->showFromVehicleDetail($more_ad->id);

                                        ?>
                                        <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.getBulkVehicleFrontImage($bulk_ad->user_bulk_import_id)) }}" alt="Card image cap">
                                    @endif
                                    {{ $more_ad->car_make->name }}
                                    -
                                    {{ $more_ad->car_model->name }}
                                    <p>
                                        Ksh {{ $more_ad->price }}
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('#flash-overlay-modal').modal();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script>
            baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
            $('#flash-overlay-modal').modal();
        </script>
    @endpush
@endsection
