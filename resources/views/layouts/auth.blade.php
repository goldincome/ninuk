<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>@yield('title') - NIN UK</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="msapplication-TileImage" content="{{ asset('favicon.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta name="author" content="NIN UK">
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="NIN UK - An online platform where Nigerians in diaspora (mostly UK) can book appointment to have their NIN registration done"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    @yield('og')

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')

    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://kit.fontawesome.com/841fd16d98.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
    @yield('js')

</head>


<body>
    <noscript id="jsc">
        <div>
            Please enable JavaScript in your browser.
            <span class="d-none d-sm-inline">
                Some functionality will not work if this is disabled.
                <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
            </span>
        </div>
        <div></div>
    </noscript>

    <div class="md:flex min-h-screen bg-black">
        <div class="w-full md:w-2/4 md:min-h-screen overflow-hidden">
            <div class="w-full h-full p-6 pb-10 md:pb-20 bg-cover bg-no-repeat">

                <div class="auth-slideshow max-w-sm m-auto mt-4 md:mt-20">

                    <div class="slideshow-each">
                        <div class="max-w-sm text-center">
                            <div class="w-56 h-56 md:w-64 md:h-64 lg:w-80 lg:h-80 p-6 md:p-8 lg:p-10 mx-auto flex bg-white bg-opacity-5 rounded-xl">
                                <a href="/" class="w-full h-full bg-white bg-opacity-20 m-auto flex rounded-xl shadow-xl">
                                    <div class="w-full h-full px-2 bg-white rounded-xl shadow-xl">
                                        <img src={{asset('img/icons/logo-ninuk-deacil-3.png')}} alt="vho" class="object-contain mx-auto lg:mx-0" />
                                    </div>
                                </a>
                            </div>
                            <div class="mt-4 md:mt-10">
                                <div class=" font-bold text-xl sm:text-2xl md:text-3xl text-white">
                                    Admin access only
                                </div>
                                <div class="mt-3 md:mt-6 text-white text-base font-light">
                                    Manage all appointments & payments on the platform, all in one place.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="w-full md:w-2/4 bg-white">
            @include('includes.flash-messages')
            @yield('content')
        </div>

    </div>
    @yield('js')
</body>
</html>
