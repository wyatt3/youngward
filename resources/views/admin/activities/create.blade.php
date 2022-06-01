@extends('layouts.admin')

@section('content')
<div class="container">
        <h1 class="mt-5">Create Activity</h1>
        <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>*Activity Name</label>
            <input class="form-control mb-2" type="text" name="title" value="">
            <label>*Activity Date</label>
            <input class="form-control mb-2" type="date" name="date" value="">
            <label>*Activity Time</label>
            <input class="form-control" type="time" name="date" value="">
            <label class="d-block">Attachments</label>
            <input type="file" name="files[]" multiple class="form-control">
            <label class="mt-2">Activity Description</label>
            <textarea class="form-control" name="notes" cols="30" rows="10"></textarea>
            <a href="{{ route('activities.admin.index') }}" class="btn btn-danger mt-3 me-2">Cancel</a><input type="submit" class="btn btn-success mt-3" value="Create">
        </form>
</div>
@endsection