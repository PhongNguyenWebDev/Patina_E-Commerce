<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class ClBlogController extends Controller
{
    public function blog()
    {
        $title = 'Blog';
        $blogs = Blog::all();
        return view('client.pages.blog', compact('title', 'blogs'));
    }

    public function blogDetail($blogSlug)
    {
        $title = 'Bài viết chi tiết';
        $blog = Blog::where('slug', $blogSlug)->firstOrFail();
        $comments = $this->showComment($blog->id);
        return view('client.pages.blog-detail', compact('title', 'blog', 'comments'));
    }

    public function showComment($blogId)
    {
        $comments = Comment::where('blog_id', $blogId)->whereNull('parent_id')->with('children')->get();
        return $comments;
    }
    public function storeComment(Request $request, $blogId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        if (!auth()->check()) {
            return redirect()->back()->withErrors(['message' => 'Bạn cần đăng nhập để bình luận.']);
        }

        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'blog_id' => $blogId,
        ]);

        return redirect()->back();
    }

    public function replyComment(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        if (!auth()->check()) {
            return redirect()->back()->withErrors(['message' => 'Bạn cần đăng nhập để phản hồi.']);
        }

        $parentComment = Comment::findOrFail($commentId);

        Comment::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'blog_id' => $parentComment->blog_id, // Đảm bảo rằng blog_id được truyền vào từ comment gốc
            'parent_id' => $commentId,
        ]);

        return redirect()->back();
    }
    public function editComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Kiểm tra xem người dùng có quyền chỉnh sửa comment không
        if (!auth()->check() || auth()->id() !== $comment->user_id) {
            return redirect()->back()->withErrors(['message' => 'Bạn không có quyền chỉnh sửa comment này.']);
        }

        return view('client.comment-edit', compact('comment'));
    }
    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Kiểm tra xem người dùng có quyền xóa comment không
        if (!auth()->check() || auth()->id() !== $comment->user_id) {
            return redirect()->back()->withErrors(['message' => 'Bạn không có quyền xóa comment này.']);
        }

        $blogSlug = $comment->blog->slug; // Lấy slug của blog để redirect sau khi xóa

        $comment->delete();

        return redirect()->route('client.blog-detail', $blogSlug)->with('success', 'Comment đã được xóa thành công.');
    }
}
