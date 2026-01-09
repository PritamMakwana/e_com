@extends('admin.include.admin')

@section('title', 'Add Slider')

@section('content')
    <div class="container">
        <h4 class="my-3">Add Slider</h4>

        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button class="btn btn-success">Save Slider</button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
