<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class ClCommentController extends Controller
{
    public function store(Request $request, $blogId)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Comment::addComment([
            'parent_id' => $request->parent_id,
            'user_id' => auth()->id(),
            'blog_id' => $blogId,
            'content' => $request->content,
        ]);

        return back()->with('success', 'Bình luận của bạn đã được gửi thành công.');
    }
}
