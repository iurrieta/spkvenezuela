<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' >
    <meta name="viewport" content="width=device-width" >
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{--Styles--}}
    <link rel="icon" href="{{ asset('img/paper_img/favicon.ico') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/ct-paper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/ct-dm.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/ct-xpl.css') }}" rel="stylesheet">

    {{--Fonts and icons--}}
    <link href="{{ asset('fonts/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/css/font-awesome.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
    {{--content--}}
    @yield('content')
    {{--/content--}}

    {{--Scripts--}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    {{--Plugins--}}
    <script src="{{ asset('js/lib/ct-paper-checkbox.js') }}"></script>
    <script src="{{ asset('js/lib/ct-paper.js') }}"></script>
</body>
</html>
