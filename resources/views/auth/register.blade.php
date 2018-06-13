@extends('layouts.landing')

@section('title')
    SPK Venezuela | Register
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
                        <a href="{{ route('login') }}" class="btn btn-simple">@lang('app.login')</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>

    <div class="wrapper">
        <div class="register-background" style="background-image: url({{ asset('img/img03.jpg') }})">
            <div class="filter-black"></div>
            <div class="container">
                <div class="row" align="center">
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <img src="{{ asset('img/logo04.png') }}" alt="logo" style="">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <div class="register-card" align="left">
                            <form class="register-form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="type" value="STUDENT">

                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <span class="help-block">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @endforeach
                                @endif

                                <div class="form-group {{ $errors->has('email') || $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="text-dark">Name</label>
                                    <input type="text" class="form-control" name="name" required>

                                    <label class="text-dark">Email</label>
                                    <input type="email" class="form-control" name="email" required>

                                    <label class="text-dark">Password</label>
                                    <input type="password" class="form-control" name="password" required>

                                    <label class="text-dark">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <button type="submit" class="btn btn-success btn-fill btn-block">@lang('app.register')</button>
                            </form>
                            <a href="{{ route('becomeTeacher') }}" class="btn btn-info btn-fill btn-block">Become a teacher</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
