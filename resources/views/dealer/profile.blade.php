<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gradient Able bootstrap admin template by codedthemes </title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
</head>
<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <div class="mobile-search">
                        <div class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('home') }}">
                        <img class="img-fluid" src="assets/images/logo.png" alt="UNIVAS AUTO CONNECT" />
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                    </ul>
                    <ul class="nav-right">

                        <li class="user-profile header-notification">
                            <a href="#!">
                                <img src="assets/images/avatar-4.jpg" class="img-radius">
                                <span>Logged in as : John Doe - Dealer Account</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">

                                <li>
                                    <a href="user-profile.html">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>

                                <li>
                                    <a href="#!">
                                        <i class="ti-settings"></i> Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ti-layout-sidebar-left"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu" style="margin-top: 5%;">
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="">
                                <a href="{{ route('home') }}">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="active">
                                <a href="{{ route('showDealerProfile') }}">
                                    <span class="pcoded-micon"><i class="ti-user"></i><b>P</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Profile</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="">
                                <a href="index.html">
                                    <span class="pcoded-micon"><i class="ti-settings"></i><b>S</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Settings</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="">
                                <a href="index.html">
                                    <span class="pcoded-micon"><i class="fa fa-money"></i><b>P</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Payments</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">

                                <div class="page-body">
                                    @include('flash::message')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card" style="width: 18rem;">
                                                @if($check_if_profile_exists != false)
                                                    <img src="{{ asset('storage/images/dealers/'.$check_if_profile_exists->user_picture) }}" class="img-thumbnail card-img-top" width="50%" alt="...">
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
                                                                <img class="card-img-top" src="{{ asset('images/word.jpeg') }}" id="kra_pin" alt="Card image cap">
                                                            </div>
                                                            <div class="card-body" style="background-color: lightgrey;">
                                                                <h6 class="card-title">
                                                    <span style="font-weight: bold;">
                                                    KRA PIN
                                                    </span>
                                                                </h6>
                                                                <input type="file" name="kra_pin" onchange="readURL(this, 'kra_pin', 'kraPin', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');" class="form-control-file" id="kraPin">
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
                                                                <input type="file" name="kra_pin" onchange="readURL(this, 'kra_pin', 'kraPin', '{{ \Illuminate\Support\Facades\Auth::user()->id }}');" class="form-control-file" id="kraPin">
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
</div>
</body>

</html>
