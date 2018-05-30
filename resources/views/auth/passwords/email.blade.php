@extends('layouts.landing')

@section('title')
    SPK Venezuela | Recuperar Contraseña
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
                <a class="navbar-brand" href="/">SPK Venezuela</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navigation-example-2">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('login') }}" class="btn btn-simple">@lang('app.login')</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="btn btn-simple">@lang('app.register')</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>

    <div class="wrapper">
        <div class="register-background" style="background-image: url({{ asset('img/img01.jpg') }})">
            <div class="filter-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                        <div class="register-card">
                            <form class="register-form" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="text-dark">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>

                                <button type="submit" class="btn btn-warning btn-fill btn-block">Send Password Reset Link</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

