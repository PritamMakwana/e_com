@extends('admin.include.admin')

@section('title', 'Edit Category')

@section('content')
    <div class="container">
        <h4 class="my-3">Edit Category</h4>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" width="120">
                @endif
            </div>

            <div class="mb-3">
                <label>Change Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
