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

                        <form method="POST" action="{{ route('storeVehicleContacts', $vehicleId) }}">

                            {{ csrf_field() }}

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="col">
                                    <label for="inputState">Email*</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Country Code*</label>
                                    <select name="country_code" id="inputState" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option value="254">+254</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputState">Phone Number*</label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <label for="inputState">Area/City*</label>
                                    <select name="area" id="inputState" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <a href="{{ route('createVehiclePictures', $vehicleId) }}" class="btn btn-danger float-left">Previous</a>

                            <button type="submit" class="btn btn-success float-right">Next</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
    @endpush
@endsection
