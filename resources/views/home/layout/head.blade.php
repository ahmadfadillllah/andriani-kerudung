<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name')}}</title>
    <meta name="description" content="Toko Andriani Kerudung merupakan usaha yang menjual kerudung atau hijab secara grosir">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/img/logo/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/swiper-bundle.css">
    <link rel="stylesheet" href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/slick.css">
    <link rel="stylesheet"
        href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet"
        href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/font-awesome-pro.css">
    <link rel="stylesheet"
        href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/flaticon_shofy.css">
    <link rel="stylesheet" href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/spacing.css">
    <link rel="stylesheet" href="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    @include('notification.index')
