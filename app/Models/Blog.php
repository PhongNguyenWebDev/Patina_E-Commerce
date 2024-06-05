<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'name',
        'slug',
        'content',
        'image',
        'quote',
        'author',
        'status'
    ];
    public function getRouteKey()
    {
        return 'slug';
    }
}
