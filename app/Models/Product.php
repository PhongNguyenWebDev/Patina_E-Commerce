<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'images', 'summary', 'price', 'sale_price', 'description', 'status', 'hot', 'slug',
        'brand_id', 'category_id'
    ];

    public function getRouteKey()
    {
        return 'slug';
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_detail');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_detail');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }
    public static function popularProducts($limit = 5)
    {
        return self::select('products.*', DB::raw('SUM(order_details.quantity) as total_sold'))
            ->join('order_details', 'order_details.product_id', '=', 'products.id')
            ->groupBy('products.id')
            ->orderBy('total_sold', 'desc')
            ->take($limit)
            ->get();
    }
}
