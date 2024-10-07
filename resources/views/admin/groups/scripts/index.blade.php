@extends('layouts.app')

@section('content')
    <h2>All Scripts</h2>
    <a href="{{ route('scripts.create') }}" class="btn btn-primary">Add Script</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scripts as $script)
                <tr>
                    <td>{{ $script->title }}</td>
                    <td>
                        <a href="{{ route('scripts.edit', $script) }}">Edit</a>
                        <form action="{{ route('scripts.destroy', $script) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
