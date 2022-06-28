@extends('layouts.app')

@section('title', 'Home')
@section('header_content', 'Young Ward')

@section('content')

    @foreach($activities as $activity)
        {{$activity->title}}
    @endforeach

@endsection