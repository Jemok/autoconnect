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
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">View All Cars</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bulk_imports as $bulk_import)
                                <tr>
                                    <th>{{ $bulk_import->bulk_import->id }}</th>
                                    <th scope="row">{{ $bulk_import->bulk_import->user->name }}</th>
                                    <td>{{  $bulk_import->bulk_import->user->email }}</td>
                                    <td>
                                        <a href="{{ route('indexForAdmin', $bulk_import->id) }}">
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
