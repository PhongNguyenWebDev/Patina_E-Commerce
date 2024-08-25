<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class ClBlogController extends Controller
{
    public function blog()
    {
        $title = 'Bài viết';
        $blogs = Blog::with('comments')->get();
        return view('client.pages.blog', compact('title', 'blogs'));
    }

    public function blogDetail($blogSlug)
    {
        $title = 'Bài viết chi tiết';
        $blog = Blog::where('slug', $blogSlug)->firstOrFail();
        $comments = $blog->comments()->where('status', 1)->orderBy('left')->get();
        $newBlogs = Blog::orderBy('created_at', 'desc')->get();

        return view('client.pages.blog-detail', compact('title', 'blog', 'comments', 'newBlogs'));
    }
}
