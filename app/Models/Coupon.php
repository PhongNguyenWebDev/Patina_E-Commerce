<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'discount',
        'min_price',
        'max_price',
        'usage_limit',
        'usage_count',
        'user_specific',
        'created_at',
        'updated_at',
        'start_date',
        'end_date',
    ];
    protected $dates = ['deleted_at'];
    public function userCoupons()
    {
        return $this->hasMany(UserCoupon::class);
    }
}
