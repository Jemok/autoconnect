@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Download Bulk Upload Template (.xls)

                        <a href="{{ route('saveBulkUpload') }}" class="btn btn-primary btn-sm float-right">Next</a>
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
                                    <h5 class="card-title">Download Excel Template</h5>
                                    <p class="card-text">
                                        Download and fill in the .xls template below
                                    </p>
                                    <img src="{{ asset('images/excel-logo.jpg') }}" class="img-fluid" width="50%" alt="">
                                    <a href="{{ route('downloadExcelTemplate') }}" class="btn btn-primary">Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
