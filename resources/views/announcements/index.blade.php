@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Announcements')

@section('content')

  <div class="announcements-container">

      @foreach($announcements as $announcement)

      {{ $announcement->title}}<br><br>

      @endforeach
      
      <a class="button" href="{{ route('announcements.old') }}">View Older Announcements</a>
  
  </div>
@endsection