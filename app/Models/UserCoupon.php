<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
    use HasFactory;
    protected $table = 'user_coupons';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'coupon_id',
        'saved_at',
        'used_at',
    ];
}
