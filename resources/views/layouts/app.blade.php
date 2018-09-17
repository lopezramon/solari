<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimun-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pizzeria Da Adriano') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('images/home/favicon.png')}}"/>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Playfair+Display:400,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script> --}}


    @stack('css')
</head>
<body>
    <div id="app">
        <main class="py-4 py-md-0">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('admin/js/vendor/jquery.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
