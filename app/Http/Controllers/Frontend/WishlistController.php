<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $wishlist = session()->get('wishlist', []);

        $wishlist[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->discount_price ?? $product->price,
            'image' => $product->image
        ];

        session()->put('wishlist', $wishlist);

        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        $wishlist = session()->get('wishlist', []);
        unset($wishlist[$request->product_id]);
        session()->put('wishlist', $wishlist);

        return response()->json(['success' => true]);
    }
}
