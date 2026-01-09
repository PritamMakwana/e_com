@extends('admin.include.admin')

@section('title', 'Slider')

@section('content')
    <div class="container">
        <h4 class="my-3">Sliders</h4>

        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mb-3">
            + Add Slider
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sliders as $slider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $slider->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $slider->image) }}" width="120">
                        </td>
                        <td>
                            <span class="badge {{ $slider->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $slider->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this slider?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No sliders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-muted">
                Showing {{ $sliders->firstItem() }} to {{ $sliders->lastItem() }}
                of {{ $sliders->total() }} entries
            </div>

            <div>
                {{ $sliders->links() }}
            </div>
        </div>
    </div>
@endsection
