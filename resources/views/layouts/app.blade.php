<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LUXURY') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700|Roboto:400,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="{{ url('js/app.js') }}"></script>

</body>
</html>
