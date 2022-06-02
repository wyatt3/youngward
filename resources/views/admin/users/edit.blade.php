@extends('layouts.admin')

@section('content')
<div class="container col-sm-12 col-md-8 col-lg-6 mt-5">
    <h1>Edit Account</h1>
    @if ($errors->any())
        <ul class="text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <label>Name:</label>
        <input class="form-control mb-2" type="text" name="name" value="{{ $user->name }}">
        <label>Email Address:</label>
        <input class="form-control" type="email" name="email" value="{{ $user->email }}">
        <h2 class="mt-3">Change Password</h2>
        <label>Old Password:</label>
        <input class="form-control mb-2" type="password" name="oldPassword">
        <label>New Password:</label>
        <input class="form-control mb-2" type="password" name="newPassword">
        <label>New Password (Again):</label>
        <input class="form-control mb-2" type="password" name="newPasswordConfirm">
        <a class="btn btn-danger mt-3" href="{{ Auth::user()->isAdmin() ? route('users.index') : route('admin.index')}}">Cancel</a>
        <input class="btn btn-success mt-3" type="submit" value="Update">
    </form>
</div>
@endsection