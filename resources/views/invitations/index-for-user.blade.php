@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Your Roles
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">
                                        Role
                                    </th>
                                    <th scope="col">
                                        As From
                                    </th>
                                    <th scope="col">
                                        Status
                                    </th>
                                </tr>
                                </thead>
                                @if($invitations->count())
                                    <tbody>
                                    @foreach($invitations  as $invitation)
                                        <tr>
                                            <td>
                                                {{ $invitation->role->name }}
                                            </td>
                                            <td>
                                                {{ $invitation->created_at->toDateTimeString() }}
                                            </td>
                                            <td>
                                                @if($invitation->status == 'invited')

                                                    <form method="post" action="{{ route('processUserInvitations', $invitation->id) }}">

                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            Accept Invitation
                                                        </button>
                                                    </form>

                                                @elseif($invitation->status == 'accepted')
                                                    {{ $invitation->status }}
                                                @elseif($invitation->status == 'revoked')
                                                    {{ $invitation->status }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @else
                                    <h1 class="text-center">
                                        No Invitations Found
                                    </h1>
                                @endif
                            </table>
                        </div>

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
