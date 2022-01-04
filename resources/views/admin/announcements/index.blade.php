@extends('layouts.admin')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-warning">{{ Session('message') }}</div>
@endif

<div class="container">
    <a href="{{ route('announcements.create') }}" class="btn btn-primary mt-5">Create Announcement</a>
    <table class="table table-striped table-dark mt-3 rounded">
        <tr>
            <th>Title</th>
            <th>Date Posted</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($announcements as $announcement)
        <tr>
            <td>{{ $announcement->title }}</td>
            <td>{{ date_format($announcement->created_at, "F jS, Y") }}</td>
            <td><a href="{{ route('announcements.edit',   ['id' => $announcement->id]) }}" class="btn btn-warning text-white">Edit</a></td>
            <td><a href="{{ route('announcements.delete', ['id' => $announcement->id]) }}" onclick="confirm('Are you sure you want to delete this announcement?\nClick &quot;OK&quot; to delete the announcement.')" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach            
    </table>
</div>

@endsection