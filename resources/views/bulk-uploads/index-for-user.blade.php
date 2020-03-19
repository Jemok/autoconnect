@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Latest Bulk Uploads</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Batch #</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Approval Status</th>
                                <th scope="col">View All Cars</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bulk_imports as $bulk_import)
                                <tr>
                                    <th>{{ $bulk_import->id }}</th>
                                    <td>{{ $bulk_import->created_at->diffForHumans() }}</td>
                                    <td>
                                        Not Approved
                                    </td>
                                    <td>
                                        <a href="{{ route('confirmBulkImports', $bulk_import->id) }}">
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
