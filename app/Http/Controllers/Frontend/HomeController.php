<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->latest()->get();
        $banners = Banner::where('status', 1)->latest()->get();
        $categories = Category::where('status', 1)->latest()->get();
        $categorieCount = Category::where('status', 1)->count();
        $featuredProducts = Product::visible()->featured()->latest()->get();
        $dealProducts =  Product::visible()->deal()->latest()->get();
        $discountProducts = Product::visible()->discount()->latest()->get();
        $bestSelling =    Product::visible()->bestSelling()->latest()->get();
        $trendingProducts = Product::visible()->trending()->latest()->get();

        $blogs = Blog::where('status', 1)
            ->orderBy('publish_date', 'desc')
            ->take(4)
            ->get();

        $testimonials = Testimonial::where('status', 1)
            ->latest()
            ->take(4)
            ->get();


        return view('frontend.home', compact(
            'sliders',
            'banners',
            'categories',
            'categorieCount',
            'featuredProducts',
            'dealProducts',
            'discountProducts',
            'bestSelling',
            'trendingProducts',
            'blogs',
            'testimonials'
        ));
    }

    public function wishlist()
    {
        return view('frontend.wishlist');
    }

    public function cart()
    {
        return view('frontend.cart');
    }
}
