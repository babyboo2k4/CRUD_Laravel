@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Detail</h1>
        <form action="{{ route('details.update', $detail->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $detail->title) }}" required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $detail->author) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $detail->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="cover_image_url">Cover Image URL</label>
                <input type="url" class="form-control" id="cover_image_url" name="cover_image_url" value="{{ old('cover_image_url', $detail->cover_image_url) }}">
            </div>

            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $detail->release_date) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="completed" {{ old('status', $detail->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="in_progress" {{ old('status', $detail->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="hiatus" {{ old('status', $detail->status) == 'hiatus' ? 'selected' : '' }}>Hiatus</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
