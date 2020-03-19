@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All Corrections
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Disapproval #</th>
                                <th scope="col">Reason</th>
                                <th scope="col">View</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($disapproval_reasons as $disapproval_reason)
                                <tr>
                                    <th>{{ $disapproval_reason->id }}</th>
                                    <td>{{ $disapproval_reason->reason }}</td>
                                    <td>
                                        <a href="{{ route('adminManageBulkImages', [$disapproval_reason->user_bulk_import->bulk_import_id, $disapproval_reason->user_bulk_import->id]) }}">
                                            View
                                        </a>
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
