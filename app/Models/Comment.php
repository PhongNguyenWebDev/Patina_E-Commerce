<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id', 'user_id', 'blog_id', 'parent_id', 'content', 'left', 'right', 'status'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->parent_id) {
                $parent = static::find($model->parent_id);
                $model->left = $parent->right;
                $model->right = $parent->right + 1;

                static::where('blog_id', $model->blog_id)
                    ->where('right', '>=', $parent->right)
                    ->increment('right', 2);

                static::where('blog_id', $model->blog_id)
                    ->where('left', '>', $parent->right)
                    ->increment('left', 2);
            } else {
                $rightMost = static::where('blog_id', $model->blog_id)->orderBy('right', 'desc')->first();
                if ($rightMost) {
                    $model->left = $rightMost->right + 1;
                    $model->right = $rightMost->right + 2;
                } else {
                    $model->left = 1;
                    $model->right = 2;
                }
            }
        });
    }
}
