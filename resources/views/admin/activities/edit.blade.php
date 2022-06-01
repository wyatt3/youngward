@extends('layouts.admin')

@section('content')
<?php $type = "Activity";$id = $activity->id; ?>
<div class="container mb-5">
        <h1 class="mt-5">Edit Activity</h1>
        <form action="{{ route('activities.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $activity->id }}">
            <label>*Activity Name</label>
            <input class="form-control mb-2" type="text" name="title" value="{{ $activity->title }}">
            <label>*Activity Date</label>
            <input class="form-control mb-2" type="date" name="date" value="{{ date('Y-m-d', strtotime($activity->date)) }}">
            <label>*Activity Time</label>
            <input class="form-control mb-2" type="time" name="time" value="{{ date('H:i:s', strtotime($activity->date)) }}">
            @include('partials.admin.media')
            <label class="mt-2">Activity Description</label>
            <textarea class="form-control" name="notes" cols="30" rows="10">{{ $activity->notes }}</textarea>
            <a href="{{ route('activities.admin.index') }}" class="btn btn-danger mt-3 mr-2">Cancel</a><input type="submit" class="btn btn-success mt-3" value="Save">
        </form>
        @include('partials.admin.mediaModal')
</div>
@endsection