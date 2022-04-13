@extends('layouts.app')

@section('title', 'Activities')
@section('header-content', 'Activities')

@section('content')

<a class="button view-older" href="{{ route('activity.old') }}">View Past Activities &gt;</a>
@endsection