@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($teachers as $teacher)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <a href="{{ route('teacher', $teacher->id) }}">
                    <div class="card card-user">
                        <div class="image {{ $cards[rand(0, 3)] }}"></div>
                        <div class="content">
                            <div class="author">
                                <img class="avatar border-white" src="{{ asset('avatars/'. $teacher->photo) }}" alt="profile-photo"/>
                                <h4 class="title">{{ $teacher->name }}</h4>
                            </div>
                            <p class="description text-center">{{ substr($teacher->about, 0, 100) }}...</p>
                        </div>
                        <hr>
                        <br>
                        <div class="text-center">
                            <button type="button" class="btn btn-fill btn-warning btn-icon">
                                <i class="fa fa-star"></i> 4.5
                            </button>
                        </div>
                        <br>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
