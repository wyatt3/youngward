@extends('layouts.admin')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-warning">{{ Session('message') }}</div>
@endif
    <div class="container">
        <h1 class="mt-5">Manage Activities</h1>
        <a href="{{ route('activities.create') }}" class="btn btn-primary mt-2">Create Activity</a>
        <table class="table table-striped table-dark mt-3 rounded">
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($activities as $activity)
            <tr>
                <td>{{ $activity->title }}</td>
                <td>{{ date_format(date_create($activity->date), "F jS, Y") }}</td>
                <td><a href="{{ route('activities.edit',   ['id' => $activity->id]) }}" class="btn btn-warning text-white">Edit</a></td>
                <td><a href="{{ route('activities.delete', ['id' => $activity->id]) }}" onclick="confirm('Are you sure you want to delete this activity?\nClick &quot;OK&quot; to delete the activity.')" class="btn btn-danger">Delete</a></td>
            </tr>
            @endforeach            
        </table>
    </div>

@endsection