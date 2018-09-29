@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Latest Single Ads</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Make</th>
                                <th scope="col">Model</th>
                                <th scope="col">Year</th>
                                <th scope="col">Mileage</th>
                                <th scope="col">Body Type</th>
                                <th scope="col">Transmission Type</th>
                                <th scope="col">Car Condition</th>
                                <th scope="col">Duty</th>
                                <th scope="col">Price (KES)</th>
                                <th scope="col">Negotiable Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($single_ads as $single_ad)
                                <tr>
                                    <th scope="row">{{  $single_ad->id }}</th>
                                    <td>{{  $single_ad->car_make->name }}</td>
                                    <td>{{  $single_ad->car_model->name }}</td>
                                    <td>{{  $single_ad->year }}</td>
                                    <td>{{  $single_ad->mileage }}</td>
                                    <td>{{  $single_ad->body_type->name }}</td>
                                    <td>{{  $single_ad->transmission_type->name }}</td>
                                    <td>{{  $single_ad->car_condition->name }}</td>
                                    <td>{{  $single_ad->duty->name }}</td>
                                    <td>{{  $single_ad->price }}</td>
                                    <td>
                                        @if($single_ad->negotiable_price == 'allowed')
                                            Negotiable
                                        @else
                                            Not Negotiable
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
