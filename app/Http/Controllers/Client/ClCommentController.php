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
            'content' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:comments,id', // Validate parent_id nếu có
        ]);

        $blog = Blog::findOrFail($blogId);

        if (Auth::check()) {
            // Tạo bình luận mới
            $comment = $blog->comments()->create([
                'user_id' => auth()->id(),
                'content' => $request->content,
                'parent_id' => $request->parent_id, // Thay đổi nếu bạn hỗ trợ bình luận trả lời
            ]);

            // Lấy danh sách bình luận mới nhất để cập nhật
            $comments = $blog->comments()->where('status', 1)->orderBy('created_at', 'asc')->get();

            // Render HTML cho danh sách bình luận
            $commentsHtml = view('client.pages.partials.comments', compact('comments'))->render();

            return response()->json([
                'success' => true,
                'commentsHtml' => $commentsHtml,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Vui lòng đăng nhập để bình luận',
            ]);
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
