<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $appends = ['Price','subTotal'];
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'size',
        'color',
        'quantity',
    ];
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function getPriceAttribute()
    {
        return $this->product->sale_price ? $this->product->sale_price : $this->product->price;
    }
    public function getSubTotalAttribute()
    {
        $subTotal = 0;
        $carts = Cart::where('user_id', $this->user_id)->get();
        foreach ($carts as $cart) {
            $subTotal += $cart->price * $cart->quantity;
        }
        return $subTotal;
    }
}
