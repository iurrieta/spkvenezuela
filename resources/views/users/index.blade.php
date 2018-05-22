@extends('layouts.app')

@section('title')
    SPK Venezuela | Users
@endsection

@section('content')
    <div class="card">
        <div class="content">
            <table class="table table-responsive table-hover">
                <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href="{{ route('profile', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection