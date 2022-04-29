@extends('layouts.app')

@section('title', 'Activities')
@section('header-content', 'Past Activities')

@section('content')
<div class="post-container">
    <a class="button view-more-left" href="{{ route('activities') }}">&lt; View Upcoming Activities</a>
    @foreach($activities as $activity)
        <div class="post">
            <h2 class="post-title">{{ $activity->title}}</h2>
            <p class="post-date">{{ date_format(date_create($activity->date), "F jS, Y") }}</p>
            <div class="post-media-container">
                @foreach($activity->media as $media)
                    <div class="post-media">
                        <img src="{{config('app.url')}}/storage/img/{{$media->path}}" alt="">
                    </div>
                @endforeach
            </div>
            <p class="post-content">{{ $activity->notes }}</p>
        </div>
        <div class="post-divider"></div>

    @endforeach
    @if(count($activities) > 5)
        <a class="button view-more-left" href="{{ route('activities') }}">&lt; View Upcoming Activities</a>
    @endif
</div>
@endsection