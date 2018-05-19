@extends('layouts.landing')

@section('title')
    SPK Venezuela | Registrar
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
                        <a href="{{ route('login') }}" class="btn btn-simple">Ingresar</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>

    <div class="wrapper">
        <div class="register-background" style="background-image: url({{ asset('img/paper_img/landscape.jpg') }});">
            <div class="filter-black"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                        <div class="register-card">
                            <form class="register-form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <span class="help-block">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @endforeach
                                @endif

                                <div class="form-group {{ $errors->has('email') || $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="text-primary">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                    <label class="text-primary">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    <label class="text-primary">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    <label class="text-primary">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>

                                <button type="submit" class="btn btn-danger btn-block">Registrar</button>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
