<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerTop extends Model
{
    use HasFactory;
    protected $table = 'banner_tops';
    protected $fillable = [
        'name',
        'image',
        'link',
    ];
}
