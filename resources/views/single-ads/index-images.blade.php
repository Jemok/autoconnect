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
