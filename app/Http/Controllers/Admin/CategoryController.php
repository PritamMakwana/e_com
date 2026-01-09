<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // LIST
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.categories.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'image'  => 'required|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name', 'status');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category added successfully');
    }

    // EDIT FORM
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // UPDATE
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name', 'status');
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {

            // remove old image
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    // DELETE
    public function destroy(Category $category)
    {
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
