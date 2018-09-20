@extends('layouts.app')

@section('content')
    <div class="container">
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
                                        <h5 class="card-title">Gold Package</h5>
                                        <p class="card-text">Ksh 5000</p>
                                        <p class="card-text">Priority Ad
                                        <p class="card-text">Valid for 30 days</p>
                                        <a href="#" class="btn btn-primary">Make Payment</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Standard Package</h5>
                                        <p class="card-text">Ksh 2900</p>
                                        <p class="card-text">Standard Ad</p>
                                        <p class="card-text">Valid for 30 days</p>
                                        <a href="#" class="btn btn-primary">Make Payment</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('createVehicleContacts') }}" class="btn btn-danger float-left">Previous</a>

                        <a href="{{ route('publishVehicleAd') }}" class="btn btn-success float-right">Publish Ad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
