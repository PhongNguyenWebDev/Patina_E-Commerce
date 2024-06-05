<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class AdCategoryController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Danh Mục';
        $category = Category::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.category.danhmuc', $this->data, [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Danh Mục';
        return view('admin.pages.category.themdanhmuc', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name, '-');
        Category::create($data);
        return redirect()->route('admin.category.index')->with('ssmsg', 'Thêm thành công một danh mục mới');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $this->data['title'] = 'Sửa Danh Mục';
        $category = Category::where('slug', $slug)->firstOrFail();
        if (!$category) {
            return redirect()->route('admin.category.index')->with('ermsg', 'Không tìm thấy danh mục cần sửa');
        }
        return view('admin.pages.category.editdanhmuc', $this->data, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        if (!$category) {
            return redirect()->route('admin.category.index')->with('ermsg', 'Không tìm thấy danh mục cần sửa');
        }
        
        $category->update(array_merge($request->all(), ['slug' => Str::slug($request->name, '-')]));
        return redirect()->route('admin.category.index')->with('ssmsg', 'Sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        if (!$category) {
            return redirect()->route('admin.category.index')->with('ermsg', 'Không tìm thấy danh mục cần xóa');
        }
        $category->delete();
        return redirect()->route('admin.category.index')->with('ssmsg', 'Xóa danh mục thành công');
    }
}
