@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Contact Details</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="col">
                                <label for="inputState">Name*</label>
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col">
                                <label for="inputState">Email*</label>
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="inputState">Country Code*</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option></option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="inputState">Phone Number*</label>
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="inputState">Area/City*</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option></option>
                                </select>
                            </div>
                        </div>

                        <a href="{{ route('createVehiclePictures') }}" class="btn btn-danger float-left">Previous</a>

                        <a href="{{ route('createAd') }}" class="btn btn-success float-right">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    @endpush
@endsection
