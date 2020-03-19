@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Make Payment for Bulk Upload Batch No: {{ $bulkImportId }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('makeBulkPayment', $bulkImportId) }}" method="post">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="amount">Payment Amount</label>
                                <p>
                                    KES : {{ $bulk_approval->amount }}
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="amount">Phone Number *</label>
                                <input type="number" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" id="phoneNumber" aria-describedby="phoneNumberHelp" placeholder="E.g 07123456789">
                                @if($errors->has('phone_number'))
                                    <div class="invalid-feedback" role="alert">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>

                            <h6 class="text-center">
                                NB : Click the button below, ensure phone is unlocked, and wait to enter Mpesa Pin
                            </h6>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Make Payment
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    @endpush
@endsection
