@extends('layouts.admin')

@section('content')

<div class="container mt-4">
    <h2 class="mt-5 mb-3">Announcements Header:</h2>
        <img src="/storage/img/{{ $announcementHeader ? $announcementHeader->path : 'no-image.jpg' }}">
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="mediaID" value="$announcementHeader->id">
            <input type="file" name="file">

        </form>
    <h2 class="my-3">Activities Header: </h2>
        <img width="25%" src="/storage/img/{{ $activityHeader ? $activityHeader->path : 'no-image.jpg' }}">
        
    <h2 class="mt-5 mb-3">Home Page:</h2>
    <h3>Header:</h3>
</div>

@endsection