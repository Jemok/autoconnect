@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Confirm Uploads ( {{ $single_ads->count() }} )

                        @if($bulk_payment_status)
                            Payment Status : Paid
                        @else
                            Payment Status : Not Paid
                        @endif

                        @if($bulk_payment_status && $bulk_approval_status)
                            <button class="btn btn-disabled pull-right" disabled>
                                Approved
                            </button>
                        @else
                            <form action="{{ route('moveBulkAdsOnline', $bulkImportId) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success pull-right">
                                    Approve Now
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('indexBulkPayments', $bulkImportId) }}" class="btn btn-primary pull-right">
                            View Payments
                        </a>

                        <a href="{{ route('setApprovalForBulk', $bulkImportId) }}" class="btn btn-primary pull-right">
                            Send Payment Instructions
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">indexImages
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
                                <th scope="col">Images Uploaded</th>
                                <th scope="col">Images</th>
                                <th scope="col">Verified</th>
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
                                    <td>
                                        @if($vehicleImagesRepository->checkIfImagesExistForBulk($single_ad->id))
                                            <i class="fa fa-check text-success"></i>
                                        @else
                                            <i class="fa fa-times text-danger"></i>
                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('adminManageBulkImages', [$bulkImportId, $single_ad->id]) }}">
                                            Images
                                        </a>
                                    </td>
                                    <td>
                                        @if($single_ad->approval_status == 'not_approved')
                                            <i class="fa fa-times text-danger"></i>
                                        @elseif($single_ad->approval_status == 'approved')
                                            <i class="fa fa-check text-success"></i>
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
