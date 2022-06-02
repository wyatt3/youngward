@extends('layouts.admin')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-warning">{{ Session('message') }}</div>
@endif

@endsection