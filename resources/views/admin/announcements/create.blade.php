@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <h1 class="mt-5 mb-3">Create Announcement</h1>
            @if ($errors->any())
                <ul class="text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form class="form" method="POST" action="{{ route('announcements.store') }}" enctype="multipart/form-data">
                @csrf
                <label>Title</label>
                <input class="form-control" type="text" name="title" value="">
                <label class="mt-2">Content</label>
                <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
                <label class="d-block">Attachments</label>
                <input type="file" name="files[]" multiple class="form-control">
                <a href="{{ route('announcements.admin.index') }}" class="btn btn-danger mt-3 me-2">Cancel</a><input class="mt-3 btn btn-success" type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
@endsection