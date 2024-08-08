<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'content',
        'image',
        'quote',
        'author',
        'status',
        'created_at'
    ];
    public function getRouteKey()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function commentsCount()
    {
        return $this->comments()
            ->selectRaw('count(*) as total')
            ->groupBy('blog_id');
    }

    public function getCommentsCountAttribute()
    {
        return $this->commentsCount()->pluck('total')->first() ?? 0;
    }
}
