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
        <a class="navbar-brand" href="#">
            UNHCR DEMO
        </a>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="mx-auto" style="margin-top: 4%;">
                <h2>
                    #Demo 1
                </h2>
                <p>
                    Refugees are people just like you. The difference is they have been forced to flee their homes.
                    The numbers of people fleeing their home, their country, has accelerated to a level never seen before. In the past five years no fewer than 15 conflicts – some new, some old – have brought unspeakable tragedy and misery to millions across the world.
                    UNHCR has responded. We have stretched our resources to help more people than ever before. UNHCR is present in all of the world’s conflict hotspots, working around the clock to extend our protection and lifesaving aid to millions.
                    Donate NOW to make a difference and help save lives.
                </p>
                <h4>
                    Donate NOW to make a difference and help save lives.
                </h4>
                <a href="{{ url('demo-donation-page') }}" class="btn btn-block btn-success btn-lg">
                    Donate With Mpesa
                </a>
            </div>

            <div class="mx-auto" style="margin-top: 4%;">
                <h2>
                    #Demo 2
                </h2>
                <p>
                    In Kenya, thousands of refugee youth in the Dadaab and Kakuma refugee camps are unable to go to school because of the lack of resources and funding. They are sitting idle, feeling hopeless and frustrated.

                    This Ramadan you can change this.

                    Join us as we raise funds to increase access to education for refugee youth.

                    With your donation, you can help them not only better themselves but also one day, inshAllah, return home and better their home countries.

                </p>
                <h4>
                    Please give generously today.
                </h4>
                <a href="{{ url('demo-donation-page-2') }}" class="btn btn-block btn-success btn-lg">
                    Donate With Mpesa
                </a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>