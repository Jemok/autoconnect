@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dealer Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Upload Bulk</h5>
                                    <p class="card-text">
                                        You can upload bulk cars here
                                    </p>
                                    <a href="{{ route('startBulkUpload') }}" class="btn btn-primary">Start Uploading</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Roles ( {{ $count_invitations }} )</h5>
                                    <a href="{{ route('indexUserInvitations') }}" class="btn btn-primary">Your Role Invitations</a>
                                </div>
                            </div>
                        </div>

                            <div class="col-sm-6">
                                <div class="card" style="margin-top: 1%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Bulk Uploads</h5>
                                        <a href="{{ route('indexBulkUploadsForUser') }}" class="btn btn-primary">Manage Bulk Uploads</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
