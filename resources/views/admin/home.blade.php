@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Single Ads</h5>
                                <a href="{{ route('indexSingleAds') }}" class="btn btn-primary">View All</a>
                            </div>
                        </div>

                        <div class="card" style="margin-top: 1%;">
                            <div class="card-body">
                                <h5 class="card-title">Administrators</h5>
                                <a href="{{ route('createAdministrator') }}" class="btn btn-primary">Manage Administrators</a>
                            </div>
                        </div>

                        <div class="card" style="margin-top: 1%;">
                            <div class="card-body">
                                <h5 class="card-title">Bulk Uploads</h5>
                                <a href="{{ route('indexForPayments') }}" class="btn btn-primary">Manage Bulk Uploads</a>
                            </div>
                        </div>

                        <div class="card" style="margin-top: 1%;">
                            <div class="card-body">
                                <h5 class="card-title">Bulk Uploads Corrected</h5>
                                <a href="{{ route('indexCorrectedSubmissions') }}" class="btn btn-primary">Manage Bulk Uploads</a>
                            </div>
                        </div>

                        <div class="card" style="margin-top: 1%;">
                            <div class="card-body">
                                <h5 class="card-title">Dealers</h5>
                                <a href="{{ route('indexDealers') }}" class="btn btn-primary">List all dealers</a>
                            </div>
                        </div>

                        <div class="card" style="margin-top: 1%;">
                            <div class="card-body">
                                <h5 class="card-title">Payment Reports</h5>
                                <a href="{{ route('indexAnnualReports') }}" class="btn btn-primary">Payment Reports</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
