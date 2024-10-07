@extends('layouts.admin')

@section('content')
    <h1>All WhatsApp Groups</h1>

    <a href="{{ route('admin.whatsapp.create') }}" class="btn btn-primary">Create New Group</a>

    @if($groups->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Group Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->group_name }}</td>
                        <td><a href="{{ $group->group_link }}" target="_blank">{{ $group->group_link }}</a></td>
                        <td>
                            <a href="{{ route('admin.whatsapp.edit', $group->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.whatsapp.destroy', $group->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No groups found.</p>
    @endif
@endsection
