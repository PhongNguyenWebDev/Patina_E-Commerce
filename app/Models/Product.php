<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'images','summary', 'price', 'sale_price', 'description', 
        'quantity_available', 'quantity_sold', 'status','hot', 'slug', 
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
        return $this->belongsToMany(Color::class, 'product_color');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag');
    }

}
