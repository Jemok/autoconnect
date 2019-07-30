@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Set Payment Amount And Approve</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('storeBulkApproval', $bulkImportId) }}" method="post">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="amount">Payment Amount</label>
                                <input type="number" name="amount" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" id="amount" aria-describedby="amountHelp" placeholder="E.g 10000">
                                @if($errors->has('amount'))
                                    <div class="invalid-feedback" role="alert">
                                        {{ $errors->first('amount') }}
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="period">Period</label>
                                <select class="form-control" name="period" id="period">
                                    <option selected disabled></option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                    <option value="3">3 Months</option>
                                    <option value="4">4 Months</option>
                                    <option value="5">5 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="7">7 Months</option>
                                    <option value="8">8 Months</option>
                                    <option value="9">9 Months</option>
                                    <option value="10">10 Months</option>
                                    <option value="11">11 Months</option>
                                    <option value="12">12 Months</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="period">Payment Method *</label>
                                <select class="form-control" name="payment_method" id="payment_method">
                                    <option selected disabled></option>
                                    <option value="mpesa">Mpesa</option>
                                    <option value="cash">Cash</option>
                                    <option value="cheque">Cheque</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="period">Commitment *</label>
                                <select class="form-control" name="payment_commitment" id="payment_method">
                                    <option selected disabled></option>
                                    <option value="full">Full</option>
                                    <option value="partial">Partial</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Approve and Send Payment Instructions
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
