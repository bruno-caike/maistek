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
    <link rel="shortcut icon" href="{{ asset('img/fav-icon.png') }}"/>

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    @livewireStyles
  </head>

  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      @include('base.shared.nav')
      @include('base.shared.header')
      <div class="c-body">
        @if (!empty(session('mensagem')) || !empty(session('sucessoLaudo')))
            <div class="alert alert-success alert-dismissible alert-system" role="alert">
                <i class="far fa-check-circle mr-2"></i>
                <strong>{{!empty(session('mensagem')) ? session('mensagem') : session('sucessoLaudo')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        @if (count($errors) != 0 || !empty(session('erro')) || !empty(session('error_order')))
            <div class="alert alert-danger alert-dismissible alert-system" role="alert">
                <i class="far fa-times-circle mr-2"></i>
                {!! !empty(session('erro')) || !empty(session('error_order')) ? (!empty(session('erro')) ? '<strong>'.session('erro').'</strong>' : session('error_order')) : '<strong>Erro ao enviar</strong>' !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <main class="c-main">
            @yield('content')
        </main>
      </div>
    </div>
    @livewireScripts
    @yield('javascript')
    <script src="{{ url(asset('js/vendor.js')) }}"></script>
    <script src="{{ url(asset('js/app.js')) }}"></script>
  </body>
</html>
