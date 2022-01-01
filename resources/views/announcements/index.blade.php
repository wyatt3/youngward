@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Announcements')

@section('content')

  <div class="announcements-container">

      @foreach($announcements as $announcement)

      <div class="announcement-container">
        <h2 class="announcement-title">{{ $announcement->title}}</h2>
        <p class="announcement-date"></p>
        <p class="announcement-"></p>

      </div>

      @endforeach
      
      <a class="button view-older" href="{{ route('announcements.old') }}">View Older Announcements &gt;</a>
      
  </div>
  
@endsection