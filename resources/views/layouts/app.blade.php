<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/feather.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-custom.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/air-slider/air-slider.css') }}" rel="stylesheet">
</head>

<body style="font-family: Nunito">
    <div id="app" class="max-w-screen">
        
        @include('sweetalert::alert')
        @include('layouts/topnav')
        <main class="">
            @yield('content')
        </main>
        @include('layouts/footer')
    </div>

    @stack('modals')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('components/js-stacks')
    @stack('js-pages')
</body>

</html>
