@extends('layouts.app-admin')

@section('content')
    <div class="main-body">
        <div class="page-wrapper">

            <div class="page-body">
                <div class="row">

                    <!-- tabs card start -->
                    <div class="col-sm-12">
                        <div class="card tabs-card">
                            <div class="card-block p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Mpesa Payments</a>
                                        <div class="slide"></div>
                                    </li>
                                    {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link active" data-toggle="tab" href="#settings_manage_bulk_ads" role="tab"><i class="fa fa-database"></i>Manage Bulk Ads</a>--}}
                                    {{--<div class="slide"></div>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" data-toggle="tab" href="#home3" role="tab"><i class="ti-user"></i>Dealers</a>--}}
                                    {{--<div class="slide"></div>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="ti-eye"></i>Administrators</a>--}}
                                    {{--<div class="slide"></div>--}}
                                    {{--</li>--}}
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content card-block">
                                    {{--<div class="tab-pane" id="settings3" role="tabpanel">--}}
                                    {{--<div class="table-responsive">--}}
                                    {{--<div class="center-block text-center mx-auto">--}}
                                    {{--<a href="{{ route('startBulkUpload') }}" class="btn btn-primary btn-lg btn-round">Start Uploading Bulk Ads</a>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="tab-pane active" id="settings_manage_bulk_ads" role="tabpanel">
                                        <div class="table-responsive" style="padding-top: 20px;">
                                            <table class="table table-bordered" id="users-table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">MSISDN</th>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Middle Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Transaction Type</th>
                                                    <th scope="col">Transaction Id</th>
                                                    <th scope="col">Transaction Time</th>
                                                    <th scope="col">Transaction Amount</th>
                                                    <th scope="col">Business Short Code</th>
                                                    <th scope="col">Bill Ref Number</th>
                                                    <th scope="col">Invoice Number</th>
                                                    <th scope="col">Org Account Balance</th>
                                                    <th scope="col">Internal Transaction Id</th>
                                                    <th scope="col">Created At</th>
                                                    <th scope="col">Updated At</th>
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
                ajax: '{!! route('getAllMpesaPayments') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'msisdn', name: 'msisdn'},
                    { data: 'first_name', name: 'first_name'},
                    { data: 'middle_name', name: 'middle_name'},
                    { data: 'last_name', name: 'last_name'},
                    { data: 'transaction_type', name: 'transaction_type'},
                    { data: 'trans_id', name: 'trans_id'},
                    { data: 'trans_time', name: 'trans_time'},
                    { data: 'trans_amount', name: 'trans_amount'},
                    { data: 'business_short_code', name: 'business_short_code'},
                    { data: 'bill_ref_number', name: 'bill_ref_number'},
                    { data: 'invoice_number', name: 'invoice_number' },
                    { data: 'org_account_balance', name: 'org_account_balance'},
                    { data: 'internal_transaction_id', name: 'internal_transaction_id'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'updated_at', name: 'updated_at'},
                ],

                order: [ [6, 'desc'] ]
            });
        });
    </script>
@endsection


