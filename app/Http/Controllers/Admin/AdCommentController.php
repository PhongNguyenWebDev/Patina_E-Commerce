<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdCommentController extends Controller
{
    public $data=[];
    public function index(){
        $this->data['title'] = 'Bình Luận';
        $comments= Comment::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.comment.comments',$this->data,compact('comments'));
    }
    public function update($id, Request $request) {
        $comment = Comment::findOrFail($id);
        $comment->status = $request->status;
        $comment->save();
        
        return redirect()->route('admin.comments.index')->with('ssmsg', 'Cập nhật trạng thái thành công');
    }
    public function destroy(string $id)
    {
        $comments = Comment::find($id);
        if (!$comments) {
            return redirect()->route('admin.comments.index')->with('ermsg', 'Không tìm thấy comment cần xóa');
        }
        Comment::destroy($id);
        return redirect()->route('admin.comments.index')->with('ssmsg', 'Xóa comment thành công');
    }
}
