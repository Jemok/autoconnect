@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dealers</div>

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
                                <th scope="col">Verification Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dealer_roles as $dealer_role)
                                @if(isset($dealer_role->user->name))
                                    <tr>
                                        <th>{{ $dealer_role->model_id }}</th>
                                        <th scope="row">{{ $dealer_role->user->name }}</th>
                                        <td>{{  $dealer_role->user->email }}</td>
                                        <td>
                                            @if(isset($dealer_role->user->user_verification->verification_status))

                                                @if($dealer_role->user->user_verification->verification_status == 'not_verified')
                                                    Not Verified
                                                @else
                                                    Verified
                                                @endif
                                            @else
                                                Not Verified
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($dealer_role->user->user_verification->verification_status))

                                                @if($dealer_role->user->user_verification->verification_status == 'not_verified')
                                                    <form action="{{ route('verifyUser', [$dealer_role->user->id, 'verified']) }}" method="post">

                                                        {{ csrf_field() }}

                                                        <button class="btn btn-sm btn-success">
                                                            Verify
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('verifyUser', [$dealer_role->user->id, 'not_verified']) }}" method="post">

                                                        {{ csrf_field() }}

                                                        <button class="btn btn-sm btn-danger">
                                                           Un Verify
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <form action="{{ route('verifyUser', [$dealer_role->user->id, 'verified']) }}" method="post">

                                                    {{ csrf_field() }}

                                                    <button class="btn btn-sm btn-success">
                                                        Verify
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
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
