<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Todo Manager hecho con Laravel 5.2">
    <meta name="author" content="Openagora | Juan Torres">

    <title>@yield('title', 'OA Todo')</title>

    {{--Bootstrap core CSS--}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/ionicons/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert/dist/sweetalert.css') }}" />
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />

    <!--[if lt IE 9]>
    <script src="{{ asset('vendor/html5shiv/dist/html5shiv.min.js') }}"></script>
    <script src="{{ asset('vendor/respond/dest/respond.min.js') }}"></script>
    <![endif]-->

    {{-- Estos son los iconos cuando se colocan estas URL como accesos directos --}}
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link rel="icon" href="{{ asset('images/icon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('images/icon-192x192.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/icon-180x180.png') }}">
    <meta name="msapplication-TileImage" content="{{ asset('images/icon-270x270.png') }}">
</head>