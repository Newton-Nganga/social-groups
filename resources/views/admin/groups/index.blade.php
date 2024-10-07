@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <h3>All Groups</h3>
        <a href="{{ route('admin.groups.create') }}" class="btn btn-primary">Add New Group</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>
                            <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
