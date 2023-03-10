<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Language" content="pt-br, en" />
    <base href="http://{{$_SERVER['HTTP_HOST']}}/">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{URL::asset('/img/fav-icon.png')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/vendor.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
    <title>Maistek Tecnologia</title>
    @yield('style')
</head>

<body>
    @yield('content')
    <script src="{{URL::asset('js/vendor.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    @yield('script')
</body>

</html>
