@extends('layouts.admin')

@section('content')
    <h1>Create Telegram Group</h1>

    <form action="{{ route('admin.telegram.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="group_name">Group Name:</label>
            <input type="text" name="group_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="group_link">Group Link:</label>
            <input type="url" name="group_link" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
