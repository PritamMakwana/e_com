<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'price'           => 'required|numeric|min:0',
            'discount_price'  => 'nullable|numeric|min:0',
            'weight'          => 'nullable|string|max:50',
            'stock_status'   => 'required|in:in_stock,out_of_stock',
            'rating'          => 'nullable|integer|min:1|max:5',
            'image'           => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Image Upload
        $validated['image'] = $request->file('image')->store('products', 'public');

        // Boolean Flags
        $booleanFields = [
            'is_visible',
            'is_deal',
            'is_featured',
            'is_discount',
            'is_best_selling',
            'is_trending',
        ];

        foreach ($booleanFields as $field) {
            $validated[$field] = $request->boolean($field);
        }

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product added successfully');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id'     => 'required|exists:categories,id',
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'price'           => 'required|numeric|min:0',
            'discount_price'  => 'nullable|numeric|min:0',
            'weight'          => 'nullable|string|max:50',
            'stock_status'   => 'required|in:in_stock,out_of_stock',
            'rating'          => 'nullable|integer|min:1|max:5',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Image Replace
        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Boolean Flags
        $booleanFields = [
            'is_visible',
            'is_deal',
            'is_featured',
            'is_discount',
            'is_best_selling',
            'is_trending',
        ];

        foreach ($booleanFields as $field) {
            $validated[$field] = $request->boolean($field);
        }

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
