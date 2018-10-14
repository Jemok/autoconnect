@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="{{ asset('css/compact-gallery.css') }}">
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $vehicle_detail->car_make->name }}
                        {{ $vehicle_detail->car_model->name }}
                        @if(isset($vehicle_detail->vehicle_contact->name ))
                            ( {{ $vehicle_detail->vehicle_contact->name  }}
                        @endif

                        @if(isset($vehicle_detail->vehicle_contact->phone_number))
                            - {{ $vehicle_detail->vehicle_contact->phone_number }} )
                        @endif

                        @if(isset($vehicle_detail->vehicle_verification->status))
                            @if($vehicle_detail->vehicle_verification->status == 'not_verified')
                                <form action="{{ route('setVehicleAsVerified', $vehicle_detail->id) }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-sm btn-success float-right">
                                        Set as Verified
                                    </button>
                                </form>
                            @elseif($vehicle_detail->vehicle_verification->status == 'verified')
                                <form action="{{ route('setVehicleAsNotVerified', $vehicle_detail->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-sm btn-danger float-right">
                                        Set as Not Verified
                                    </button>
                                </form>
                            @endif
                        @else
                            <form action="{{ route('setVehicleAsVerified', $vehicle_detail->id) }}" method="POST">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-sm btn-success float-right">
                                    Set as Verified
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('indexSingleAdsImages', $vehicle_detail->id) }}" class="btn btn-sm btn-success float-right">
                            Vehicle Management
                        </a>

                    </div>
                    <p>

                    <p>
                    <h3 style="margin-left: 2%;" class="heading">
                        Manage Ads
                    </h3>
                    </p>

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Package</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Ad Status</th>
                            <th scope="col">Start</th>
                            <th scope="col">Stop</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vehicle_payments as $vehicle_payment)
                            <tr>
                                <th scope="row">{{ $vehicle_payment->id }}</th>
                                <td>
                                    @if($vehicle_payment->package == 'standard')
                                        Standard
                                    @elseif($vehicle_payment->package == 'premium')
                                        Premium
                                    @endif
                                </td>
                                <td>
                                    @if($vehicle_payment->status == 'paid')
                                        Paid
                                    @elseif($vehicle_payment->status == 'not_paid')
                                        Not Paid
                                    @endif
                                </td>
                                <td>
                                    @if(isset($vehicle_payment->ad_status->status))
                                        @if($vehicle_payment->ad_status->status == 'active')
                                            Active
                                        @elseif($vehicle_payment->ad_status->status == 'inactive')
                                            Inactive
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if(isset($vehicle_payment->ad_status->start))
                                        {{ $vehicle_payment->ad_status->start }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if(isset($vehicle_payment->ad_status->stop))
                                        {{ $vehicle_payment->ad_status->stop }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if(!isset($vehicle_payment->ad_status->status) && $vehicle_detail->vehicle_verification->status == 'verified')
                                        <form action="{{ route('activateAd', [$vehicle_detail->id, $vehicle_payment->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-sm btn-success">Activate</button>
                                        </form>
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
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
        $('#flash-overlay-modal').modal();
    </script>
    @endpush
@endsection
