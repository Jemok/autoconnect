@extends('layouts.app-admin')

@section('content')
    <div class="main-body">
        <div class="page-wrapper">

            <div class="page-body">
                <div class="row">

                    <!-- order-card start -->
                    @hasanyrole('super-admin|supervisor-admin')
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
                    @endhasanyrole


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

                    @role('super-admin')
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
                    @endrole

                    @role('super-admin')
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
                    @endrole
                    <!-- order-card end -->

                    <!-- tabs card start -->
                    <div class="col-sm-12">
                        <div class="card tabs-card">
                            <div class="card-block p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    @hasanyrole('super-admin|data-entry-admin')
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Upload Bulk Ads</a>
                                        <div class="slide"></div>
                                    </li>
                                    @endhasanyrole

                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#settings_manage_bulk_ads" role="tab"><i class="fa fa-database"></i>Manage Bulk Ads</a>
                                        <div class="slide"></div>
                                    </li>
                                    @role('super-admin')
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><i class="ti-user"></i>Dealers</a>
                                        <div class="slide"></div>
                                    </li>
                                    @endrole

                                    @role('super-admin')
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="ti-eye"></i>Administrators</a>
                                        <div class="slide"></div>
                                    </li>
                                    @endrole
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content card-block">
                                    @hasanyrole('super-admin|data-entry-admin')
                                    <div class="tab-pane" id="settings3" role="tabpanel">
                                        <div class="table-responsive">
                                            <div class="center-block text-center mx-auto">
                                                <a href="{{ route('startBulkUpload') }}" class="btn btn-primary btn-lg btn-round">Start Uploading Bulk Ads</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endhasanyrole

                                    <div class="tab-pane active" id="settings_manage_bulk_ads" role="tabpanel">
                                        <div class="table-responsive" style="padding-top: 20px;">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Unique Identifier</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Payment Status</th>
                                                    <th scope="col">Payment Method</th>
                                                    <th scope="col">Payment Commitment</th>
                                                    <th scope="col">Approval Status</th>
                                                    <th scope="col">Created At</th>
                                                    <th scope="col">View</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    @role('super-admin')
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
                                    @endrole

                                    @role('super-admin')
                                    <div class="tab-pane" id="profile3" role="tabpanel">

                                        <div class="center-block text-center mx-auto">
                                            <a href="{{ route('createAdministrator') }}" class="btn btn-primary btn-lg btn-round">Add a New Administrator</a>
                                        </div>

                                        <div class="table-responsive" style="margin-top: 2%;">
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
                                            <a href="{{ route('createAdministrator') }}" class="btn btn-outline-primary btn-round btn-sm">View All</a>
                                        </div>
                                    </div>
                                    @endrole

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tabs card end -->
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
                    { data: 'unique_identifier', name: 'unique_identifier'},
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email'},
                    { data: 'payment_status', name: 'payment_status'},
                    { data: 'payment_method', name: 'payment_method'},
                    { data: 'payment_commitment', name: 'payment_commitment'},
                    { data: 'approval_status', name: 'approval_status' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'view', name: 'view'},
                ],
                order: [ [6, 'desc'] ]

            });
        });
    </script>
@endsection
