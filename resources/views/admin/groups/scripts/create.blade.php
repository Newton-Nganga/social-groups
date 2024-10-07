@extends('layouts.app')

@section('content')
    <h2>Add Script</h2>
    <form action="{{ route('scripts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content" required></textarea>
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
