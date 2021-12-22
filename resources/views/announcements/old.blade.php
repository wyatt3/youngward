@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Past Announcements')
@section('header_background', 'background styles')

@section('content')

  @foreach($announcements as $announcement)

    {{ $announcement->title }} {{ $announcement->content }}<br>

  @endforeach

@endsection