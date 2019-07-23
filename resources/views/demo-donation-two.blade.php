<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/aab329d012.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .background-nav{
            background: #9CECFB;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #0052D4, #65C7F7, #9CECFB);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .card-signin {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }
    </style>
    @yield('assets')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ url('/') }}">
            UNHCR DEMO
        </a>
    </nav>

    <div class="container">
        <h2 class="text-center">
            # Demo Donation 2
        </h2>
        <div class="row justify-content-center" style="margin-top: 4%;">
            {{--<iframe src="https://tujengepay.com/collection-link/c596aa60-7c57-11e9-a91d-93ac315e33cf" style="border:0px #ffffff none;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="400px" width="600px" allowfullscreen></iframe>--}}
            <iframe src="https://tujenge.io/iframe-link/c2c4e7d0-7c68-11e9-a170-e1f542bfc6a6" style="border:0px #ffffff none;" name="myiFrame" scrolling="no" frameborder="1" marginheight="0px" marginwidth="0px" height="400px" width="600px" allowfullscreen></iframe>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>