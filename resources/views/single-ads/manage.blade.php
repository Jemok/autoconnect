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

                        @if(Auth::user()->hasRole('super-admin'))
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
                            <th scope="col">Ad Status</th>
                            <th scope="col">Start</th>
                            <th scope="col">Stop</th>
                            {{--<th scope="col">Manage</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ads as $ad)
                            <tr>
                                <th scope="row">{{ $ad->id }}</th>
                                <td>
                                    @if($ad->status == 'active')
                                        Active
                                    @elseif($ad->status == 'inactive')
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    @if(isset($ad->start))
                                        {{ $ad->start }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if(isset($ad->stop))
                                        {{ $ad->stop }}
                                    @else
                                        N/A
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
