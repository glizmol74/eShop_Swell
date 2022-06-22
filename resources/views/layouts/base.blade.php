<!doctype html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name') }}</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link data-n-head="1" rel="icon" type="image/x-icon" href="/storage/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <v-app id="inspire">
        
            <main class="">
                
                    @yield('content')
                
            <main>
        </v-app>
    </div> 
    <script src="{{ mix('js/base.js') }}"></script>
 </body>
</html>
