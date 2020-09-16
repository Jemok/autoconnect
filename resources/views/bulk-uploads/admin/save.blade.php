@extends('layouts.app-admin')

@section('content')
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="row bs-wizard wizard-second-div">
                                    <div class="col bs-wizard-step disabled">
                                        <div class="text-center bs-wizard-stepnum">
                             <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Download Excel Template
                            </span>
                                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                   <strong>
                                Download Excel Template
                            </strong>
                            </span>
                                        </div>
                                        <div class="progress"><div class="progress-bar"></div></div>
                                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                                    </div>

                                    <div class="col bs-wizard-step"><!-- complete -->
                                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Import Bulk Ads File
                            </span>
                                            <span class="d-none d-md-block d-lg-block d-xl-block">
                               <strong>
                                Import Bulk Ads File
                            </strong>
                            </span>
                                        </div>
                                        <div class="progress" ><div class="progress-bar" style="background-color: black;"></div></div>
                                        <a href="#" class="bs-wizard-dot"></a>
                                    </div>

                                    <div class="col bs-wizard-step disabled"><!-- complete -->
                                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                                Confirmation and Payment
                            </span>
                                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                     Confirmation and Payment
                            </strong>
                            </span>
                                        </div>
                                        <div class="progress"><div class="progress-bar"></div></div>
                                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                                    </div>

                                    <div class="col bs-wizard-step disabled"><!-- active -->
                                        <div class="text-center bs-wizard-stepnum">
                            <span class="d-xs-block d-sm-block d-md-none d-lg-none d-xl-none wizard-small-font">
                              Finish
                            </span>
                                            <span class="d-none d-md-block d-lg-block d-xl-block">
                                 <strong>
                                Finish
                            </strong>
                            </span>
                                        </div>
                                        <div class="progress"><div class="progress-bar"></div></div>
                                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                                    </div>
                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <form  method="POST" action="{{ route('importVehicles') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="card">
                                            <div class="card-block text-center">

                                                <p class="m-b-20" style="margin-top: 4%;">
                                                    Upload Excel File
                                                </p>

                                                <input type="file" name="vehicle_file" class="{{ $errors->has('vehicle_file') ? 'is-invalid' : '' }}">

                                                @if ($errors->has('vehicle_file'))
                                                    <div class="text-danger">
                                                        {{ $errors->first('vehicle_file') }}
                                                    </div>
                                                @endif


                                                <div class="form-group row" style="margin-top: 5%;">
                                                    <label class="col-sm-2 col-form-label">Select User</label>
                                                    <div class="col-sm-10">
                                                        <select name="user" class="form-control">
                                                            <option disabled selected>Select One User Only</option>
                                                            @foreach($dealer_roles as $dealer_role)
                                                                <option value="{{ $dealer_role->user->id }}">{{ $dealer_role->user->name }} - {{ $dealer_role->user->email  }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    @if ($errors->has('user'))
                                                        <div class="text-danger">
                                                            {{ $errors->first('user') }}
                                                        </div>
                                                    @endif
                                                </div>

                                                <button type="submit" class="btn btn-primary btn-lg btn-round" style="margin-top: 8%;">Import and Continue</button>
                                            </div>
                                        </div>
                                    </form>
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
@endsection

