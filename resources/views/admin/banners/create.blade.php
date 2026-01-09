@extends('admin.include.admin')

@section('title','Banner')

@section('content')
<div class="container">
    <h4 class="my-3">Add Banner</h4>

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Save Banner</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
