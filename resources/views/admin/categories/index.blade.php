@extends('admin.include.admin')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <h4 class="my-3">Categories</h4>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">
            + Add Category
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" width="80">
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $category->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $category->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No categories found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-muted">
                Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }}
                of {{ $categories->total() }} entries
            </div>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
