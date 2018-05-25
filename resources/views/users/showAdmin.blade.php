@extends('layouts.app')

@section('title')
    SPK Venezuela | User Detail
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-md-offset-2">
            <div class="card card-user">
                <div class="image image-app"></div>
                <div class="content">
                    <div class="author">
                        <img class="avatar border-white" src="{{ asset('avatars/'. $user->photo) }}" alt="profile-photo"/>
                        <h5>{{ $user->type }}</h5>
                        <form action="{{ route('changeStatus', $user->id) }}" method="POST">
                            {{ csrf_field() }}

                            @if($user->status == 'ACTIVATED')
                                <button type="submit" class="btn btn-fill btn-warning"><i class="fa fa-remove"></i> Deactivate</button>
                            @else
                                <button type="submit" class="btn btn-fill btn-success"><i class="fa fa-check"></i> Activate</button>
                            @endif
                        </form>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <h5>{{ $user->name }}</h5>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <h5>{{ $user->email }}</h5>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Facebook</label>
                                <h5>{{ $user->facebook }}</h5>
                            </div>
                            <div class="col-md-4">
                                <label>Instagram</label>
                                <h5>{{ $user->instagram }}</h5>
                            </div>
                            <div class="col-md-4">
                                <label>Twitter</label>
                                <h5>{{ $user->twitter }}</h5>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label>About Me</label>
                                <h5 style="word-wrap: break-word;">{{ $user->about }}</h5>
                            </div>
                        </div>
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
    </div>
@endsection