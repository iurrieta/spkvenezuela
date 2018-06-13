@extends('layouts.landing')

@section('title')
    SPK Venezuela
@endsection

@section('content')
    <nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
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
                        <a style="color: white" href="{{ url('/login') }}" class="btn btn-simple">@lang('app.login')</a>
                    </li>
                    <li>
                        <a style="color: white" href="{{ url('/register') }}" class="btn btn-simple">@lang('app.register')</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>

    <div class="wrapper">
        <div class="filter-black"></div>
        <div class="demo-header demo-header-image" style="background-image: url({{ asset('img/img01.jpeg') }});">
            <div align="center" style="padding-top: 180px">
                <img style="height: 300px" src="{{ asset('img/logo04.png') }}" alt="">
            </div>
        </div>

        <div class="main">
            <div class="section text-center landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Let's talk product</h2>
                            <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad architecto atque consectetur delectus fugiat in incidunt ipsa iste labore, minima nulla odio quibusdam ratione reiciendis soluta tempore? Quam, voluptas.</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-light-brown landing-section" style="color: #555">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 column">
                            <h4>First Attribute</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                        <div class="col-md-4 column">
                            <h4>Second Attribute</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                        <div class="col-md-4 column">
                            <h4>Third Attribute</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section section-dark text-center landing-section">
                <div class="container">
                    <h2>Users Opinions</h2>
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ asset('img/paper_img/chet_faker_2.jpg') }}" alt="Thumbnail Image" class="img-circle img-responsive">
                            <h5>Batman</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad architecto atque consectetur delectus fugiat in incidunt ipsa iste labore, minima nulla odio quibusdam ratione reiciendis soluta tempore? Quam, voluptas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ asset('img/paper_img/flume.jpg') }}" alt="Thumbnail Image" class="img-circle img-responsive">
                            <h5>Superman</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad architecto atque consectetur delectus fugiat in incidunt ipsa iste labore, minima nulla odio quibusdam ratione reiciendis soluta tempore? Quam, voluptas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ asset('img/paper_img/banks.jpg') }}" alt="Thumbnail Image" class="img-circle img-circle img-responsive">
                            <h5>Wonder Woman</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad architecto atque consectetur delectus fugiat in incidunt ipsa iste labore, minima nulla odio quibusdam ratione reiciendis soluta tempore? Quam, voluptas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-demo section-dark">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="{{ url('/login') }}">@lang('app.login')</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">@lang('app.register')</a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                SPK Venezuela
            </div>
        </div>
    </footer>
@endsection