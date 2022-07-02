@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Past Announcements')

@section('content')
  <div class="post-container">
    
    <a class="button view-more-left" href="{{ route('announcements') }}">&lt; View Recent Announcements</a>
    @foreach($announcements as $announcement)
    
    {{ $announcement->title }} {{ $announcement->content }}<br>
    
    @endforeach
    @if(count($announcements) > 5)
      <a class="button view-more-left" href="{{ route('announcements') }}">&lt; View Recent Announcements</a>
    @endif

  </div>
@endsection