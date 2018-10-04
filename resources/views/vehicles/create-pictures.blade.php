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

                        <form action="">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card">
                                        <img class="card-img-top" src="http://placehold.it/180" id="front" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Front</h5>
                                            <input type="file" name="front"  onchange="readURL(this, 'front', 'frontImage', '{{ $vehicleId }}');"  class="form-control-file" id="frontImage">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <img class="card-img-top" src="http://placehold.it/180" id="back" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Back</h5>
                                            <input type="file" name="back" onchange="readURL(this, 'back', 'backImage', '{{ $vehicleId }}');" class="form-control-file" id="backImage">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <img class="card-img-top" src="http://placehold.it/180" id="left" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Left Side</h5>
                                            <input type="file" name="left" onchange="readURL(this, 'left', 'leftImage', '{{ $vehicleId }}');" class="form-control-file" id="leftImage">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="right" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Right</h5>
                                        <input type="file" name="right" onchange="readURL(this, 'right', 'rightImage',  '{{ $vehicleId }}');" class="form-control-file" id="rightImage">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="dashboard" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Dashboard</h5>
                                        <input type="file" name="dashboard" onchange="readURL(this, 'dashboard', 'dashboardImage', '{{ $vehicleId }}');" class="form-control-file" id="dashboardImage">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <img class="card-img-top" src="http://placehold.it/180" id="interior" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Interior</h5>
                                        <input type="file" name="interior" onchange="readURL(this, 'interior', 'interiorImage', '{{ $vehicleId }}');" class="form-control-file" id="interiorImage">
                                    </div>
                                </div>
                            </div>
                        </div>

                        Upload More Images

                        <form action="/api/images/upload/others/{{$vehicleId}}"
                              class="dropzone"
                              id="my-awesome-dropzone"></form>

                        <a href="{{ route('createVehicle') }}" class="btn btn-danger float-left">Previous</a>

                        <a href="{{ route('createVehicleContacts', $vehicleId) }}" class="btn btn-success float-right">Next</a>
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
