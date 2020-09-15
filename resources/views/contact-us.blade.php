@extends('layouts.app')
@section('assets')
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}" xmlns="http://www.w3.org/1999/html">
@endsection
@section('content')
    <div class="container-fluid">

    </div>

{{--    <hr>--}}

{{--    <footer class="footer">--}}
{{--        <div class="container mx-auto text-center">--}}
{{--            <div class="col-md-12 row text-center">--}}
{{--                <div class="col-md-3">--}}
{{--                    <ul style="color: black; list-style: none;">--}}
{{--                        <li class="">--}}
{{--                            <a href="{{ route('showAboutUsPage') }}" style="color: black;">--}}
{{--                                About Us--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="" style="color: black;">--}}
{{--                                Contact Us--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <ul style="color: black; list-style: none;">--}}
{{--                        <li class="">--}}
{{--                            <a href="" style="color: black;">--}}
{{--                                Terms and Conditions--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="{{ env('APP_URL').'sitemap.xml' }}" style="color: black;">--}}
{{--                                Site Map--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <ul style="color: black; list-style: none;">--}}
{{--                        <li class="">--}}
{{--                            <a href="" style="color: black;">--}}
{{--                                Facebook--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="" style="color: black;">--}}
{{--                                Twitter--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}
{{--                    <ul style="color: black; list-style: none;">--}}
{{--                        <li class="">--}}
{{--                            <a href="" style="color: black;">--}}
{{--                                Instagram--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="" style="color: black;">--}}
{{--                                Youtube--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <p class="text-center">--}}
{{--            &copy; {{ \Carbon\Carbon::now()->year }} Univas Auto Connect--}}
{{--        </p>--}}
{{--    </footer>--}}

    @push('scripts')
        <script>
            jQuery(document).ready(function($){
                $('#car_make').change(function(){
                    $.get("{{ url('/api/dropdown')}}",
                        { option: $(this).val() },
                        function(data) {
                            var model = $('#car_model');
                            model.empty();

                            model.append("<option selected value='any_model'>Choose...</option>");

                            $.each(data, function(index, element) {
                                model.append("<option value='"+ element.slug +"'>" + element.name + "</option>");
                            });
                        }
                    );
                });
            });
        </script>
    @endpush
@endsection
