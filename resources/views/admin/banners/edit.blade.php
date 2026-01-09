@extends('admin.include.admin')

@section('title','Banner')


@section('content')
<div class="container">
    <h4 class="my-3">Edit Banner</h4>

    <form action="{{ route('admin.banners.update', $banner->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $banner->title) }}">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            <img src="{{ asset('storage/'.$banner->image) }}" width="120">
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary">Update Banner</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
