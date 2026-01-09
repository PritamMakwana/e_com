@extends('admin.include.admin')

@section('title','Testimonial')

@section('content')
<div class="container">
    <h4 class="my-3">Add Testimonial</h4>

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Message</label>
            <textarea name="message"
                      class="form-control @error('message') is-invalid @enderror"
                      rows="4">{{ old('message') }}</textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
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

        <button class="btn btn-success">Save Testimonial</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
