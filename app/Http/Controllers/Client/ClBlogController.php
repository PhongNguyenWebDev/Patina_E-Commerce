<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

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
        $blogs = Blog::all()->where('slug', $blogSlug)->firstOrFail();
        return view('client.pages.blog-detail', compact('title', 'blogs'));
    }
}
