@extends('layouts.app')

@section('title')
    SPK Venezuela | Teacher Detail
@endsection

@section('content')
    <div class="profile-content">
        <div class="container">
            <div class="row owner">
                <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                    <div class="photo-profile">

                        @if(is_null($teacher->photo) || empty($teacher->photo))
                            <img class="img-circle teacher-photo" src="{{ asset('img/p03.png') }}" alt="profile-photo"/>
                        @else
                            <img src="{{ route('photo_profile', $teacher->photo) }}" alt="photo-profile" class="img-circle teacher-photo">
                        @endif
                    </div>
                    <div class="name">
                        <h4>{{ $teacher->name }}</h4>
                        <div id="rater"></div>
                        <br>{{ round($rate, 1) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <br>
                    <p style="word-wrap: break-word">{{ $teacher->about }}</p>
                    <br />
                    <div class="rate">
                        @unless(empty($teacher->facebook) || is_null($teacher->facebook))
                            <button type="button" class="btn btn-icon btn-simple btn-default">
                                <i class="fa fa-facebook"></i> {{ $teacher->facebook }}
                            </button>
                        @endunless

                        @unless(empty($teacher->instagram) || is_null($teacher->instagram))
                            <button type="button" class="btn btn-icon btn-simple btn-default">
                                <i class="fa fa-instagram"></i> {{ $teacher->instagram }}
                            </button>
                        @endunless

                        @unless(empty($teacher->twitter) || is_null($teacher->twitter))
                            <button type="button" class="btn btn-icon btn-simple btn-default">
                                <i class="fa fa-twitter"></i> {{ $teacher->twitter }}
                            </button>
                        @endunless

                        @unless(empty($teacher->linkedin) || is_null($teacher->linkedin))
                            <button type="button" class="btn btn-icon btn-simple btn-default">
                                <i class="fa fa-linkedin"></i> {{ $teacher->linkedin }}
                            </button>
                        @endunless

                        @unless(empty($teacher->skype) || is_null($teacher->skype))
                            <button type="button" class="btn btn-icon btn-simple btn-default">
                                <i class="fa fa-skype"></i> {{ $teacher->skype }}
                            </button>
                        @endunless

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
                                            <p style="word-wrap: break-word">{{ $comment->comment }}</p>
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

@section('script')
    <script>
        var myRating = raterJs({
            showToolTip: false,
            // starSize: 30,
            disableText: 'Thanks for your rate',

            element:document.querySelector("#rater"),

            rateCallback:function rateCallback(rating, done) {
                this.setRating(rating);

                var formData = {
                    _token: "{{ csrf_token() }}",
                    teacher: "{{ $teacher->id }}",
                    user_id: "{{ Auth::user()->id }}",
                    star: rating
                };

                // send rate to save
                $.ajax({
                    url: '{{ route('rate') }}',
                    method: "POST",
                    data: JSON.stringify(formData),
                    contentType: 'application/json; charset=utf-8',
                    dataType: "JSON"
                }).done(function (res) {
                    if (res.response == 'success') {
                        // disable the rating
                        myRating.disable();

                        toastr.options = {
                            "closeButton": true,
                            "progressBar": false,
                            "positionClass": 'toast-bottom-right',
                            "timeOut": 6000
                        };
                        toastr.success(res.message);
                    } else {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": false,
                            "positionClass": 'toast-bottom-right',
                            "timeOut": 6000
                        };
                        toastr.error(res.message);
                    }
                }).fail(function (err) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": false,
                        "positionClass": 'toast-bottom-right',
                        "timeOut": 6000
                    };
                    toastr.error("Error due connection");
                });

                done();
            }
        });

        // set rate
        myRating.setRating({{ round($rate, 1) }});

        @if(Auth::user()->id == $teacher->id)
            myRating.disable();
        @endif

        @if( ! $teacher->teacher_rates->where('user_id', Auth::user()->id)->isEmpty())
            @if(Auth::user()->id == $teacher->teacher_rates->where('user_id', Auth::user()->id)->first()->user_id)
                myRating.disable();
            @endif
        @endif


    </script>
@endsection