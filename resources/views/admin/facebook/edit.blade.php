@extends('layouts.admin')

@section('content')
    <h1>Edit Facebook Group</h1>

    <form action="{{ route('admin.facebook.update', $facebookGroup->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="group_name">Group Name:</label>
            <input type="text" name="group_name" class="form-control" value="{{ $facebookGroup->group_name }}" required>
        </div>
        <div class="form-group">
            <label for="group_link">Group Link:</label>
            <input type="url" name="group_link" class="form-control" value="{{ $facebookGroup->group_link }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
