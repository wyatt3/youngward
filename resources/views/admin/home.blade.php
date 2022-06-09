@extends('layouts.admin')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-warning">{{ Session('message') }}</div>
@endif
<div class="container">
    <h2 class="my-3">Announcements Header:</h2>
        <img src="/storage/img/{{ $announcementHeader ? $announcementHeader->path : 'no-image.jpg' }}">
    <h2 class="my-3">Activities Header: </h2>
        <img width="25%" src="/storage/img/{{ $activityHeader ? $activityHeader->path : 'no-image.jpg' }}">
        
    <h2 class="mt-5 mb-3">Home Page:</h2>
    <h3>Header:</h3>
</div>

@endsection