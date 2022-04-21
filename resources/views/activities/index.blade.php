@extends('layouts.app')

@section('title', 'Activities')
@section('header-content', 'Activities')

@section('content')
<div class="post-container">
    
    <a class="button view-more-right" href="{{ route('activity.old') }}">View Past Activities &gt;</a>
</div>
@endsection