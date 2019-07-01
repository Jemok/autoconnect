@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row bs-wizard wizard-second-div">
                    <div class="col bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">
                             <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Vehicle Details
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                   <strong>
                                Vehicle Details
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step disabled"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Vehicle Pictures
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                               <strong>
                                Vehicle Pictures
                            </strong>
                            </span>
                        </div>
                        <div class="progress" ><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step disabled"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Contact Details
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                     Contact Details
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step"><!-- active -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                              Payment
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                Payment
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>
                </div>

                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header background-nav" style="font-weight: bold;">Sell Your Vehicle</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h3 class="text-center">
                                Chose your Advertising Package
                            </h3>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('makePayment', [$vehicleId, 'premium']) }}">
                                                {{ csrf_field() }}
                                                <h5 class="card-title" style="font-weight: bold;">Premium Package</h5>
                                                <p class="card-text" style="font-weight: bold;">KES 5</p>
                                                <p class="card-text" style="font-weight: bold;">Priority Ad</p>
                                                <p class="card-text" style="font-weight: bold;">Valid for 30 days</p>
                                                <div class="alert alert-primary" role="alert" style="font-weight: bold;">
                                                    Payment will be made using  Mpesa number {{ $vehicle_detail->vehicle_contact->phone_number }} ,
                                                    click Make Payment below, then wait to enter Mpesa pin on your phone. Then click finish.
                                                </div>
                                                <p class="card-text">
                                                    <a href="{{ route('createVehicleContacts', $vehicleId) }}" class="card-link" style="font-weight: bold;">
                                                        Change Mpesa Buying Number
                                                        <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                </p>
                                                <button type="submit" class="btn btn-success" style="font-weight: bold;">Click to Make Payment <img src="{{ asset('images/mpesa-logo.png') }}" /></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('makePayment', [$vehicleId, 'standard']) }}">
                                                {{ csrf_field() }}
                                                <h5 class="card-title" style="font-weight: bold;">Standard Package</h5>
                                                <p class="card-text" style="font-weight: bold;">Ksh 5</p>
                                                <p class="card-text" style="font-weight: bold;">Standard Ad</p>
                                                <p class="card-text" style="font-weight: bold;">Valid for 30 days</p>
                                                <div class="alert alert-primary" role="alert" style="font-weight: bold;">
                                                    Payment will be made using  Mpesa number {{ $vehicle_detail->vehicle_contact->phone_number }} ,
                                                    click Make Payment below, then wait to enter Mpesa pin on your phone. Then click finish.
                                                </div>
                                                <p class="card-text">
                                                    <a href="{{ route('createVehicleContacts', $vehicleId) }}" class="card-link" style="font-weight: bold;">
                                                        Change Mpesa Buying Number
                                                        <i class="fa fa-arrow-right"></i>
                                                    </a>
                                                </p>
                                                <button type="submit" class="btn btn-success" style="font-weight: bold;">Click to Make Payment <img src="{{ asset('images/mpesa-logo.png') }}" /></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('createVehicleContacts', $vehicleId) }}" class="btn btn-danger float-left">
                                <i class="fa fa-arrow-left"></i>
                                Previous
                            </a>

                            <a href="{{ route('publishVehicleAd') }}" class="btn btn-success float-right">
                                <i class="fa fa-check"></i>
                                Finish
                            </a>
                        </div>
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
