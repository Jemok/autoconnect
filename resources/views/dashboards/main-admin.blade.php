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
                    <div class="pcoded-inner-navbar main-menu" style="margin-top: 5%;">
                        <ul class="pcoded-item pcoded-left-item">
                            <li class="active">
                                <a href="{{ route('adminHome') }}">
                                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
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
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">

                                <div class="page-body">
                                    <div class="row">

                                        <!-- order-card start -->
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card bg-c-blue order-card">
                                                <div class="card-block">
                                                    <h6 class="m-b-20">Online Ads</h6>
                                                    <h2 class="text-right"><i class="ti-check f-left"></i><span>{{ $online_ads_count }}</span></h2>
                                                    <p class="m-b-0 float-right" style="color: white;">
                                                        <a href="{{ route('indexOnlineAds') }}" style="color: white; font-weight: bold;">
                                                            View Online Ads
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card bg-c-green order-card">
                                                <div class="card-block">
                                                    <h6 class="m-b-20">Ads Pending Verification</h6>
                                                    <h2 class="text-right"><i class="ti-star  f-left"></i><span>{{ $bulk_pending_verification_count }}</span></h2>
                                                    <p class="m-b-0 float-right" style="color: white;">
                                                        <a href="{{ route('indexPendingVerificationAds') }}" style="color: white; font-weight: bold;">
                                                            View Pending Ads
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card bg-c-yellow order-card">
                                                <div class="card-block">
                                                    <h6 class="m-b-20">Declined Ads</h6>
                                                    <h2 class="text-right"><i class="ti-reload f-left"></i><span>{{ $declined_ads_count }}</span></h2>
                                                    <p class="m-b-0 float-right" style="color: white;">
                                                        <a href="{{ route('indexDeclinedAds') }}" style="color: white; font-weight: bold;">
                                                            View Declined Ads
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-3">
                                            <div class="card bg-c-pink order-card">
                                                <div class="card-block">
                                                    <h6 class="m-b-20">Expired Ads</h6>
                                                    <h2 class="text-right"><i class="ti-close f-left"></i><span>{{ $expired_ads_count }}</span></h2>
                                                    <p class="m-b-0 float-right" style="color: white;">
                                                        <a href="{{ route('indexExpiredAds') }}" style="color: white; font-weight: bold;">
                                                            View Expired Ads
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- order-card end -->

                                        <!-- tabs card start -->
                                        <div class="col-sm-12">
                                            <div class="card tabs-card">
                                                <div class="card-block p-0">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Upload Bulk Ads</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#settings_manage_bulk_ads" role="tab"><i class="fa fa-database"></i>Manage Bulk Ads</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><i class="ti-user"></i>Dealers</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="ti-eye"></i>Administrators</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content card-block">
                                                        <div class="tab-pane" id="settings3" role="tabpanel">
                                                            <div class="table-responsive">
                                                                <div class="center-block text-center mx-auto">
                                                                    <a href="{{ route('startBulkUpload') }}" class="btn btn-primary btn-lg btn-round">Start Uploading Bulk Ads</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane active" id="settings_manage_bulk_ads" role="tabpanel">
                                                            <div class="table-responsive" style="padding-top: 20px;">
                                                                <table class="table table-bordered" id="users-table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th scope="col">Id</th>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Email</th>
                                                                        <th scope="col">Payment Status</th>
                                                                        <th scope="col">Approval Status</th>
                                                                        <th scope="col">View</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="home3" role="tabpanel">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Dealer #</th>
                                                                        <th>Name</th>
                                                                        <th>Email</th>
                                                                        <th>Phone No.</th>
                                                                        <th>Verification Status</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    @foreach($dealer_roles as $dealer_role)
                                                                        @if(isset($dealer_role->user->name))
                                                                            <tr>
                                                                                <th>{{ $dealer_role->model_id }}</th>
                                                                                <th scope="row">{{ $dealer_role->user->name }}</th>
                                                                                <td>{{  $dealer_role->user->email }}</td>
                                                                                <td>{{ $dealer_role->user->phone_number }}</td>
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
                                                                </table>
                                                            </div>
                                                            <div class="text-center">
                                                                <button class="btn btn-outline-primary btn-round btn-sm">View All</button>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="profile3" role="tabpanel">

                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>Email</th>
                                                                        <th>Role</th>
                                                                        <th>Status</th>
                                                                        <th>Invited At</th>
                                                                        <th>Resend</th>
                                                                    </tr>
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
                                                                </table>
                                                            </div>
                                                            <div class="text-center">
                                                                <button class="btn btn-outline-primary btn-round btn-sm">View All</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tabs card end -->
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
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('indexBulkAdsDataForAdmin') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name'},
                { data: 'email', name: 'email'},
                { data: 'payment_status', name: 'payment_status'},
                { data: 'approval_status', name: 'approval_status' },
                { data: 'view', name: 'view'},
            ]
        });
    });
</script>
</div>
</body>
</html>
