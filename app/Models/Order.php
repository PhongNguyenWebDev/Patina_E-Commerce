<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends = ['totalPrice'];
    protected $table = 'orders';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'token',
        'user_id',
        'coupon_id',
        'status',
        'reason'
    ];
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function coupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon_id');
    }
    public function getTotalPriceAttribute()
    {
        $total = 0;

        foreach ($this->details as $item) {
            $total += $item->price * $item->quantity;
        }

        $couponDiscount = $this->coupon->discount ?? 0;
        $total -= $couponDiscount;

        return $total;
    }
}
