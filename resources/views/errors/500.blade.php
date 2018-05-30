<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' >
    <meta name="viewport" content="width=device-width" >
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPK Venezuela - 500</title>

    {{--Styles--}}
    <link rel="icon" href="{{ asset('img/paper_img/favicon.ico') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--Plugins--}}
    <link href="{{ asset('css/lib/pace/pace-dashboard.css') }}" rel="stylesheet">

    {{--Fonts and icons--}}
    <link href="{{ asset('fonts/css/font-awesome.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>

<body class="gray-bg">

<div class="middle-box text-center animated fadeInDown">
    <h1 style="font-size: 170px">500</h1>
    <h3 class="font-bold">Internal Server Error</h3>

    <div class="container">
        The server encountered something unexpected that didn't allow it to complete the request. <br> Try to refresh the page.
    </div>
</div>

{{--Scripts--}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/paper-dashboard.js') }}"></script>

{{--Plugins--}}
<script src="{{ asset('js/lib/ct-paper.js') }}"></script>
<script src="{{ asset('js/lib/pace/pace.min.js') }}"></script>

</body>

</html>
