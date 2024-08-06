@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Details List</h1>
        <a href="{{ route('details.create') }}" class="btn btn-primary mb-3">Create New Detail</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Cover Image</th>
                <th>Release Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->title }}</td>
                    <td>{{ $detail->author }}</td>
                    <td>{{ $detail->description }}</td>
                    <td>
                        <img src="{{ $detail->cover_image_url }}" alt="Cover Image" width="100">
                    </td>
                    <td>{{ $detail->release_date }}</td>
                    <td>{{ $detail->status }}</td>
                    <td>
                        <a href="{{ route('details.show', $detail->id) }}" class="btn btn-info btn-sm" title="View">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('details.edit', $detail->id) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('details.destroy', $detail->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this item?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <div>
                Showing {{ $details->firstItem() }} to {{ $details->lastItem() }} of {{ $details->total() }} entries
            </div>
            <div>
                {{ $details->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
