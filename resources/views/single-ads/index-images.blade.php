@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="{{ asset('css/compact-gallery.css') }}">
@endsection
@section('content')
    <div class="container">
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
                        - Images</div>

                    <div class="row">
                        <div class="col-md-3">
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
                                    <h2>Image Gallery</h2>
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
        </div>
    </div>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
    </script>
    @endpush
@endsection
