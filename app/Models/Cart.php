<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $appends = ['Price', 'subTotal'];
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
    public function getColorIdByName($colorName)
    {
        $color = Color::where('name', $colorName)->first();
        return $color ? $color->id : null;
    }

    public function getPriceAttribute()
    {
        $colorId = $this->getColorIdByName($this->color);
        if ($colorId === null) {
            return 0;
        }

        $productDetail = $this->product->productDetails()
            ->where('color_id', $colorId)
            ->first();

        if ($productDetail) {
            return $productDetail->sale_price > 0 ? $productDetail->sale_price : $productDetail->price;
        }
        return 0;
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
