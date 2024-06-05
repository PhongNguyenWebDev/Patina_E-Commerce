<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdBlogController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Bài Viết';
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.blog.baiviet', $this->data, compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Bài Viết';
        return view('admin.pages.blog.thembaiviet', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $blogs = Blog::create($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/blogs', $imageName);

            $blogs->image = Storage::url('public/blogs/' . $imageName);
        }
        $blogs->slug = Str::slug($blogs->name, '-');
        $blogs->save();
        return redirect()->route('admin.blog.index')->with('ssmsg', 'Thêm thành công một tin tức mới');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $this->data['title'] = 'Sửa Bài Viết';
        $blog = Blog::where('slug', $slug)->first();
        if (!$blog) {
            return redirect()->route('admin.blog.index')->with('ermsg', 'Không tìm thấy tin tức cần sửa');
        }
        return view('admin.pages.blog.editbaiviet', $this->data, compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if (!$blog) {
            return redirect()->route('admin.blog.index')->with('ermsg', 'Không tìm thấy tin tức cần sửa');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/blogs', $imageName);

            $blog->image = '/storage/blogs/' . $imageName;
        }

        $blog->update($request->except('image'));

        if ($request->name !== $blog->name) {
            $blog->slug = Str::slug($request->name, '-');
        }
        $blog->save();
        return redirect()->route('admin.blog.index')->with('ssmsg', 'Sửa tin tức thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if (!$blog) {
            return redirect()->route('admin.blog.index')->with('ermsg', 'Không tìm thấy bài viết cần xóa');
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('ssmsg', 'Xóa bài viết thành công');
    }
}
