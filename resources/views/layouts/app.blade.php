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
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--Plugins--}}
    <link href="{{ asset('css/lib/pace/pace-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lib/toastr/toastr.min.css') }}" rel="stylesheet">

    {{--Fonts and icons--}}
    <link href="{{ asset('fonts/css/font-awesome.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="wrapper">
        <div class="main-panel">
            <nav class="navbar navbar-ct-danger navbar-fixed-top">
                <div class="container">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="{{ url('/') }}">SPK Venezuela</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="{{ Request::is('teacher*') ? 'active' : '' }}">
                                    <a href="{{ route('teachers') }}">
                                        <i class="fa fa-user-circle-o"></i> Teachers
                                    </a>
                                </li>
                                <li class="{{ Request::is('user*') ? 'active' : '' }}">
                                    <a href="{{ route('users') }}">
                                        <i class="fa fa-group"></i> Usuarios
                                    </a>
                                </li>
                                <li class="{{ Request::is('profile*') ? 'active' : '' }}">
                                    <a href="{{ route('profile', Auth::user()->id) }}">
                                        <i class="fa fa-user"></i> Perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </nav>

            <div class="content" style="padding-top: 120px">
                <div class="container">
                    <div class="container-fluid">
                        {{--content--}}
                        @yield('content')
                        {{--/content--}}
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <div class="container-fluid">
                        <nav class="ic-social pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright pull-right">
                            SPK Venezuela
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{--Scripts--}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/paper-dashboard.js') }}"></script>

    {{--Plugins--}}
    <script src="{{ asset('js/lib/ct-paper-checkbox.js') }}"></script>
    <script src="{{ asset('js/lib/ct-paper.js') }}"></script>
    <script src="{{ asset('js/lib/pace/pace.min.js') }}"></script>
    <script src="{{ asset('js/lib/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/lib/rater-js/index.js') }}"></script>
    <script>
        // toastr message
        @if(Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": false,
                "positionClass": 'toast-bottom-right',
                "timeOut": 6000
            };
            toastr.{{ Session::get('message.alert') }}("{{ Session::get('message.text') }}");
        @endif
    </script>

    @yield('script')

</body>
</html>
