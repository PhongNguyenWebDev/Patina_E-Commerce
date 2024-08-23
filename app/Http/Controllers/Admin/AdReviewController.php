<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdReviewController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Đánh Giá';
        $reviews = Review::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.review.reviews', $this->data, compact('reviews'));
    }
    public function update($id, Request $request)
    {
        $review = Review::findOrFail($id);
        $review->status = $request->status;
        $review->save();

        return redirect()->route('admin.reviews.index')->with('ssmsg', 'Cập nhật trạng thái thành công');
    }
    public function destroy($id){
        $reviews = Review::find($id);
        if (!$reviews) {
            return redirect()->route('admin.reviews.index')->with('ermsg', 'Không tìm thấy đánh giá cần xóa');
        }
        Review::destroy($id);
        return redirect()->route('admin.reviews.index')->with('ssmsg', 'Xóa đánh giá thành công');
    }
}
