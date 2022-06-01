@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <div class="container">
                <h1 class="my-3">Create New User</h1>
                @if ($errors->any())
                    <ul class="text-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form class="form" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="">
                    <label class="mt-2">Email</label>
                    <input class="form-control" type="email" name="email">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="role">
                        <label class="form-check-label">Admin</label>
                    </div>
                    <div class="text-secondary mt-3">The default password is "YoungWard", please have the new user change this password as soon as possible</div>
                    <a href="{{ route('users.index') }}" class="btn btn-danger mt-3 me-2">Cancel</a><input class="mt-3 btn btn-success" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection