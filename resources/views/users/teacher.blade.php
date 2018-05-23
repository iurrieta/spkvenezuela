@extends('layouts.app')

@section('title')
    SPK Venezuela | Teacher Detail
@endsection

@section('content')
    <div class="profile-content section-nude">
        <div class="container">
            <div class="row owner">
                <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                    <div class="photo-profile">
                        <img src="{{ asset('avatars/'. $teacher->photo) }}" alt="photo-profile" class="img-circle teacher-photo">
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
                <form action="{{ route('comment') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="teacher" value="{{ $teacher->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <textarea rows="5" name="comment" class="form-control border-input" placeholder="Add some comment" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-comment"></i> Comment</button>
                    </div>
                </form>
            </div>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="follows">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="list-unstyled follows">
                                @foreach($teacher->teacher_comments->sortByDesc('created_at') as $comment)
                                    <li>
                                        <div class="">
                                            <h5>{{ $comment->user->name }} <br><small>{{ $comment->created_at }}</small></h5>
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </li>
                                    <hr class="hrr">
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection