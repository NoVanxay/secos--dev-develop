<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ trans('panel.site_title') }}</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ trans('panel.site_title') }}">
    <meta name="keywords" content="Sangha Education Commission Office of Savannakhet">
    <meta name="author" content="Sangha Education Commission Office of Savannakhet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">
    <link rel="stylesheet" href=" {{ asset(mix('/css/libs.css', 'frontend')) }}">
    @yield("extraStyle")
</head>

<body>
    @include('patials.header')


    @yield('pageContent')

    @include('patials.footer')

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<script src="{{ asset(mix('/js/libs.js', 'frontend')) }}"></script>
@yield("extraScript")
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
</body>
</html>
