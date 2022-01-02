@extends('layouts.admin')

@section('content')

<div class="container">
    <table class="table table-striped table-dark">
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
            <td><a href="" class="btn btn-warning text-white">Edit</a></td>
            <td><a href="" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach            
    </table>
</div>

@endsection