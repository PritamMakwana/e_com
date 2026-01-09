@extends('admin.include.admin')

@section('title', 'Add Product')

@section('content')
    <div class="container">
        <h4 class="my-3">Add Product</h4>

        {{-- GLOBAL ERROR (optional but recommended) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                Please fix the errors below.
            </div>
        @endif

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- CATEGORY --}}
            <label>Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Select</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
                <br>
            @enderror

            {{-- NAME --}}
            <label class="mt-2">Product Name <span class="text-danger">*</span></label>
            <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
                <br>
            @enderror

            {{-- DESCRIPTION --}}
            <label class="mt-2">Description <span class="text-danger">*</span></label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
                <br>
            @enderror

            {{-- PRICE --}}
            <label class="mt-2">Price <span class="text-danger">*</span></label>
            <input name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
                <br>
            @enderror

            {{-- DISCOUNT PRICE --}}
            <label class="mt-2">Discount Price</label>
            <input name="discount_price" value="{{ old('discount_price') }}" class="form-control">

            {{-- WEIGHT --}}
            <label class="mt-2">Weight</label>
            <input name="weight" value="{{ old('weight') }}" class="form-control">

            {{-- STOCK --}}
            <label class="mt-2">Stock Status</label>
            <select name="stock_status" class="form-control">
                <option value="in_stock" {{ old('stock_status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out_of_stock" {{ old('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock
                </option>
            </select>


            {{-- RATING --}}
            <label class="mt-2">Rating (1–5)</label>
            <select name="rating" class="form-control @error('rating') is-invalid @enderror">
                <option value="">Select Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                        {{ $i }} Star
                    </option>
                @endfor
            </select>

            @error('rating')
                <small class="text-danger">{{ $message }}</small><br>
                <br>
            @enderror

            {{-- IMAGE --}}
            <label class="mt-2">Image <span class="text-danger">*</span></label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
                <br>
            @enderror

            <hr>

            {{-- BOOLEAN FLAGS --}}
            @foreach ([
            'is_visible' => 'Visible Product',
            'is_deal' => 'Deal',
            'is_featured' => 'Featured',
            'is_discount' => 'Discount',
            'is_best_selling' => 'Best Selling',
            'is_trending' => 'Trending',
        ] as $key => $label)
                <div class="form-check">
                    <input type="checkbox" name="{{ $key }}" class="form-check-input"
                        {{ old($key) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $label }}</label>
                </div>
            @endforeach

            <button class="btn btn-success mt-3">Save</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
