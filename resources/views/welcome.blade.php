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
                <a class="navbar-brand" href="/">SPK Venezuela</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navigation-example-2">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('/login') }}" class="btn btn-simple">Ingresar</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}" class="btn btn-simple">Registrar</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>

    <div class="wrapper">
        <div class="demo-header demo-header-image" style="background-image: url({{ asset('img/img02.jpg') }});">>
            <div class="motto">
                <h1 class="title-uppercase">SPK Venezuela</h1>
                <h3>Slogan.</h3>
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

            {{--<div class="section landing-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center">Keep in touch?</h2>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <label>Message</label>
                                <textarea class="form-control" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button class="btn btn-danger btn-block btn-lg btn-fill">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>--}}
        </div>
    </div>

    <footer class="footer-demo section-dark">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="{{ url('/login') }}">Ingresar</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">Registrar</a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                SPK Venezuela
            </div>
        </div>
    </footer>
@endsection