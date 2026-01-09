<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'discount_price',
        'weight',
        'stock_status',
        'rating',
        'image',
        'is_visible',
        'is_deal',
        'is_featured',
        'is_discount',
        'is_best_selling',
        'is_trending'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
