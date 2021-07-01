<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="http://{{$_SERVER['HTTP_HOST']}}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{ asset('img/logo-labras-minificada.svg') }}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')

  </head>

  <body class="c-app">
    @yield('content')
    <script src="{{ url(asset('js/vendor.js')) }}"></script>
    <script src="{{ url(asset('js/app.js')) }}"></script>
    @yield('javascript')


  </body>
</html>
