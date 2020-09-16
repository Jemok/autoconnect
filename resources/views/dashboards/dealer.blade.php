@extends('layouts.app-dealer')

@section('content')
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
                                            <a href="{{ route('indexDealerOnlineAds') }}" style="color: white; font-weight: bold;">
                                                My Online Ads
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20">Pending Ads</h6>
                                        <h2 class="text-right"><i class="ti-star f-left"></i><span>{{ $pending_ads_count }}</span></h2>
                                        <p class="m-b-0 float-right" style="color: white;">
                                            <a href="{{ route('indexDealerPendingVerificationAds') }}" style="color: white; font-weight: bold;">
                                                My Pending Ads
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
                                            <a href="{{ route('indexDeclinedAdsForDealer') }}" style="color: white; font-weight: bold;">
                                                My Declined Ads
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
                                            <a href="{{ route('indexExpiredAdsForDealer') }}" style="color: white; font-weight: bold;">
                                                My Expired Ads
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- order-card end -->

                            <!-- social statustic start -->
                            <div class="col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-block text-center">
                                        <i class="ti-layers text-c-blue d-block f-40"></i>
                                        <h4 class="m-t-20">Upload Bulk Ads</h4>
                                        <p class="m-b-20">Upload bulk vehicle Ads here</p>
                                        <a href="{{ route('startBulkUpload') }}" class="btn btn-primary btn-sm btn-round">Start Uploading</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-block text-center">
                                        <i class="ti-car text-c-green d-block f-40"></i>
                                        <h4 class="m-t-20">Upload Single Ad</h4>
                                        <p class="m-b-20">Upload a single vehicle Ad here</p>
                                        <a href="{{ route('createVehicle') }}" class="btn btn-success btn-sm btn-round">Start Uploading</a>
                                    </div>
                                </div>
                            </div>
                            <!-- social statustic end -->
                        </div>

                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <div class="card tabs-card">
                                <div class="card-block p-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#settings_manage_bulk_ads" role="tab"><i class="fa fa-database"></i>Manage Bulk Ads</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="settings_manage_bulk_ads" role="tabpanel">
                                            <div class="table-responsive" style="padding-top: 20px;">
                                                <table class="table table-bordered" id="users-table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Batch #</th>
                                                        <th scope="col">Uploaded On</th>
                                                        <th scope="col">Approval Status</th>
                                                        <th scope="col">View</th>
                                                        <th scope="col">Created At</th>
                                                    </tr>
                                                    </thead>
                                                </table>
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
                ajax: '{!! route('indexBulkAdsDataForDealer') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'approval_status', name: 'approval_status'},
                    { data: 'view', name: 'view'},
                    { data: 'created_at_not_human', name : 'created_at_not_human'}
                ],
                order: [ [4, 'desc'] ]

            });
        });
    </script>
@endsection
