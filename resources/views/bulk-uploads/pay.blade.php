@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sell Your Vehicles</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('makePayment', [$bulkImportId, 'bulk']) }}">
                                            {{ csrf_field() }}
                                            <p class="card-text text-center">Ksh 10,000</p>
                                            <p class="card-text text-center">Bulk Ads</p>
                                            <p class="card-text text-center">Valid for 30 days</p>
                                            <div class="alert alert-primary" role="alert">
                                                Payment will be made using  Mpesa number 0712675071 ,
                                                click Make Payment below, then wait to enter Mpesa pin on your phone. Then click finish.
                                            </div>
                                            <button type="submit" class="btn btn-success float-right">Make Payment <img src="{{ asset('images/mpesa-logo.png') }}" /></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
