@extends('layouts.app-dealer')

@section('content')
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header card">
                                    <div class="card-block">
                                        <h5 class="m-b-10">Online Ads</h5>
                                        <p class="text-muted m-b-10">Manage all online Ads here</p>
                                        <ul class="breadcrumb-title b-t-default p-t-10">
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('adminHome') }}"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="{{ route('indexOnlineAds') }}">Online Ads</a>
                                            </li>
                                        </ul>

                                        <div class="table-responsive" style="padding-top: 20px;">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Manage Ad</th>
                                                    <th scope="col">Ad Start</th>
                                                    <th scope="col">Ad Stop</th>
                                                    <th scope="col">Ad Type</th>
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
                                                    <th scope="col">Created At</th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-header end -->
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
                ajax: '{!! route('indexOnlineAdsDataForDealer') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'manage_ad', name: 'manage_ad'},
                    { data: 'ad_start', name: 'ad_start'},
                    { data: 'ad_stop', name: 'ad_stop'},
                    { data: 'ad_type', name: 'ad_type'},
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
                order: [ [13, 'desc'] ]

            });
        });
    </script>
@endsection

