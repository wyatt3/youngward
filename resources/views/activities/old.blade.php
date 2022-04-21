@extends('layouts.app')

@section('title', 'Activities')
@section('header-content', 'Past Activities')

@section('content')
    <div class="post-container">
        <a class="button view-more-left" href="{{ route('activity.index') }}">&lt; View Upcoming Activities</a>

        @if(count($activities) > 5)
            <a class="button view-more-left" href="{{ route('activity.index') }}">&lt; View Upcoming Activities</a>
        @endif
    </div>
@endsection