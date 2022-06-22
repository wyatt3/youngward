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
        <input type="file" name="file" class="file-upload form-control mt-1">
    </form>

    <h2 class="mt-5 mb-3">Activities Header: </h2>
    <img class="w-100" src="/storage/img/{{ $activityHeader ? $activityHeader->path : 'no-image.jpg' }}">
    <form method="POST" action="{{ route('media.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="mediaID" value="{{ $announcementHeader->id ?? 0}}">
        <input type="hidden" name="mediableID" value="{{ NavPage::where('name', 'Ward Activities')->first()->id }}">
        <label class="mt-3">Replace Activities Header:</label>
        <input type="file" name="file" class="file-upload form-control mt-1">
    </form>

    <h2 class="mt-5 mb-3">Home Page:</h2>
    <h3>Header:</h3>
</div>

<script>
    $('.file-upload').change(function(event) {
        event.target.parentElement.submit();
    });
</script>
@endsection