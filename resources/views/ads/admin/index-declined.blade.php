@extends('layouts.app-admin')

@section('content')
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="card-block">
                                    <h5 class="m-b-10">Declined Ads</h5>
                                    <p class="text-muted m-b-10">Manage all declined Ads here</p>

                                    <div class="pull-right">
                                        <a href="{{ route('exportDeclinedAdsExcel') }}" class="btn btn-primary btn-sm">
                                            Export Excel
                                        </a>
                                    </div>

                                    <ul class="breadcrumb-title b-t-default p-t-10">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('adminHome') }}"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ route('indexDeclinedAds') }}">Declined Ads</a>
                                        </li>
                                    </ul>

                                    <div class="table-responsive" style="padding-top: 20px;">
                                        <table class="table table-bordered" id="users-table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Reason</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">View</th>
                                            </tr>
                                            </thead>
                                        </table>
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
                ajax: '{!! route('indexDeclinedAdsData') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'reason', name: 'reason'},
                    { data: 'status', name: 'status'},
                    { data: 'view', name: 'view' }
                ]
            });
        });
    </script>
@endsection

