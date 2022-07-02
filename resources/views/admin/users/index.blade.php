@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    <h1 class="mt-5">Registered Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mt-2">Add User</a>
    <table class="table table-striped table-dark mt-3 rounded">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-capitalize">{{ $user->role }}</td>
                <td><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning text-white">Edit</a></td>
                <td><a href="{{ route('users.delete', ['id' => $user->id]) }}" onclick="confirm()" class="btn btn-danger {{ Auth::user() == $user ? 'disabled' : ''}}">{{ Auth::user() == $user ? 'Current User' : 'Remove' }}</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection