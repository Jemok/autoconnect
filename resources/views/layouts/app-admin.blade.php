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
<div class="theme-loader">
    <div class="loader-track">
        <div class="loader-bar"></div>
    </div>
</div>
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
                        <img class="img-fluid" src="{{ asset('images/lg4.png') }}" alt="UNIVAS AUTO CONNECT" />
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
                                <span>Logged in as : {{ \Illuminate\Support\Facades\Auth::user()->name }} - Dealer Account</span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">

                                <li>
                                    <a href="{{ route('showDealerProfile') }}">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>

                                {{--                                <li>--}}
                                {{--                                    <a href="#!">--}}
                                {{--                                        <i class="ti-settings"></i> Settings--}}
                                {{--                                    </a>--}}
                                {{--                                </li>--}}

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
                            <li class="{{ url()->current() == env('APP_URL').'admin-home' ? 'active' : ''}}">
                                <a href="{{ route('adminHome') }}">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="{{ url()->current() == env('APP_URL').'reports' ? 'active' : ''}}">
                                <a href="{{ route('indexAllReports') }}">
                                    <span class="pcoded-micon"><i class="ti-clipboard"></i><b>R</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Reports</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                            <li class="{{ url()->current() == env('APP_URL').'mpesa-payments' ? 'active' : ''}}">
                                <a href="{{ route('indexMpesaPayments') }}">
                                    <span class="pcoded-micon"><i class="fa fa-money"></i><b>P</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Payments</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

{{--                            <li class="">--}}
{{--                                <a href="{{ route('indexAccountSettings') }}">--}}
{{--                                    <span class="pcoded-micon"><i class="ti-settings"></i><b>S</b></span>--}}
{{--                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Account Settings</span>--}}
{{--                                    <span class="pcoded-mcaret"></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="">--}}
{{--                                <a href="index.html">--}}
{{--                                    <span class="pcoded-micon"><i class="ti-dashboard"></i><b>S</b></span>--}}
{{--                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">System Settings</span>--}}
{{--                                    <span class="pcoded-mcaret"></span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </nav>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
