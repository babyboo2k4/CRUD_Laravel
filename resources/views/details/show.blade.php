@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Detail</h1>
        <dl class="row">
            <dt class="col-sm-3">Title</dt>
            <dd class="col-sm-9">{{ $detail->title }}</dd>

            <dt class="col-sm-3">Author</dt>
            <dd class="col-sm-9">{{ $detail->author }}</dd>

            <dt class="col-sm-3">Description</dt>
            <dd class="col-sm-9">{{ $detail->description }}</dd>

            <dt class="col-sm-3">Cover Image</dt>
            <dd class="col-sm-9">
                <img src="{{ $detail->cover_image_url }}" alt="Cover Image" class="img-fluid" width="100">
            </dd>

            <dt class="col-sm-3">Release Date</dt>
            <dd class="col-sm-9">{{ $detail->release_date }}</dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">{{ $detail->status }}</dd>
        </dl>
        <a href="{{ route('details.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection

