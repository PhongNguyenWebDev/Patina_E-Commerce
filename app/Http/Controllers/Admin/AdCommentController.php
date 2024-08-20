<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdCommentController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Bình Luận';
        $comments = Comment::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.comment.comments', $this->data, compact('comments'));
    }
    public function update($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = $request->status;
        $comment->save();

        return redirect()->route('admin.comments.index')->with('ssmsg', 'Cập nhật trạng thái thành công');
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
        // $comments = Comment::find($id);
        // if (!$comments) {
        //     return redirect()->route('admin.comments.index')->with('ermsg', 'Không tìm thấy comment cần xóa');
        // }
        // Comment::destroy($id);
        // return redirect()->route('admin.comments.index')->with('ssmsg', 'Xóa comment thành công');
    }
}
