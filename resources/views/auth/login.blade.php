@extends('layouts.landing')

@section('title')
    SPK Venezuela | Login
@endsection

@section('content')
    <nav class="navbar navbar-ct-transparent navbar-fixed-top" role="navigation-demo" id="register-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/">
                    <img src="{{ asset('img/logo04.png') }}" alt="logo" style="height: 65px">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navigation-example-2">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('register') }}" class="btn btn-simple">@lang('app.register')</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>

    <div class="wrapper">
        <div class="register-background" style="background-image: url({{ asset('img/img02.jpg') }})">
            <div class="filter-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                        <div class="register-card">
                            <form class="register-form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                @if ($errors->has('email') || $errors->has('password'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="form-group {{ $errors->has('email') || $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="text-dark">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    <label class="text-dark">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>

                                <button type="submit" class="btn btn-danger btn-fill btn-block">@lang('app.login')</button>
                            </form>
                            <div class="forgot">
                                <a href="{{ route('password.request') }}" class="btn btn-simple btn-danger">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection