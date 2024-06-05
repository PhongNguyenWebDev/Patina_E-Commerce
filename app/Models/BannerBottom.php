<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerBottom extends Model
{
    use HasFactory;
    protected $table = 'banner_bottoms';
    protected $fillable = [
        'category',
        'name',
        'image',
        'sale',
        'link',
        'status',
    ];
}
