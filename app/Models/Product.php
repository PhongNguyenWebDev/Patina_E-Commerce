<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'images',
        'summary',
        'price',
        'sale_price',
        'description',
        'status',
        'hot',
        'slug',
        'brand_id',
        'category_id',
        'total_buy'
    ];
    protected $dates = ['deleted_at'];
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
}
