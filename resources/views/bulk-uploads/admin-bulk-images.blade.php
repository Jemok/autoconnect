@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
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

                        @if($vehicle_detail->approval_status == 'not_approved')
                            Not verified  <i class="fa fa-times text-danger"></i>
                        @elseif($vehicle_detail->approval_status == 'approved')
                            Verified  <i class="fa fa-check text-success"></i>
                        @endif

                        <form action="{{ route('setBulkImportAsApproved', [$vehicle_detail->id, 'approved']) }}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-sm btn-success float-right">
                                Set as Verified
                            </button>
                        </form>

                        <a href="{{ route('showBulkDisapprovalPage', $vehicle_detail->id) }}" class="btn btn-sm btn-danger float-right">
                            Add Disapproval Reason
                        </a>

                        {{--<a href="{{ route('manageVehicleAd', $vehicle_detail->id) }}" class="btn btn-sm btn-success float-right">--}}
                            {{--Ad Management--}}
                        {{--</a>--}}

                    </div>

                    <p>

                        @if($disapproval_reasons->count())
                            <div class="alert alert-danger">
                    <p class="card-text">
                        The following issues need to be fixed for this Ad
                    </p>
                    @foreach($disapproval_reasons as $disapproval_reason)
                        <p class="card-text text-danger">
                            {{ $disapproval_reason->reason }}
                        </p>

                        <form action="{{ route('fixBulkCorrection', [$single_bulk_upload->id, $disapproval_reason->id, 'resolved']) }}" method="post">

                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-primary">
                                Fix Corrections
                            </button>
                        </form>
                    @endforeach
                </div>
                @endif

                <h3 style="margin-left: 2%;" class="heading">
                    Car Details
                </h3>
                </p>

                <div class="row" style="padding-left: 2%;">
                    <div class="col-md-3" style="padding-left: 2%;">
                        <p style="padding: 0; margin: 0;">
                            Car Make : {{ $vehicle_detail->car_make->name }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Car Model : {{ $vehicle_detail->car_model->name }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Year : {{ $vehicle_detail->year }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Mileage : {{ $vehicle_detail->mileage }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Body Type : {{ $vehicle_detail->body_type->name }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p style="padding: 0; margin: 0;">
                            Transmission Type : {{ $vehicle_detail->transmission_type->name }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Car Condition : {{ $vehicle_detail->car_condition->name }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Duty : {{ $vehicle_detail->duty->name }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Price : KES {{ $vehicle_detail->price }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Negotiable Price :
                            @if($vehicle_detail->negotiable_price == 'allowed')
                                Negotiable
                            @else
                                Not Negotiable
                            @endif
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p style="padding: 0; margin: 0;">
                            Fuel Type: {{ $vehicle_detail->fuel_type }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Engine Size: {{ $vehicle_detail->engine_size }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Interior: {{ $vehicle_detail->interior }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Colour Type: {{ $vehicle_detail->colour_type->name }}
                        </p>
                        <p style="padding: 0; margin: 0;">
                            Description : {{ $vehicle_detail->description }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p style="padding-left: 3%;">
                            <a class="btn btn-outline-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Other Features
                            </a>
                        </p>
                    </div>
                </div>



                <div class="collapse" id="collapseExample">
                    <div class="row col-md-12">
                        @foreach($other_features as $key => $value)
                            <div class="card col-md-3">
                                <div class="card-body">
                                         <span class="alert alert-default" style="font-size: 12px;">
                                             {{ $key }}
                                             @if($value != null)
                                                 <i class="fa fa-check text-success"></i>
                                             @else
                                                 <i class="fa fa-times text-danger"></i>
                                             @endif
                                         </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">indexImages
                            {{ session('status') }}
                        </div>
                    @endif


                    <section class="gallery-block grid-gallery">
                        <div class="container">
                            <div class="heading">
                                <h2>Vehicle Gallery</h2>
                            </div>
                            <div class="row">
                                @foreach($vehicle_images as $vehicle_image)
                                    <div class="col-md-6 col-lg-4 item" style="height: 210px; width: 210px; overflow: hidden; margin-bottom: 2%; border: solid black 1px;">
                                        <div class="row">
                                            <a class="lightbox" href="{{ asset('storage/images/cars/'.$vehicle_image->image_name) }}">
                                                <p style="color: black;">
                                                    {{ $vehicle_image->image_area }}
                                                </p>
                                                <img class="img-fluid image scale-on-hover" src="{{ asset('storage/images/cars/'.$vehicle_image->image_name) }}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upload Vehicle Pictures</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>
                        {{  $single_bulk_upload->car_make->name }} - {{ $single_bulk_upload->car_model->name  }} - {{  $single_bulk_upload->year }} - {{  $single_bulk_upload->colour_type->name }}
                    </h4>


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

                    <form action="/api/images/upload-bulk/others/{{$vehicleId}}"
                          class="dropzone"
                          id="my-awesome-dropzone"></form>

                    {{--<a href="{{ route('createVehicle') }}" class="btn btn-danger float-left">Previous</a>--}}

                    <a href="{{ route('indexForAdmin', $vehicle_detail->bulk_import_id) }}" class="btn btn-success float-right">Next</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/bulk-uploader.js') }}"></script>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    @endpush
@endsection
