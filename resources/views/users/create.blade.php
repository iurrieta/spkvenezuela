@extends('layouts.app')

@section('title')
    SPK Venezuela | Create User
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <div class="content">
                    <form action="{{ route('user.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control border-input" required>
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
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control border-input" required>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="col-sm-12">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control border-input">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-danger btn-fill btn-wd"><i class="fa fa-save"></i>Save</button>
                            <a href="{{ route('users') }}" class="btn btn-default btn-fill btn-wd"><i class="fa fa-remove"></i>Cancel</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection