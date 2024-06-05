<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'discount',
        'min_price',
        'start_date',
        'end_date',
    ];
}
