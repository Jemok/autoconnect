@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Vehicle Pictures</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        High quality images attract more Buyers. Upload at least 6 images. We recommend 6-9 images for best results.

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="front" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Front</h5>
                                        <input type="file" onchange="readURL(this, 'front');"  class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="back" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Back</h5>
                                        <input type="file" onchange="readURL(this, 'back');" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="left" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Left Side</h5>
                                        <input type="file" onchange="readURL(this, 'left');" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="right" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Right</h5>
                                        <input type="file" onchange="readURL(this, 'right');" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="dashboard" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Dashboard</h5>
                                        <input type="file" onchange="readURL(this, 'dashboard');" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="interior" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Interior</h5>
                                        <input type="file" onchange="readURL(this, 'interior');" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>
                        </div>

                        Upload More Images

                        <form action="/file-upload"
                              class="dropzone"
                              id="my-awesome-dropzone"></form>

                        <a href="{{ route('createVehicle') }}" class="btn btn-danger float-left">Previous</a>

                        <a href="{{ route('createVehicleContacts') }}" class="btn btn-success float-right">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/file-uploader.js') }}"></script>
    @endpush
@endsection
