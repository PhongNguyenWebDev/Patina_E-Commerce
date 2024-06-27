<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['reviews', 'rating_point', 'user_id', 'product_detail_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class, 'product_detail_id');
    }
}
