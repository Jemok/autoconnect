@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Disapproval Reason</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('setSingleImportAsNotApproved', [$vehicleDetailId, 'not_approved']) }}" method="post">

                                {{ csrf_field() }}

                                <div class="form-group form-check">
                                    <textarea class="form-control {{ $errors->has('reason') ? 'is-invalid' : '' }}" id="reason" name="reason" placeholder="Type the reason here" cols="20" rows="10">{{ old('reason') }}</textarea>

                                    @if($errors->has('reason'))
                                        <div class="invalid-feedback" role="alert">
                                            {{ $errors->first('reason') }}
                                        </div>
                                    @endif
                                </div>



                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Disapprove and Continue
                                    </button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
