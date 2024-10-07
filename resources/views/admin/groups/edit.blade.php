@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <h3>Edit Group</h3>

        <form action="{{ route('admin.groups.update', $group->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Group Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $group->name }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Update Group</button>
        </form>
    </div>
@endsection
