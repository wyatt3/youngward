@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Past Announcements')
@section('header_background', 'background styles')

@section('content')

  <a class="button view-older" href="{{ route('activity.index') }}">&lt; View Upcoming Activities</a>
  @foreach($announcements as $announcement)

    {{ $announcement->title }} {{ $announcement->content }}<br>

  @endforeach

@endsection