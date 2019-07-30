@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add a Payment Below
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">indexImages
                                {{ session('status') }}
                            </div>
                        @endif


                        <form role="form" method="POST" action="{{ route('storeOtherBulkPayment', [$bulkImportId]) }}" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="period">Payment Method *</label>
                                <select class="form-control" name="payment_method" id="payment_method">
                                    <option selected disabled></option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amount">Payment Amount</label>
                                <input type="number" name="amount" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" id="amount" aria-describedby="amountHelp" placeholder="E.g 10000">
                                @if($errors->has('amount'))
                                    <div class="invalid-feedback" role="alert">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <button type="submit" class="btn app-btn-shiny offset-2 offset-sm-5 offset-md-7">Record Payment</button>
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
