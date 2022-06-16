@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Announcements')

@section('content')

  <div class="post-container">

      @foreach($announcements as $announcement)

      <div class="post">
        <h2 class="post-title">{{ $announcement->title}}</h2>
        <p class="post-date">Posted on {{ date_format($announcement->created_at, "F jS, Y") }}</p>
        <p class="post-content">{{ $announcement->content }}</p>

      </div>
      <div class="post-divider"></div>
      @endforeach
      
      @if($show_old_button)<a class="button view-more-right" href="{{ route('announcements.old') }}">View Older Announcements &gt;</a>@endif
      
  </div>
  
@endsection