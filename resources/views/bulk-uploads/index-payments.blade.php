@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Mpesa Payments
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">indexImages
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Transaction Id</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Phone Number</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bulk_mpesa_payments as $bulk_mpesa_payment)
                                <tr>
                                    <td>
                                        {{ $bulk_mpesa_payment->receipt_number }}
                                    </td>
                                    <td>
                                        {{ $bulk_mpesa_payment->transacted_amount }}
                                    </td>
                                    <td>
                                        {{ $bulk_mpesa_payment->created_at }}
                                    </td>
                                    <td>
                                        {{ $bulk_mpesa_payment->phone_number }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Cash/Cheque/Bank Payments

                        <a href="{{ route('recordBulkPayment', [$bulkImportId]) }}" class="float-right">
                            Record A Payment
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">indexImages
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Channel</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($other_payments as $other_payment)
                                <tr>
                                    <td>
                                        {{ $other_payment->id }}
                                    </td>
                                    <td>
                                        {{ $other_payment->amount }}
                                    </td>
                                    <td>
                                        {{ $other_payment->channel }}
                                    </td>
                                    <td>
                                        {{ $other_payment->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
