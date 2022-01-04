@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-8">
        <div class="container">
            <h1 class="my-3">Edit Announcement</h1>
            @if ($errors->any())
                <ul class="text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="form" method="POST" action="{{ route('announcements.update') }}">
                @csrf
                <input class="form-control" type="hidden" name="id" value="{{ $announcement->id }}">
                <label>Title</label>
                <input class="form-control" type="text" name="title" value="{{ $announcement->title }}">
                <label class="mt-2">Content</label>
                <textarea class="form-control" name="content" cols="30" rows="10">{{ $announcement->content }}</textarea>
                <a href="{{ route('announcements.admin.index') }}" class="btn btn-danger mt-3 mr-2">Cancel</a><input class="mt-3 btn btn-success" type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
@endsection