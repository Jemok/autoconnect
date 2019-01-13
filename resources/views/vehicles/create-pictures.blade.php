@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row bs-wizard wizard-second-div">
                    <div class="col bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">
                             <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Vehicle Details
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                   <strong>
                                Vehicle Details
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Vehicle Pictures
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                               <strong>
                                Vehicle Pictures
                            </strong>
                            </span>
                        </div>
                        <div class="progress" ><div class="progress-bar" style="background-color: black;"></div></div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="col bs-wizard-step disabled"><!-- complete -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Contact Details
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                     Contact Details
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>

                    <div class="col bs-wizard-step disabled"><!-- active -->
                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                              Payment
                            </span>
                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                Payment
                            </strong>
                            </span>
                        </div>
                        <div class="progress"><div class="progress-bar"></div></div>
                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                    </div>
                </div>

                <div class="col-md-8 offset-md-2">
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
                                        <div class="card" style="border: none;">
                                            <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                <img class="card-img-top" src="{{ asset('images/front.png') }}" id="front" alt="Card image cap">
                                            </div>
                                            <div class="card-body" style="background-color: lightgrey;">
                                                <h6 class="card-title">Front</h6>
                                                <input type="file" name="front"  onchange="readURL(this, 'front', 'frontImage', '{{ $vehicleId }}');"  class="form-control-file" id="frontImage">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card" style="border: none;">
                                            <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                <img class="card-img-top" src="{{ asset('images/back.png') }}" id="back" alt="Card image cap">
                                            </div>
                                            <div class="card-body" style="background-color: lightgrey;">
                                                <h6 class="card-title">Back</h6>
                                                <input type="file" name="back" onchange="readURL(this, 'back', 'backImage', '{{ $vehicleId }}');" class="form-control-file" id="backImage">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card" style="border: none;">
                                            <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                <img class="card-img-top" src="{{ asset('images/left.png') }}" id="left" alt="Card image cap">
                                            </div>
                                            <div class="card-body" style="background-color: lightgrey;">
                                                <h6 class="card-title">Left Side</h6>
                                                <input type="file" name="left" onchange="readURL(this, 'left', 'leftImage', '{{ $vehicleId }}');" class="form-control-file" id="leftImage">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="row" style="margin-top: 3%;">
                                <div class="col-sm-4">
                                    <div class="card" style="border: none;">
                                        <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                            <img class="card-img-top" src="{{ asset('images/right.png') }}" id="right" alt="Card image cap">
                                        </div>
                                        <div class="card-body" style="background-color: lightgrey;">
                                            <h5 class="card-title">Right</h5>
                                            <input type="file" name="right" onchange="readURL(this, 'right', 'rightImage',  '{{ $vehicleId }}');" class="form-control-file" id="rightImage">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card" style="border: none;">
                                        <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                            <img class="card-img-top" src="{{ asset('images/dashboard.jpeg') }}" id="dashboard" alt="Card image cap">
                                        </div>
                                        <div class="card-body" style="background-color: lightgrey;">
                                            <h5 class="card-title">Dashboard</h5>
                                            <input type="file" name="dashboard" onchange="readURL(this, 'dashboard', 'dashboardImage', '{{ $vehicleId }}');" class="form-control-file" id="dashboardImage">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card" style="border: none;">
                                        <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                            <img class="card-img-top" src="{{ asset('images/interior.jpg') }}" id="interior" alt="Card image cap">
                                        </div>
                                        <div class="card-body" style="background-color: lightgrey;">
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
    </div>
    @push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/file-uploader.js') }}"></script>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    @endpush
@endsection
