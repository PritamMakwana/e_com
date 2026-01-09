@extends('admin.include.admin')

@section('title', 'Banner')

@section('content')
    <div class="container">
        <h4 class="my-3">Banners</h4>

        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">
            + Add Banner
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
                @forelse($banners as $banner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $banner->title }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $banner->image) }}" width="100">
                        </td>
                        <td>
                            <span class="badge {{ $banner->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $banner->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this banner?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No banners found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-muted">
                Showing {{ $banners->firstItem() }} to {{ $banners->lastItem() }}
                of {{ $banners->total() }} entries
            </div>

            <div>
                {{ $banners->links() }}
            </div>
        </div>
    </div>
@endsection
