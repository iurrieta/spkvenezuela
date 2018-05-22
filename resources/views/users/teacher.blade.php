@extends('layouts.app')

@section('title')
    SPK Venezuela | Teacher Detail
@endsection

@section('content')
    <div class="profile-content section-nude">
        <div class="container">
            <div class="row owner">
                <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                    <div class="avatar">
                        <img src="{{ asset('avatars/'. $teacher->photo) }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                    </div>
                    <div class="name">
                        <h4>{{ $teacher->name }}</h4>
                        <div class="rate">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <br>4.5/5
                            <br>
                            <button class="btn btn-warning btn-icon" data-toggle="modal" data-target="#myModal"><i class="fa fa-star"></i> Rate</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <br>
                    <p>{{ $teacher->about }}</p>
                    <br />
                    <div class="rate">
                        <a href="#" class="btn btn-icon btn-default"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="btn btn-icon btn-default"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="btn btn-icon btn-default"><i class="fa fa-twitter"></i></a>
                    </div>

                </div>
            </div>
            <br>
            <hr>
            <div class="col-md-6 col-md-offset-3 text-center" id="form-comment">
                <form action="#">
                    <div class="form-group">
                        <textarea rows="5" name="comment" class="form-control border-input" placeholder="Add some comment" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger"><i class="fa fa-comment"></i> Comment</button>
                    </div>
                </form>
            </div>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="follows">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="list-unstyled follows">
                                <li>
                                    <div class="">
                                        <h5>Flume <br><small>2018-22-5 17:05:00</small></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A culpa cumque odio odit quia quis, soluta suscipit. Accusantium, animi architecto, et expedita incidunt maxime nesciunt nobis porro repellendus similique unde.</p>
                                    </div>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Rate Teacher</h4>
                </div>
                <div class="modal-body" align="center">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="modal-footer">
                    <div class="left-side">
                        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Never mind</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="button" class="btn btn-danger btn-simple">Rate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    end modal -->
@endsection