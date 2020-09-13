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
        .ul-inline-landing{
            display: inline;
            padding: 10px;
            margin-left: -20px;
        }

        .color-black{
            color: black!important;
        }

        .nav-phone-text{
            color: black;
            font-weight: bold;
        }

        .nav-phone-small{
            color: black;
            font-weight: bold;
            font-size: 14px;
        }

        .inline-display{
            display: inline;
        }

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
    <nav class="navbar navbar-expand-lg navbar-light background-nav" style="height: 20px; padding-top: 25px;">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="tel:+25472174479">
                        <i class="fa fa-phone"></i>
                        Call : +25472174479
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="mailto:info@univasauto.com">
                        <i class="fa fa-envelope-open"></i>
                        Email : info@univasauto.com
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="https://fb.me/UnivasMedia">
                        <i class="fa fa-facebook"></i>
                        Facebook
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://twitter.com/UnivasM">
                        <i class="fa fa-twitter"></i>
                        Twitter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-youtube-square"></i>
                        Youtube
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.instagram.com/univasmedia">
                        <i class="fa fa-instagram"></i>
                        Instagram
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://wa.me/+254723874598?text=Hi">
                        <i class="fa fa-whatsapp"></i>
                        WhatsApp (+254723874598)
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel background-nav">
        <div class="container">

            @if(Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}" style="margin-top: -2%;">
                    {{--{{ config('app.name', 'Univas Auto Connect') }}--}}
                    {{--                    <img alt="Univas Auto Connect" src="{{ asset('images/univas-real.png') }}">--}}
                    <img alt="Univas Auto Connect" src="{{ asset('images/lg4.png') }}">

                    <p style="font-size: xx-small;">Your Ultimate Online Car Market</p>
                </a>
            @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Dashboard
                </a>
            @endif

            <ul class="navbar-nav">
{{--                <li class="nav-item d-none d-lg-block d-xl-block nav-phone-li" style="margin-left: 60px;">--}}
{{--                    <a href="{{ url('vehicles/create') }}" class="nav-link nav-phone-text color-black btn" style="background-color: black;">--}}
{{--                        Sell Your Car Now--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>

            <ul class="navbar-nav yellow_line">

                <li class="nav-item d-none d-lg-block d-xl-block nav-phone-li" style="margin-left: 60px;">
                    <a href="{{ url('vehicles/create') }}" class="nav-link nav-phone-text color-black btn" style="background-color: black; color: white!important;">
                        Sell Your Car Now
                    </a>
                </li>

                <li class="nav-item d-none d-lg-block d-xl-block nav-phone-li" style="margin-left: 60px;">
                    <a href="{{ url('login') }}" class="nav-link nav-phone-text color-black">
                        Sign in
                    </a>
                </li>

                <li class="nav-item d-none d-lg-block d-xl-block nav-phone-li">
                    <a href="{{ url('register') }}" class="nav-link nav-phone-text color-black">
                        Create account
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav d-lg-none d-xl-none yellow_line ul-inline-landing">
                <li class="nav-item d-lg-none inline-display">
                    <a  href="{{ url('vehicles/create') }}" class="nav-phone-small btn" style="background-color: black; color: white!important;">
                        Sell Your Car Now
                    </a>
                </li>

                <li class="nav-item d-lg-none inline-display">
                    <a href="{{ url('login') }}" class="nav-phone-small">
                         Sign In |
                    </a>
                </li>

                <li class="nav-item d-lg-none inline-display">
                    <a href="{{ url('register') }}" class="nav-phone-small">
                        Create Account
                    </a>
                </li>
            </ul>


            {{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--                <span class="navbar-toggler-icon"></span>--}}
            {{--            </button>--}}

            {{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
            {{--                <!-- Left Side Of Navbar -->--}}
            {{--                <ul class="navbar-nav mr-auto">--}}
            {{--                    <li class="nav-item">--}}
            {{--                        <a class="nav-link" href="{{ route('createVehicle') }}" style="color:  black;">--}}
            {{--                            <span style="font-weight: bolder;">--}}
            {{--                                Sell Your Car Now--}}
            {{--                            </span>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}

            {{--                <!-- Right Side Of Navbar -->--}}
            {{--                <ul class="navbar-nav ml-auto">--}}
            {{--                    <!-- Authentication Links -->--}}
            {{--                    @guest--}}
            {{--                    <li class="nav-item">--}}
            {{--                        <a class="nav-link" href="{{ route('login') }}" style="color:  black;">--}}
            {{--                            <span style="font-weight: bold;">--}}
            {{--                            Sign In--}}
            {{--                            </span>--}}
            {{--                        </a>--}}
            {{--                    </li>--}}

            {{--                    @if(url()->current() != env('APP_URL').'/register')--}}
            {{--                        <li class="nav-item">--}}
            {{--                            <a class="nav-link" href="{{ route('register') }}" style="color:  black;">--}}
            {{--                                <span style="font-weight: bold;">--}}
            {{--                                Get a dealer account--}}
            {{--                                </span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                    @endif--}}

            {{--                    @else--}}
            {{--                        <li class="nav-item dropdown">--}}
            {{--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
            {{--                                {{ Auth::user()->name }} <span class="caret"></span>--}}
            {{--                            </a>--}}

            {{--                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
            {{--                                <a class="dropdown-item" href="{{ route('logout') }}"--}}
            {{--                                   onclick="event.preventDefault();--}}
            {{--                                                     document.getElementById('logout-form').submit();">--}}
            {{--                                    {{ __('Logout') }}--}}
            {{--                                </a>--}}

            {{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
            {{--                                    @csrf--}}
            {{--                                </form>--}}
            {{--                            </div>--}}
            {{--                        </li>--}}
            {{--                        @endguest--}}
            {{--                </ul>--}}
            {{--            </div>--}}
        </div>
    </nav>

    <main class="">
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}@stack('scripts')
<!--Start of Tawk.to Script-->
{{--<script type="text/javascript">--}}
{{--    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();--}}
{{--    (function(){--}}
{{--        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];--}}
{{--        s1.async=true;--}}
{{--        s1.src='https://embed.tawk.to/5ae6bbf5227d3d7edc24d543/1da8cdb80';--}}
{{--        s1.charset='UTF-8';--}}
{{--        s1.setAttribute('crossorigin','*');--}}
{{--        s0.parentNode.insertBefore(s1,s0);--}}
{{--    })();--}}
{{--</script>--}}
{{--<!--End of Tawk.to Script-->--}}
</body>
</html>
