@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Announcements')

@section('content')

  <div class="announcements-container">

      @foreach($announcements as $announcement)

      <div class="announcement">
        <h2 class="announcement-title">{{ $announcement->title}}</h2>
        <p class="announcement-date">Posted on {{ date_format($announcement->created_at, "F jS, Y") }}</p>
        <p class="announcement-content">{{ $announcement->content }}</p>

      </div>
      <div class="post-divider"></div>
      @endforeach
      
      <a class="button view-older" href="{{ route('announcements.old') }}">View Older Announcements &gt;</a>
      
  </div>
  
@endsection