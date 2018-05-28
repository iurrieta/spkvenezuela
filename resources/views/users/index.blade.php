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
                <th>Status</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href="{{ route('user', $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->status }}</td>
                    </tr>
                @endforeach
            </table>
            <div align="center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection