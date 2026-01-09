@extends('admin.include.admin')

@section('title','Blog')

@section('content')
<div class="container">
    <h4 class="my-3">Blogs</h4>

    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">
        + Add Blog
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Image</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->author }}</td>
                <td>{{ $blog->publish_date }}</td>
                <td><img src="{{ asset('storage/'.$blog->image) }}" width="80"></td>
                <td>
                    <span class="badge {{ $blog->status ? 'bg-success':'bg-danger' }}">
                        {{ $blog->status ? 'Active':'Inactive' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.blogs.edit',$blog->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form method="POST" action="{{ route('admin.blogs.destroy',$blog->id) }}"
                          class="d-inline" onsubmit="return confirm('Delete blog?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $blogs->links() }}
</div>
@endsection
