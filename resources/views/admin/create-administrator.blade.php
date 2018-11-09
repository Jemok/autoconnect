@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Admin Dashboard

                        <a href="{{ route('createAdministrator') }}" class="btn btn-sm btn-primary float-right">
                            Add Administrators
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="col-md-6">
                            <form role="form" method="POST" action="{{ route('inviteAdministrator') }}" autocomplete="off">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="organizationName" class="col-sm-2 col-md-4 col-form-label">Email</label>
                                    <div class="col-sm-10 col-md-8">
                                        <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" id="email" placeholder="E.g user@gmail.com" required>
                                        @if ($errors->has('email'))
                                            <small id="emailName" class="form-text tomato-color">
                                                {{ $errors->first('email') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-sm-2 col-md-4 col-form-label">Role</label>
                                    <div class="col-sm-10 col-md-8">
                                        <select name="role" class="custom-select my-1 mr-sm-2 {{ $errors->has('role') ? 'is-invalid' : '' }}" id="role" required>
                                            <option selected disabled>Choose...</option>
                                            @foreach($roles as $role)
                                                @if(old('role') == $role->name)
                                                    <option selected="selected" value="{{ $role->name }}">{{ $role->name }}</option>
                                                @else
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                            <small id="roleHelp" class="form-text invalid-feedback">
                                                {{ $errors->first('role') }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn app-btn-shiny offset-2 offset-sm-5 offset-md-7">Send Invitation</button>
                                </div>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Invited At</th>
                                    <th scope="col">Resend</th>
                                </tr>
                                </thead>
                                @if($invitations->count())
                                    <tbody>
                                    @foreach($invitations as $invitation)
                                        <tr>
                                            <td>
                                                {{ $invitation->email }}
                                            </td>

                                            <td>
                                                {{ $invitation->role->name }}
                                            </td>
                                            <td>
                                                {{ $invitation->status }}
                                            </td>
                                            <td>
                                                {{ $invitation->created_at->toDateTimeString() }}
                                            </td>
                                            <td>
                                                @if($invitation->status == 'invited')

                                                    <form method="post" action="{{ route('resendInvitation', $invitation->id) }}">

                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            Resend
                                                        </button>
                                                    </form>

                                                @elseif($invitation->status == 'accepted')

                                                    <form method="post" action="{{ route('revokeInvitation', $invitation->id) }}">

                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Revoke Role
                                                        </button>
                                                    </form>
                                                @elseif($invitation->status == 'revoked')

                                                    <form method="post" action="{{ route('resendInvitation', $invitation->id) }}">

                                                        {{ csrf_field() }}

                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            Resend
                                                        </button>
                                                    </form>

                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                @else
                                    <h5 class="text-center">
                                        No Invitations have been sent out yet.
                                    </h5>
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
