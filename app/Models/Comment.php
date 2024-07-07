<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['parent_id', 'user_id', 'blog_id', 'content', 'left', 'right'];

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id')->orderBy('left');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // Phương thức để thêm bình luận mới vào cây
    public static function addComment($data)
    {
        $parent = self::find($data['parent_id']);

        if (!$parent) {
            return null; // Xử lý logic nếu không tìm thấy parent comment
        }

        $right = $parent->right;

        self::where('right', '>=', $right)->increment('right', 2);
        self::where('left', '>', $right)->increment('left', 2);

        $data['left'] = $right;
        $data['right'] = $right + 1;

        return self::create($data);
    }
}
