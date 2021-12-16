@extends('layouts.app')

@section('title', 'Announcements')
@section('header_content', 'Announcements')

@section('content')

  @foreach($announcements as $announcement)

    {{ $announcement->title }} {{ $announcement->content }}<br>

  @endforeach

@endsection