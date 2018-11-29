
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:locale" content="it_IT" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Case Vacanze Budoni Sardegna-Solaria Vacanze Immobiliare" />
    <meta property="og:description" content="Solaria Vacanze opera da anni principalmente nel campo degli affitti, il nostro obiettivo è quello di offrire le migliori residenze estive sul mercato." />
    <meta property="og:url" content="https://www.solariavacanze.com/" />
    <meta property="og:site_name" content="Solaria Vacanze Immobiliare" />
    <meta name="description" content="Solaria Vacanze opera da anni principalmente nel campo degli affitti, il nostro obiettivo è quello di offrire le migliori residenze estive sul mercato.">
    <meta name="keywords" content="Case Vacanze Budoni Sardegna-Solaria Vacanze Immobiliare">
    <meta name="author" content="Solaria Vacanze">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Solaria Vacanze') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('images/logos/solaria-vacanze-affitto-ville-appartamenti-sardegna-favicon.png')}}"/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Playfair+Display:400,900" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('css')
</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/js/vendor/jquery.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
