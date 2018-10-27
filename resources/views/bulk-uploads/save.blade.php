@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Import Vehicles
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Upload Excel File</h5>

                                    <form  method="POST" action="{{ route('importVehicles') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <input type="file" name="vehicle_file">

                                        <button type="submit" class="btn btn-success float-right">Import</button>
                                    </form>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
