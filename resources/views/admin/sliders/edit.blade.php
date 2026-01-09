@extends('admin.include.admin')

@section('title', 'Edit Slider')

@section('content')
    <div class="container">
        <h4 class="my-3">Edit Slider</h4>

        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}">
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ asset('storage/' . $slider->image) }}" width="150">
            </div>

            <div class="mb-3">
                <label>Change Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $slider->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$slider->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary">Update Slider</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
