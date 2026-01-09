@extends('admin.include.admin')

@section('title','Testimonial')

@section('content')
<div class="container">
    <h4 class="my-3">Edit Testimonial</h4>

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $testimonial->name) }}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Message</label>
            <textarea name="message"
                      class="form-control @error('message') is-invalid @enderror"
                      rows="4">{{ old('message', $testimonial->message) }}</textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($testimonial->image)
                <img src="{{ asset('storage/'.$testimonial->image) }}" width="120">
            @endif
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
                <option value="1" {{ $testimonial->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $testimonial->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary">Update Testimonial</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
