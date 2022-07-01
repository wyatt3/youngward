@extends('layouts.app')

@section('title', 'Activities')
@section('header-content', 'Activities')

@section('content')
<div class="post-container">
    @if($show_old_button)<a class="button view-more-right" href="{{ route('activities.old') }}">View Past Activities &gt;</a>@endif
    
    @foreach($activities as $activity)
        <div class="mb" id="{{ $activity->id }}"></div>
        <div class="post">
            <h2 class="post-title">{{ $activity->title}}</h2>
            <p class="post-date">{{ date_format(date_create($activity->date), "F jS, Y") }}<br>at {{ date_format(date_create($activity->date), 'h:i a') }}</p>
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

</div>
@endsection