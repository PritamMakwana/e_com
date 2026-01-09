<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // LIST
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.banners.index', compact('banners'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.banners.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'image'  => 'required|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|boolean',
        ]);

        $imagePath = $request->file('image')->store('banners', 'public');

        Banner::create([
            'title'  => $request->title,
            'image'  => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner added successfully');
    }

    // EDIT FORM
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    // UPDATE
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('title', 'status');

        if ($request->hasFile('image')) {

            // Delete old image
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            // Store new image
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully');
    }

    // DELETE
    public function destroy(Banner $banner)
    {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully');
    }
}
