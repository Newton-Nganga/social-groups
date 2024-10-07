@extends('layouts.app')

@section('content')
    <h2>Edit Script</h2>
    <form action="{{ route('scripts.update', $script) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $script->title }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" required>{{ $script->content }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
