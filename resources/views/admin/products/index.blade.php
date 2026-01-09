@extends('admin.include.admin')

@section('title', 'Products')

@section('content')
    <div class="container">
        <h4 class="my-3">Products</h4>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">
            + Add Product
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Flags</th>
                    <th width="160">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <img src="{{ asset('storage/' . $product->image) }}" width="70">
                        </td>

                        <td>{{ $product->name }}</td>

                        <td>{{ $product->category->name ?? '-' }}</td>

                        <td>
                            ₹{{ $product->price }} <br>
                            @if ($product->discount_price)
                                <small class="text-success">
                                    Discount: ₹{{ $product->discount_price }}
                                </small>
                            @endif
                        </td>

                        <td>
                            <span class="badge {{ $product->stock_status == 'in_stock' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst(str_replace('_', ' ', $product->stock_status)) }}
                            </span>
                        </td>

                        <td>
                            <div class="row g-1">

                                @if ($product->is_visible)
                                    <div class="col-6">
                                        <span class="badge bg-warning text-center">Visible</span>
                                    </div>
                                @else
                                    <div class="col-6">
                                        <span class="badge bg-danger text-center">Hidden Product</span>
                                    </div>
                                @endif

                                @if ($product->is_featured)
                                    <div class="col-6">
                                        <span class="badge bg-info text-center">Featured</span>
                                    </div>
                                @endif

                                @if ($product->is_deal)
                                    <div class="col-6">
                                        <span class="badge bg-primary text-center">Deal</span>
                                    </div>
                                @endif

                                @if ($product->is_discount)
                                    <div class="col-6">
                                        <span class="badge bg-warning text-center">Discount</span>
                                    </div>
                                @endif

                                @if ($product->is_best_selling)
                                    <div class="col-6">
                                        <span class="badge bg-success text-center">Best Selling</span>
                                    </div>
                                @endif

                                @if ($product->is_trending)
                                    <div class="col-6">
                                        <span class="badge bg-dark text-center">Trending</span>
                                    </div>
                                @endif
                            </div>
                        </td>

                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-between mt-3">
            <div class="text-muted">
                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }}
                of {{ $products->total() }} entries
            </div>
            {{ $products->links() }}
        </div>
    </div>
@endsection
