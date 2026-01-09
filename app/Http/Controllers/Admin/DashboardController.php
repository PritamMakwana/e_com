<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'products'       => Product::count(),
            'categories'     => Category::count(),
            'blogs'     => Blog::count(),
            'testimonials'     => Testimonial::count(),
        ]);
    }
}
