@extends('layouts.admin')

@section('content')
<div class="container">
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
            <label class="d-block">Attachments</label>
            <div class="d-flex flex-row flex-wrap">
                @foreach($activity->media as $media)
                    <div class="w-25">
                        <div class="bg-danger d-inline px-2 py-1 position-relative text-white border border-dark rounded-circle" style="z-index: 1;cursor: pointer;" onclick="deleteMedia(event, {{ $media->id }})">X</div>
                        <img class="w-100" src="{{ config('app.url') . '/storage/img/' . $media->path }}">
                    </div>
                    <div class="w-25 py-3 px-4">
                        <div class="rounded bg-success d-flex w-100 h-100 justify-content-center align-items-center border border-dark text-white" style="cursor: pointer;"><i class="fa-solid fa-plus"></i></div>
                    </div>
                @endforeach
            </div>
            <label class="mt-2">Activity Description</label>
            <textarea class="form-control" name="notes" cols="30" rows="10">{{ $activity->notes }}</textarea>
            <a href="{{ route('activities.admin.index') }}" class="btn btn-danger mt-3 mr-2">Cancel</a><input type="submit" class="btn btn-success mt-3" value="Submit">
        </form>
</div>
@endsection