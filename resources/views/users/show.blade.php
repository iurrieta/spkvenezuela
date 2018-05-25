@extends('layouts.app')

@section('title')
    SPK Venezuela | Profile
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-5">
            <div class="card card-user">
                <div class="image image-app"></div>
                <div class="content">
                    <div class="author">
                        <img class="avatar border-white" src="{{ asset('avatars/'. $user->photo) }}" alt="profile-photo"/>
                        <form action="{{ route('profile.uploadPhoto', $user->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}

                            <label class="btn btn-simple btn-danger">
                                <i class="fa fa-picture-o"></i> Photo <input type="file" name="photo" required style="display: none !important;">
                            </label>
                            <br>
                            <button type="submit" class="btn btn-fill btn-danger"><i class="fa fa-upload"></i> Upload</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="content" style="min-height: 0">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-3 text-right">
                                    <button class="btn btn-sm btn-warning btn-icon"><i class="fa fa-star"></i></button>
                                </div>
                                <div class="col-xs-6">
                                    <b>Rate</b>
                                    <br />
                                    @if($user->teacher_rates->sum('star') > 0)
                                        {{ round($user->teacher_rates->sum('star') / $user->teacher_rates->count(), 1) }}
                                    @else
                                        0
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-3 text-right">
                                    <button class="btn btn-sm btn-info btn-icon"><i class="fa fa-comment"></i></button>
                                </div>
                                <div class="col-xs-6">
                                    <b>Comments</b>
                                    <br />
                                    {{ $user->teacher_comments->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="content">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control border-input" value="{{ $user->name }}" required>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="col-sm-12">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" class="form-control border-input" value="{{ $user->facebook }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" class="form-control border-input" value="{{ $user->instagram }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" class="form-control border-input" value="{{ $user->twitter }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control border-input" value="{{ $user->linkedin }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Skype</label>
                                    <input type="text" name="skype" class="form-control border-input" value="{{ $user->skype }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                                    <label>About Me</label>
                                    <textarea rows="5" name="about" class="form-control border-input" required>{{ $user->about }}</textarea>
                                </div>
                                @if ($errors->has('about'))
                                    <div class="col-sm-12">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control border-input">
                                </div>
                                @if ($errors->has('password'))
                                    <div class="col-sm-12">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control border-input">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="fa fa-check"></i>Update</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection