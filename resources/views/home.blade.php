@extends('layouts.app')

@section('title', 'Home')
@section('header_content', 'Young Ward')

@section('content')
<div class="container">

    <div class="opener">{{ $opener->content }}</div>
    <div class="post-divider"></div>
    <h1>Recent Announcements</h1>
    <div class="flex-container">
        @foreach($announcements as $announcement)
            <div class="my-card">
                <div class="my-card-title">{{ $announcement->title }}<br><span class="post-date">{{ date_format(date_create($announcement->date), "F jS, Y") }}</span></div>
                <div class="my-card-content">{{ $announcement->content }}</div>
                <a class="view-more" href="{{ route('announcements') . '#' . $announcement->id }}">View full announcement &rsaquo;</a>
            </div>
        @endforeach
            <a href="{{ route('announcements') }}" class="my-card view-more">View more Announcements &rsaquo;</a>
    </div>
    <h1>Upcoming Activities</h1>
    <div class="flex-container">
        @foreach($activities as $activity)
            <div class="my-card">
                <div class="my-card-title">{{ $activity->title }}<br><span class="post-date">{{ date_format(date_create($activity->date), "F jS, Y") }} at {{ date_format(date_create($activity->date), 'h:i a') }}</span></div>
                <div class="my-card-content">{{ $activity->notes }}</div>
                <a class="view-more" href="{{ route('activities') . '#' . $activity->id }}">View full activity &rsaquo;</a>
            </div>
        @endforeach
            <a href="{{ route('activities') }}" class="my-card view-more">View more Activities &rsaquo;</a>
    </div>
    <div class="post-divider"></div>

    <h1>Featured Content</h1>
    <div class="featured-content-container">
        @foreach($media as $img)
        <?php $mime = mime_content_type('storage/img/' . $img->path);?>
        <div>
            @if(strstr($mime, "video/"))
            <video controls>
                <source src="{{ '/storage/img/' . $img->path }}">
            </video>
            @elseif(strstr($mime, "image/"))
            <img src="{{ '/storage/img/' . $img->path }}">
            @endif
        </div>
        @endforeach
    </div>
    {{$media->links()}}
</div>
@endsection