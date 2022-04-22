@extends('layouts.app')

@section('title', 'Activities')
@section('header-content', 'Activities')

@section('content')
<div class="post-container">
    
    @foreach($activities as $activity)
    <div class="post">
        <h2 class="post-title">{{ $activity->title}}</h2>
        <p class="post-date">{{ date_format(date_create($activity->date), "F jS, Y") }}</p>
        <p class="post-content">{{ $activity->content }}</p>
    </div>
    <div class="post-divider"></div>

    @endforeach

    <a class="button view-more-right" href="{{ route('activity.old') }}">View Past Activities &gt;</a>
</div>
@endsection