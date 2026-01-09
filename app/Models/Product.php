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

    /* ---------- Scopes ---------- */
    public function scopeVisible($q)
    {
        return $q->where('is_visible', 1);
    }

    public function scopeFeatured($q)
    {
        return $q->where('is_featured', 1);
    }

    public function scopeDeal($q)
    {
        return $q->where('is_deal', 1);
    }

    public function scopeDiscount($q)
    {
        return $q->where('is_discount', 1);
    }

    public function scopeBestSelling($q)
    {
        return $q->where('is_best_selling', 1);
    }

    public function scopeTrending($q)
    {
        return $q->where('is_trending', 1);
    }
}
