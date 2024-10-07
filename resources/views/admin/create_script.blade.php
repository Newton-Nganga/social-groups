@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Script</h2>
    <form action="{{ route('admin.scripts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Script Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="file">Upload Script</label>
            <input type="file" class="form-control" id="file" name="file" accept=".js,.php,.py,.txt" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Script</button>
    </form>
</div>
@endsection
