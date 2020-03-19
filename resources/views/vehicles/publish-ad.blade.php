@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 3%;">
                <div class="card">
                    <div class="card-header background-nav">Your Ad has been created successfully</div>

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
                                        <h4 class="text-center">
                                            You will receive an email when your ad has been approved and published online to our website
                                        </h4>
                                        <p class="text-center">
                                            <i class="fa fa-check text-success" style="font-size: 150px;"></i>
                                        </p>
                                        <h5 class="text-center">
                                            Thank you
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
