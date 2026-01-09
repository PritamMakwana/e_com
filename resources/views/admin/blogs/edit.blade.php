@extends('admin.include.admin')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <h4 class="my-3">Edit Blog</h4>

        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <input name="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $blog->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Author --}}
            <input name="author" class="form-control mt-2 @error('author') is-invalid @enderror"
                value="{{ old('author', $blog->author) }}">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Description --}}
            <textarea name="description" class="form-control mt-2 @error('description') is-invalid @enderror">{{ old('description', $blog->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Current Image --}}
            <div class="mt-2">
                <img src="{{ asset('storage/' . $blog->image) }}" width="120">
            </div>

            {{-- Change Image --}}
            <input type="file" name="image" class="form-control mt-2 @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Publish Date --}}
            <input type="date" name="publish_date" value="{{ old('publish_date', $blog->publish_date) }}"
                class="form-control mt-2 @error('publish_date') is-invalid @enderror">
            @error('publish_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            {{-- Status --}}
            <select name="status" class="form-control mt-2">
                <option value="1" {{ old('status', $blog->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $blog->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>

            <button class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
