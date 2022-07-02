@extends('layouts.admin')

@section('content')
<?php use App\NavPage; ?>
<div class="container mt-4 col-sm-12 col-md-8 col-lg-5">

    <h2 class="mt-5 mb-3">Announcements Header:</h2>
    <img class="w-100" src="/storage/img/{{ $announcementHeader ? $announcementHeader->path : 'no-image.jpg' }}">
    <form method="POST" action="{{ route('media.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="mediaID" value="{{ $announcementHeader->id ?? 0}}">
        <input type="hidden" name="mediableID" value="{{ NavPage::where('name', 'Announcements')->first()->id }}">
        <label class="mt-3">Replace Announcements Header:</label>
        <input type="file" name="file" required class="file-upload form-control mt-1">
    </form>

    <h2 class="mt-5 mb-3">Activities Header: </h2>
    <img class="w-100" src="/storage/img/{{ $activityHeader ? $activityHeader->path : 'no-image.jpg' }}">
    <form method="POST" action="{{ route('media.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="mediaID" value="{{ $activityHeader->id ?? 0}}">
        <input type="hidden" name="mediableID" value="{{ NavPage::where('name', 'Ward Activities')->first()->id }}">
        <label class="mt-3">Replace Activities Header:</label>
        <input type="file" name="file" required class="file-upload form-control mt-1">
    </form>

    <h2 class="mt-5 mb-3">Home Page:</h2>
    <h3>Header:</h3>
    <img class="w-100" src="/storage/img/{{ $homeHeader ? $homeHeader->path : 'no-image.jpg' }}">
    <form method="POST" action="{{ route('media.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="mediaID" value="{{ $homeHeader->id ?? 0}}">
        <input type="hidden" name="mediableID" value="{{ NavPage::where('name', 'Home')->first()->id }}">
        <label class="mt-3">Replace Home Page Header:</label>
        <input type="file" name="file" required class="file-upload form-control mt-1">
    </form>
    <h3 class="mt-5 mb-3">Home Page Featured Content</h3>
    <form method="POST" action="{{ route('opener.update') }}">
        @csrf
        <textarea class="form-control mb-2" name="content" rows="5">{{ $opener->content }}</textarea>
        <input class="btn btn-success mb-3" type="submit" value="Update">
    </form>
    <?php $id = $media->id;$type = 'HomePageModule'?>
    @include('partials.admin.media')
    @include('partials.admin.mediaModal')
</div>

<script>
    $('.file-upload').change(function(event) {
        event.target.parentElement.submit();
    });
</script>
@endsection