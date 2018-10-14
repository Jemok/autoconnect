@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sell Your Vehicle</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Chose your Advertising Package

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('makePayment', [$vehicleId, 'premium']) }}">
                                            {{ csrf_field() }}
                                            <h5 class="card-title">Premium Package</h5>
                                            <p class="card-text">Ksh 5</p>
                                            <p class="card-text">Priority Ad</p>
                                            <p class="card-text">Valid for 30 days</p>
                                            <div class="alert alert-primary" role="alert">
                                                Payment will be made using  Mpesa number {{ $vehicle_detail->vehicle_contact->phone_number }} ,
                                                click Make Payment below, then wait to enter Mpesa pin on your phone. Then click finish.
                                            </div>
                                            <p class="card-text">
                                                <a href="{{ route('createVehicleContacts', $vehicleId) }}" class="card-link">Change Number</a>
                                            </p>
                                            <button type="submit" class="btn btn-success">Make Payment <img src="{{ asset('images/mpesa-logo.png') }}" /></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('makePayment', [$vehicleId, 'standard']) }}">
                                            {{ csrf_field() }}
                                            <h5 class="card-title">Standard Package</h5>
                                            <p class="card-text">Ksh 5</p>
                                            <p class="card-text">Standard Ad</p>
                                            <p class="card-text">Valid for 30 days</p>
                                            <div class="alert alert-primary" role="alert">
                                                Payment will be made using  Mpesa number {{ $vehicle_detail->vehicle_contact->phone_number }} ,
                                                click Make Payment below, then wait to enter Mpesa pin on your phone. Then click finish.
                                            </div>
                                            <p class="card-text">
                                                <a href="{{ route('createVehicleContacts', $vehicleId) }}" class="card-link">Change Number</a>
                                            </p>
                                            <button type="submit" class="btn btn-success">Make Payment <img src="{{ asset('images/mpesa-logo.png') }}" /></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('createVehicleContacts', $vehicleId) }}" class="btn btn-danger float-left">Previous</a>

                        <a href="{{ route('publishVehicleAd') }}" class="btn btn-success float-right">Finish</a>
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
