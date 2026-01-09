@extends('admin.include.admin')

@section('title','Testimonial')

@section('content')
<div class="container">
    <h4 class="my-3">Testimonials</h4>

    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mb-3">
        + Add Testimonial
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Message</th>
                <th>Image</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ Str::limit($testimonial->message, 50) }}</td>
                    <td>
                        @if($testimonial->image)
                            <img src="{{ asset('storage/'.$testimonial->image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ $testimonial->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $testimonial->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                           class="btn btn-sm btn-info">Edit</a>

                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this testimonial?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No testimonials found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="text-muted">
            Showing {{ $testimonials->firstItem() }} to {{ $testimonials->lastItem() }}
            of {{ $testimonials->total() }} entries
        </div>
        <div>
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection
