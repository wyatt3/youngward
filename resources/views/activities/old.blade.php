@extends('layouts.app')

@section('title', 'Activities')
@section('header-content', 'Past Activities')

@section('content')

    <a class="button view-older" href="{{ route('activity.index') }}">&lt; View Upcoming Activities</a>
@endsection