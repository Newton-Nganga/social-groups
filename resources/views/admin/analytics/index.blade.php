@extends('layouts.admin')

@section('content')
<div class="main-content">
    <h2>Analytics Dashboard</h2>
    
    <!-- Table showing device types and pages -->
    <div class="card">
        <h3>User Analytics</h3>
        <table>
            <thead>
                <tr>
                    <th>Device Type</th>
                    <th>Page</th>
                    <th>IP Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($analytics as $data)
                <tr>
                    <td>{{ $data->device_type }}</td>
                    <td>{{ $data->page }}</td>
                    <td>{{ $data->ip_address }}</td>
                    <td>
                        <a href="{{ route('analytics.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('analytics.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
