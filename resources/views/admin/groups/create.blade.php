@props(['analytics'=>[]])
@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <h3>Add New Group</h3>

        <form action="{{ route('admin.groups.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Group Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Group</button>
        </form>
    </div>
@endsection
