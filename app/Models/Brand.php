<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'image',
        'name',
        'slug',
        
    ];
    public function getRouteKey()
    {
        return 'slug';
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
