@extends('layouts.app-admin')

@section('content')

    <div class="page-body">
        <h2>
            Univas Auto Reports
        </h2>
        <br>
        <br>
        <div class="row">

            <!-- order-card start -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Online Ads</h6>
                        <h2 class="text-right"><i class="ti-check f-left"></i><span></span></h2>
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
                        <h2 class="text-right"><i class="ti-star  f-left"></i><span></span></h2>
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
                        <h2 class="text-right"><i class="Token:21899978270110700783 Units:0.6 Elec:6.07 Charges:3.93: Reciept No PDSLOVS51478186: Tariff Domestic Lifeline: Total All Taxes 1.31: Fuel Index Charge 2.06: Forex Charge 0.12: ERC Charge 0.01: REP Charge 0.29: Inflation Adjustment 0.14ti-reload f-left"></i><span></span></h2>
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
                        <h2 class="text-right"><i class="ti-close f-left"></i><span></span></h2>
                        <p class="m-b-0 float-right" style="color: white;">
                            <a href="{{ route('indexExpiredAds') }}" style="color: white; font-weight: bold;">
                                View Expired Ads
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Financial Management</h6>
                        <h2 class="text-right"><i class="ti-close f-left"></i><span></span></h2>
                        <p class="m-b-0 float-right" style="color: white;">
                            <a href="{{ route('financialReport') }}" style="color: white; font-weight: bold;">
                                Financial Reports
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- order-card end -->

            <!-- tabs card start -->
        </div>
        <!-- tabs card end -->
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
@endsection


