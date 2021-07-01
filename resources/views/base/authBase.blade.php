<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link rel="shortcut icon" href="{{ asset('img/logo-labras-minificada.svg') }}"/>

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body>
    @if (count($errors) != 0)
        <div class="alert alert-danger alert-dismissible alert-system" role="alert">
            <img src="{{ asset('img/report.svg') }}" alt="Report" width="25" class="mr-1">
            <strong>{{$errors->first('email')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="c-app flex-row align-items-center">
        @yield('content')
    </div>

    <script src="{{ url(asset('js/vendor.js')) }}"></script>
    <script src="{{ url(asset('js/app.js')) }}"></script>
    @yield('javascript')

  </body>
</html>
