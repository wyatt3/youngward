@extends('layouts.app')

@section('title', 'Home')
@section('header_content', 'Young Ward')

@section('content')
<div class="container">
    <h1>Recent Announcements</h1>
    <div class="flex-container">
        @foreach($announcements as $announcement)
            <div class="card">
                <div class="card-title">{{ $announcement->title }}<br><span class="post-date">{{ date_format(date_create($announcement->date), "F jS, Y") }}</span></div>
                <div class="card-content">{{ $announcement->content }}</div>
                <a class="view-more" href="{{ route('announcements') . '#' . $announcement->id }}">View full announcement &rsaquo;</a>
            </div>
        @endforeach
            <a href="{{ route('announcements') }}" class="card view-more">View more Announcements &rsaquo;</a>
    </div>
    <h1>Upcoming Activities</h1>
    <div class="flex-container">
        @foreach($activities as $activity)
            <div class="card">
                <div class="card-title">{{ $activity->title }}<br><span class="post-date">{{ date_format(date_create($activity->date), "F jS, Y") }} at {{ date_format(date_create($activity->date), 'h:i a') }}</span></div>
                <div class="card-content">{{ $activity->notes }}</div>
                <a class="view-more" href="{{ route('announcements') . '#' . $announcement->id }}">View full activity &rsaquo;</a>
            </div>
        @endforeach
            <a href="{{ route('activities') }}" class="card view-more">View more Activities &rsaquo;</a>
    </div>
</div>
@endsection