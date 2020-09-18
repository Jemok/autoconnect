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
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
</head>
<body>
<div class="fixed-button">
    <a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
    </a>
</div>
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
                    <a href="{{ route('adminHome') }}">
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
                                <span>Logged in as : Super Admin - Admin Account</span>
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
                                        <i class="ti-settings"></i> Account Settings
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
                    <div class="pcoded-inner-navbar main-menu">
                        <ul class="pcoded-item pcoded-left-item">
                            <li>
                                @if(Auth::user()->hasRole('super-admin'))
                                    <a href="{{ route('adminHome') }}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                @endif
                                    @if(Auth::user()->hasRole('dealer'))
                                        <a href="{{ route('home') }}">
                                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    @endif
                            </li>

                            <li class="">
                                <a href="index.html">
                                    <span class="pcoded-micon"><i class="ti-clipboard"></i><b>R</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Reports</span>
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

                            <li class="">
                                <a href="index.html">
                                    <span class="pcoded-micon"><i class="ti-settings"></i><b>S</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Account Settings</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="">
                                <a href="index.html">
                                    <span class="pcoded-micon"><i class="ti-dashboard"></i><b>S</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">System Settings</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="pcoded-content">
                    @include('flash::message')

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif

                    <div class="pcoded-inner-content">
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

                                    <div class="col bs-wizard-step disabled"><!-- complete -->
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
                                        <div class="progress" ><div class="progress-bar"></div></div>
                                        <a href="#" class="bs-wizard-dot" style="background-color: lightgrey;"></a>
                                    </div>

                                    <div class="col bs-wizard-step"><!-- complete -->
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
                                        <a href="#" class="bs-wizard-dot"></a>
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

                            </div>

                            <div class="row">
                                <div class="table-responsive">
                                    <form method="POST" action="{{ route('storeBulkVehicle', [$bulk_import->id]) }}">
                                        {{ csrf_field() }}
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <div class="col">
                                                        <label for="car_make" style="font-weight: bold;">Make*</label>
                                                        <select style="width: 150px;" name="car_make" id="car_make" class="form-control {{ $errors->has('car_make') ? 'is-invalid' : '' }}" >
                                                            <option selected disabled>Choose a Make</option>
                                                            @foreach($car_makes_for_search as $car_make)
                                                                @if(old('car_make') == $car_make->slug)
                                                                    <option selected value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                                                @else
                                                                    <option value="{{ $car_make->slug }}">{{ $car_make->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('car_make'))
                                                            <small id="carMakeHelp" class="form-text text-danger">
                                                                {{ $errors->first('car_make') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td width="2000">
                                                    <div class="col">
                                                        <label for="car_model" style="font-weight: bold;">Model*</label>
                                                        <select style="width: 150px;"  name="car_model" id="car_model" class="form-control {{ $errors->has('car_model') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose a Model</option>
                                                            @foreach($car_models as $car_model)
                                                                @if(old('car_model') == $car_model->slug)
                                                                    <option selected value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                                                @else
                                                                    <option value="{{ $car_model->slug }}">{{ $car_model->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('car_model'))
                                                            <small id="carModelHelp" class="form-text text-danger">
                                                                {{ $errors->first('car_model') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="car_series" style="font-weight: bold;">Series</label>
                                                        <select style="width: 150px;"  name="car_series" id="car_series" class="form-control">
                                                            <option selected disabled>Choose a Series</option>
                                                            {{--<option></option>--}}
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="year" style="font-weight: bold;">Year*</label>
                                                        <select style="width: 150px;"  name="year"  id="year" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" required>
                                                            <option selected disabled>Choose...</option>
                                                            @for($next_year; $next_year >= $start_year; $next_year--)
                                                                @if(old('year') == $next_year)
                                                                    <option selected value="{{ $next_year }}">{{ $next_year }}</option>
                                                                @else
                                                                    <option value="{{ $next_year }}">{{ $next_year }}</option>
                                                                @endif
                                                            @endfor
                                                        </select>
                                                        @if($errors->has('year'))
                                                            <small id="yearHelp" class="form-text text-danger">
                                                                {{ $errors->first('year') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="mileage" style="font-weight: bold;">Mileage (km) *</label>
                                                        <input type="number" name="mileage" id="mileage" class="form-control {{ $errors->has('mileage') ? 'is-invalid' : '' }}" value="{{ old('mileage') }}" placeholder="">
                                                        @if ($errors->has('mileage'))
                                                            <small id="mileage" class="form-text text-danger">
                                                                {{ $errors->first('mileage') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="body_type" style="font-weight: bold;">Body Type *</label>
                                                        <select style="width: 150px;"  name="body_type" id="body_type" class="form-control {{ $errors->has('body_type') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($body_types as $body_type)
                                                                @if(old('body_type') == $body_type->slug)
                                                                    <option selected value="{{ $body_type->slug }}">{{ $body_type->description }}</option>
                                                                @else
                                                                    <option value="{{ $body_type->slug }}">{{ $body_type->description }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('body_type'))
                                                            <small id="bodyTypeHelp" class="form-text text-danger">
                                                                {{ $errors->first('body_type') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="transmission_type" style="font-weight: bold;">Transmission Type *</label>
                                                        <select style="width: 150px;"  name="transmission_type" id="transmission_type" class="form-control {{ $errors->has('transmission_type') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($transmission_types as $transmission_type)
                                                                @if(old('transmission_type') == $transmission_type->slug)
                                                                    <option selected value="{{ $transmission_type->slug }}">{{ $transmission_type->description }}</option>
                                                                @else
                                                                    <option  value="{{ $transmission_type->slug }}">{{ $transmission_type->description }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('transmission_type'))
                                                            <small id="transmissionTypeHelp" class="form-text text-danger">
                                                                {{ $errors->first('transmission_type') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="condition" style="font-weight: bold;">Condition *</label>
                                                        <select style="width: 150px;"  name="car_condition" id="condition" class="form-control {{ $errors->has('car_condition') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($car_conditions as $car_condition)
                                                                @if(old('car_condition') == $car_condition->slug)
                                                                    <option selected value="{{ $car_condition->slug }}">{{ $car_condition->description }}</option>
                                                                @else
                                                                    <option value="{{ $car_condition->slug }}">{{ $car_condition->description }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('car_condition'))
                                                            <small id="carConditionHelp" class="form-text text-danger">
                                                                {{ $errors->first('car_condition') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="duty" style="font-weight: bold;">Duty *</label>
                                                        <select style="width: 150px;"  name="duty" id="duty" class="form-control {{ $errors->has('duty') ? 'is-invalid' : '' }}">
                                                            <option selected disabled="">Choose...</option>
                                                            @foreach($duties as $duty)
                                                                @if(old('duty') == $duty->slug)
                                                                    <option selected value="{{ $duty->slug }}">{{ $duty->description }}</option>
                                                                @else
                                                                    <option value="{{ $duty->slug }}">{{ $duty->description }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('duty'))
                                                            <small id="dutyHelp" class="form-text text-danger">
                                                                {{ $errors->first('duty') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="price" style="font-weight: bold;">Price (KSH) *</label>
                                                        <input type="number" name="price" id="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" value="{{ old('price') }}" placeholder="">
                                                        @if($errors->has('duty'))
                                                            <small id="priceHelp" class="form-text text-danger">
                                                                {{ $errors->first('price') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input {{ $errors->has('negotiable_price') ? 'is-invalid' : '' }}" name="negotiable_price" type="checkbox" value="allowed" id="negotiable_price">
                                                            <label class="form-check-label" for="negotiable_price" style="font-weight: bold;">
                                                                Price is negotiable
                                                            </label>
                                                            @if($errors->has('negotiable_price'))
                                                                <small id="negotiablePriceHelp" class="form-text text-danger">
                                                                    {{ $errors->first('negotiable_price') }}
                                                                </small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="fuel_type" style="font-weight: bold;">Fuel Type</label>
                                                        <select style="width: 150px;"  name="fuel_type" id="fuel_type" class="form-control {{ $errors->has('fuel_type') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($fuel_types as $fuel_type)
                                                                @if(old('fuel_type') == $duty->slug)
                                                                    <option selected value="{{ $fuel_type->slug }}">{{ $fuel_type->description }}</option>
                                                                @else
                                                                    <option value="{{ $fuel_type->slug }}">{{ $fuel_type->description }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('fuel_type'))
                                                            <small id="fuelTypeHelp" class="form-text text-danger">
                                                                {{ $errors->first('fuel_type') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="engine_size" style="font-weight: bold;">Engine size (cc)</label>
                                                        <input type="text" id="engine_size" name="engine_size" class="form-control {{ $errors->has('engine_size') ? 'is-invalid' : '' }}" value="{{ old('engine_size') }}" placeholder="">
                                                        @if($errors->has('engine_size'))
                                                            <small id="engineSizeHelp" class="form-text text-danger">
                                                                {{ $errors->first('engine_size') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="interior" style="font-weight: bold;">Interior</label>
                                                        <select style="width: 150px;"  name="interior" id="interior" class="form-control {{ $errors->has('interior') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($interiors as $interior)
                                                                @if(old('interior') == $duty->slug)
                                                                    <option selected value="{{ $interior->slug }}">{{ $interior->description }}</option>
                                                                @else
                                                                    <option value="{{ $interior->slug }}">{{ $interior->description }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('interior'))
                                                            <small id="interiorHelp" class="form-text text-danger">
                                                                {{ $errors->first('interior') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col">
                                                        <label for="colour_type" style="font-weight: bold;">Colour Type*</label>
                                                        <select style="width: 150px;"  name="colour_type" id="colour_type" class="form-control {{ $errors->has('colour_type') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($colour_types as $colour_type)
                                                                @if(old('colour_type') == $duty->slug)
                                                                    <option selected  value="{{ $colour_type->slug }}">
                                                                        {{ $colour_type->description }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $colour_type->slug }}">
                                                                        {{ $colour_type->description }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('colour_type'))
                                                            <small id="colourTypeHelp" class="form-text text-danger">
                                                                {{ $errors->first('colour_type') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="col">
                                                        <label for="drive_setup" style="font-weight: bold;">Drive Setup*</label>
                                                        <select style="width: 150px;"  name="drive_setup" id="drive_setup" class="form-control {{ $errors->has('drive_setup') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($drive_setups as $drive_setup)
                                                                @if(old('drive_setup') == $drive_setup->slug)
                                                                    <option selected  value="{{ $drive_setup->slug }}">
                                                                        {{ $drive_setup->description }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $drive_setup->slug }}">
                                                                        {{ $drive_setup->description }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('drive_setup'))
                                                            <small id="driveSetUpHelp" class="form-text text-danger">
                                                                {{ $errors->first('drive_setup') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="col">
                                                        <label for="drive_type" style="font-weight: bold;">Drive Type*</label>
                                                        <select style="width: 150px;"  name="drive_type" id="drive_type" class="form-control {{ $errors->has('drive_type') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @foreach($drive_types as $drive_type)
                                                                @if(old('drive_type') == $drive_type->slug)
                                                                    <option selected  value="{{ $drive_type->slug }}">
                                                                        {{ $drive_type->description }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $drive_type->slug }}">
                                                                        {{ $drive_type->description }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('drive_type'))
                                                            <small id="driveTypeHelp" class="form-text text-danger">
                                                                {{ $errors->first('drive_type') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label for="inputState" style="font-weight: bold;">Area/City*</label>
                                                            <select name="area" id="inputState" class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}">
                                                                <option selected disabled>Choose...</option>
                                                                @foreach($areas as $area)
                                                                    @if(old('area') == $area->id)
                                                                        <option selected="selected" value="{{ $area->id }}">{{ $area->name }}</option>
                                                                    @elseif(!empty($vehicle_detail->vehicle_contact->area_id))
                                                                        @if($vehicle_detail->vehicle_contact->area_id == $area->id)
                                                                            <option selected value="{{ $vehicle_detail->vehicle_contact->area_id }}">{{ $area->name  }}</option>
                                                                        @else
                                                                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                                        @endif
                                                                    @else
                                                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('area'))
                                                                <small id="areHelp" class="form-text text-danger">
                                                                    {{ $errors->first('area') }}
                                                                </small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div class="col">
                                                        <label for="package_type" style="font-weight: bold;">Ad Package Type*</label>
                                                        <select style="width: 150px;"  name="package_type" id="package_type" class="form-control {{ $errors->has('package_type') ? 'is-invalid' : '' }}">
                                                            <option selected disabled>Choose...</option>
                                                            @if(old('package_type') == 'standard')
                                                                <option selected  value="standard">
                                                                    Standard
                                                                </option>
                                                            @elseif(old('package_type') == 'premium')
                                                                <option value="premium">
                                                                    Premium
                                                                </option>
                                                            @endif

                                                            <option value="standard">
                                                                Standard
                                                            </option>

                                                            <option value="premium">
                                                                Premium
                                                            </option>
                                                        </select>
                                                        @if($errors->has('package_type'))
                                                            <small id="packageTypeHelp" class="form-text text-danger">
                                                                {{ $errors->first('package_type') }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                                                        Add a description
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Add a description for this car</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="col">
                                                                        <label for="description" style="font-weight: bold;">Description </label>
                                                                        <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" name="description" rows="10" cols="15">{{ old('description') }}</textarea>
                                                                        @if($errors->has('description'))
                                                                            <small id="descriptionHelp" class="form-text text-danger">
                                                                                {{ $errors->first('description') }}
                                                                            </small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        Add Other Car Features
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Select car features</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div style="padding-left: 2%;">
                                                                        <div class="form-row">
                                                                            @foreach($vehicle_features as $vehicle_feature)
                                                                                <div class="form-group col-md-3">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input" type="checkbox" name="{{ $vehicle_feature->slug }}" value="{{ $vehicle_feature->slug }}" id="{{ $vehicle_feature->slug }}">
                                                                                        <label class="form-check-label" for="gridCheck" style="font-weight: bold; font-size: 10px;">
                                                                                            {{ $vehicle_feature->description }}
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-success btn-lg float-right">
                                                            <i class="fa fa-check"></i>
                                                            Next
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>

                            </div>


                            <!-- Page-header start -->
                            <div class="page-header card">
                                <div class="card-block">
                                    <h5 class="m-b-10">Uploaded Ads</h5>

                                    <a href="{{ route('showBulkPaymentsPage', $bulkImportId) }}" class="btn btn-primary pull-right">
                                        Proceed To Pay
                                    </a>

                                    <p class="text-muted m-b-10">Manage all online Ads here</p>
                                    <ul class="breadcrumb-title b-t-default p-t-10">
                                        @if(Auth::user()->hasRole('super-admin'))
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('adminHome') }}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                        @endif
                                        @if(Auth::user()->hasRole('dealer'))
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('home') }}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                        @endif
                                        <li class="breadcrumb-item"><a href="{{ route('indexOnlineAds') }}">Online Ads</a>
                                        </li>
                                    </ul>

                                    <div class="table-responsive" style="padding-top: 20px;">
                                        <table class="table table-bordered" id="users-table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Images Uploaded</th>
                                                <th scope="col">Upload Images</th>
                                                <th scope="col">Verified</th>
                                                <th scope="col">Make</th>
                                                <th scope="col">Model</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Mileage</th>
                                                <th scope="col">Body Type</th>
                                                <th scope="col">Transmission Type</th>
                                                <th scope="col">Car Condition</th>
                                                <th scope="col">Duty</th>
                                                <th scope="col">Price (KES)</th>
                                                <th scope="col">Negotiable Price</th>
                                                <th scope="col">Updated At</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Page-header end -->
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
    <script>
        $('#flash-overlay-modal').modal();

        jQuery(document).ready(function($){
            $('#car_make').change(function(){
                $.get("{{ url('/api/dropdown')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('#car_model');
                        model.empty();

                        model.append("<option selected disabled>Choose a Model</option>");

                        $.each(data, function(index, element) {
                            model.append("<option value='"+ element.slug +"'>" + element.name + "</option>");
                        });
                    }
                );
            });


            $('#car_model').change(function(){
                $.get("{{ url('/api/dropdown-series')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('#car_series');
                        model.empty();

                        model.append("<option selected disabled>Choose a Series</option>");

                        $.each(data, function(index, element) {
                            model.append("<option value='"+ element.slug +"'>" + element.name + "</option>");
                        });
                    }
                );
            });
        });
    </script>
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('indexBulkUploadImportsData', [$bulkImportId]) !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'edit', name: 'edit' },
                    { data: 'images_uploaded', name : 'images_uploaded'},
                    { data: 'upload_images', name : 'upload_images'},
                    { data: 'verified', name : 'verified'},
                    { data: 'car_make', name: 'car_make'},
                    { data: 'car_model', name: 'car_model'},
                    { data: 'year', name: 'year' },
                    { data: 'mileage', name: 'mileage'},
                    { data: 'body_type', name: 'body_type'},
                    { data: 'transmission_type', name: 'transmission_type'},
                    { data: 'car_condition', name: 'car_condition'},
                    { data: 'duty', name: 'duty' },
                    { data: 'price', name: 'price' },
                    { data: 'negotiable', name : 'negotiable'},
                    { data: 'created_at', name : 'created_at'},
                ],
                order: [ [15, 'desc'] ]

            });
        });
    </script>
</div>
</body>
</html>
