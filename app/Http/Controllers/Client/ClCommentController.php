<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClCommentController extends Controller
{
    public function store(Request $request, $blogId)
    {
        $request->validate([
            'content' => 'required|string',
            // Add more validation rules as needed
        ]);

        $blog = Blog::findOrFail($blogId);
        if (Auth::check()) {
            $comment = $blog->comments()->create([
                'user_id' => auth()->id(),
                'content' => $request->content,
                'parent_id' => $request->parent_id,
            ]);

            return back()->with('success', 'Comment added successfully');
        } else {
            return back()->with('error', 'Vui lòng đăng nhập để bình luận');
        }
    }

    public function reply(Request $request, Comment $parentComment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $blog = Blog::findOrFail($parentComment->blog_id);

        $comment = $blog->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'parent_id' => $parentComment->id,
        ]);

        return back();
    }


    public function destroy(Comment $comment)
    {
        if (is_null($comment->parent_id)) {
            // Xóa comment cha và tất cả các comment con
            $left = $comment->left;
            $right = $comment->right;

            // Tính độ rộng của khoảng cần xóa
            $width = $right - $left + 1;

            // Xóa các comment trong khoảng left-right
            Comment::whereBetween('left', [$left, $right])->delete();

            // Cập nhật lại các vị trí left, right của các comment còn lại
            Comment::where('right', '>', $right)->decrement('right', $width);
            Comment::where('left', '>', $right)->decrement('left', $width);
        } else {
            // Chỉ xóa comment được chỉ định
            $comment->delete();
        }

        return back()->with('success', 'Bình luận đã được xóa thành công.');
    }
}
