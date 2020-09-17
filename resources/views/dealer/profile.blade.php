@extends('layouts.app-dealer')
@section('content')

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        @include('flash::message')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card" style="width: 18rem;">
                                    @if($check_if_profile_exists != false)
                                        @if($check_if_profile_exists->user_picture != null)
                                        <img src="{{ asset('storage/images/dealers/'.$check_if_profile_exists->user_picture) }}" class="img-thumbnail card-img-top" width="50%" alt="...">
                                        @else
                                            <img src="{{ asset('images/dealers/dealer.png') }}" class="card-img-top" alt="...">
                                        @endif
                                    @else
                                        <img src="{{ asset('images/dealers/dealer.png') }}" class="card-img-top" alt="...">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">Upload your logo</h5>
                                        <form method="post" enctype="multipart/form-data" action="{{ route('uploadDealerProfile') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <input type="file" name="profile_picture" class="form-control">
                                                </div>

                                                <div class="mx-auto" style="padding-top: 2%;">
                                                    <button class="btn btn-info" type="submit">
                                                        Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2>
                                    Profile Details
                                </h2>

                                @if(isset( \Illuminate\Support\Facades\Auth::user()->user_profile->business_name))
                                    <form method="post" action="{{ route('updateDealerProfile') }}">

                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" aria-describedby="nameHelp" value="{{ old('name') != null ? old('name') : \Illuminate\Support\Facades\Auth::user()->name  }}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" id="phone_number" value="{{ old('phone_number') != null ? old('phone_number') : \Illuminate\Support\Facades\Auth::user()->user_profile->phone_number }}">
                                            @if ($errors->has('phone_number'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Business Address</label>
                                            <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" aria-describedby="addressHelp" value="{{ old('address') != null ? old('address') : \Illuminate\Support\Facades\Auth::user()->user_profile->address }}">
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="business_name">Business Name</label>
                                            <input type="text" name="business_name" class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}" id="business_name" aria-describedby="businessNameHelp" value="{{ old('business_name') != null ? old('business_name') : \Illuminate\Support\Facades\Auth::user()->user_profile->business_name }}">
                                            @if ($errors->has('business_name'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('business_name') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="business_registration_number">Business Registration Number</label>
                                            <input type="text" name="business_registration_number" class="form-control{{ $errors->has('business_registration_number') ? ' is-invalid' : '' }}" id="business_registration_number" aria-describedby="businessRegistrationNumberHelp" value="{{ old('business_registration_number') != null ? old('business_registration_number') : \Illuminate\Support\Facades\Auth::user()->user_profile->business_registration_number }}">
                                            @if ($errors->has('business_registration_number'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('business_registration_number') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="kra_pin">KRA PIN</label>
                                            <input type="text" name="kra_pin" class="form-control{{ $errors->has('kra_pin') ? ' is-invalid' : '' }}" id="kra_pin" aria-describedby="kraPinHelp" value="{{ old('kra_pin') != null ? old('kra_pin') : \Illuminate\Support\Facades\Auth::user()->user_profile->kra_pin }}">
                                            @if ($errors->has('kra_pin'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('kra_pin') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                        <h5>
                                            ONLY IMAGES SUPPORTED
                                        </h5>

                                        <div class="col-sm-12">
                                            <div class="card" style="border: none;">
                                                <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                    <img class="card-img-top" src="{{ asset('images/word.jpeg') }}" id="business_registration_certificate" alt="Card image cap">
                                                </div>
                                                <div class="card-body" style="background-color: lightgrey;">
                                                    <h6 class="card-title">
                                                    <span style="font-weight: bold;">
                                                        Business Registration Certificate
                                                    </span>
                                                    </h6>
                                                    <input type="file" name="business_registration_certificate"  onchange="readURL(this, 'business_registration_certificate', 'businessRegistrationCertificate', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');"  class="form-control-file" id="businessRegistrationCertificate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="card" style="border: none;">
                                                <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                    <img class="card-img-top" src="{{ asset('images/word.jpeg') }}" id="kra_pin_doc" alt="Card image cap">
                                                </div>
                                                <div class="card-body" style="background-color: lightgrey;">
                                                    <h6 class="card-title">
                                                    <span style="font-weight: bold;">
                                                    KRA PIN
                                                    </span>
                                                    </h6>
                                                    <input type="file" name="kra_pin_doc" onchange="readURL(this, 'kra_pin_doc', 'kraPin', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');" class="form-control-file" id="kraPinDoc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="card" style="border: none;">
                                                <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                    <img class="card-img-top" src="{{ asset('images/word.jpeg') }}" id="cr_12" alt="Card image cap">
                                                </div>
                                                <div class="card-body" style="background-color: lightgrey;">
                                                    <h6 class="card-title">
                                                    <span style="font-weight: bold;">
                                                    CR 12
                                                    </span>
                                                    </h6>
                                                    <input type="file" name="left" onchange="readURL(this, 'cr_12', 'cr12', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');" class="form-control-file" id="cr12">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                @else
                                    <form method="post" action="{{ route('updateDealerProfile') }}">

                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" aria-describedby="nameHelp" value="{{ old('name') != null ? old('name') : \Illuminate\Support\Facades\Auth::user()->name  }}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" id="phone_number" value="{{ old('phone_number') != null ? old('phone_number') : \Illuminate\Support\Facades\Auth::user()->phone_number }}">
                                            @if ($errors->has('phone_number'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Business Address</label>
                                            <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" aria-describedby="addressHelp" value="{{ old('address') != null ? old('address') : '' }}">
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="business_name">Business Name</label>
                                            <input type="text" name="business_name" class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}" id="business_name" aria-describedby="businessNameHelp" value="{{ old('business_name') != null ? old('business_name') : '' }}">
                                            @if ($errors->has('business_name'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('business_name') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="business_registration_number">Business Registration Number</label>
                                            <input type="text" name="business_registration_number" class="form-control{{ $errors->has('business_registration_number') ? ' is-invalid' : '' }}" id="business_registration_number" aria-describedby="businessRegistrationNumberHelp" value="{{ old('business_registration_number') != null ? old('business_registration_number') : '' }}">
                                            @if ($errors->has('business_registration_number'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('business_registration_number') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="kra_pin">KRA PIN</label>
                                            <input type="text" name="kra_pin" class="form-control{{ $errors->has('kra_pin') ? ' is-invalid' : '' }}" id="kra_pin" aria-describedby="kraPinHelp" value="{{ old('kra_pin') != null ? old('kra_pin') : '' }}">
                                            @if ($errors->has('kra_pin'))
                                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('kra_pin') }}</strong>
                                                        </span>
                                            @endif
                                        </div>

                                        <h5>
                                            ONLY IMAGES SUPPORTED
                                        </h5>

                                        <div class="col-sm-12">
                                            <div class="card" style="border: none;">
                                                <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                    <img class="card-img-top" src="{{ asset('images/word.jpeg') }}" id="business_registration_certificate" alt="Card image cap">
                                                </div>
                                                <div class="card-body" style="background-color: lightgrey;">
                                                    <h6 class="card-title">
                                                    <span style="font-weight: bold;">
                                                        Business Registration Certificate
                                                    </span>
                                                    </h6>
                                                    <input type="file" name="business_registration_certificate"  onchange="readURL(this, 'business_registration_certificate', 'businessRegistrationCertificate', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');"  class="form-control-file" id="businessRegistrationCertificate">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="card" style="border: none;">
                                                <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                    <img class="card-img-top" src="{{ asset('images/word.jpeg') }}" id="kra_pin" alt="Card image cap">
                                                </div>
                                                <div class="card-body" style="background-color: lightgrey;">
                                                    <h6 class="card-title">
                                                    <span style="font-weight: bold;">
                                                    KRA PIN
                                                    </span>
                                                    </h6>
                                                    <input type="file"  onchange="readURL(this, 'kra_pin', 'kraPin', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');" class="form-control-file" id="kraPin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="card" style="border: none;">
                                                <div style="height: 120px; width: 210px; overflow: hidden;" class="mx-auto">
                                                    <img class="card-img-top" src="{{ asset('images/word.jpeg') }}" id="cr_12" alt="Card image cap">
                                                </div>
                                                <div class="card-body" style="background-color: lightgrey;">
                                                    <h6 class="card-title">
                                                    <span style="font-weight: bold;">
                                                    CR 12
                                                    </span>
                                                    </h6>
                                                    <input type="file" name="left" onchange="readURL(this, 'cr_12', 'cr12', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');" class="form-control-file" id="cr12">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('js/modernizr/modernizr.js') }}"></script>
    <!-- am chart -->
    <script src="{{ asset('js/amchart/amcharts.min.js') }}"></script>
    <script src="{{ asset('js/amchart/serial.min.js') }}"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="{{ asset('js/Chart.js') }}"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="{{ asset('js/todo.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('js/custom-dashboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript " src="{{ asset('js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/vartical-demo.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script>

        $('#flash-overlay-modal').modal();

        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('indexBulkAdsDataForDealer') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'approval_status', name: 'approval_status'},
                    { data: 'view', name: 'view'},
                ]
            });
        });
    </script>
    <script src="{{ asset('js/file-uploader-1.js') }}"></script>
@endsection

