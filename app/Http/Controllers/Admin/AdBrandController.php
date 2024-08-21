<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandEditRequest;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class AdBrandController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Brand';
        $brands = Brand::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.brands.brand', $this->data, compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Brand';
        return view('admin.pages.brands.thembrand', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data = Brand::create($request->all());
        $data['slug'] = Str::slug($request->name, '-');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads/brands'), $imageName);
            $data->image = '/uploads/brands/' . $imageName;
        }
        $data->save();
        return redirect()->route('admin.brands.index')->with('ssmsg', 'Thêm thành công một brand mới');
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
        $this->data['title'] = 'Sửa Brand';
        $brand = Brand::where('slug', $slug)->firstOrFail();
        if (!$brand) {
            return redirect()->route('admin.brands.index')->with('ermsg', 'Không tìm thấy brand cần sửa');
        }
        return view('admin.pages.brands.editbrand', $this->data, compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandEditRequest $request, string $slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        if (!$brand) {
            return redirect()->route('admin.brands.index')->with('ermsg', 'Không tìm thấy brand cần sửa');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads/brands'), $imageName);
            $brand->image = '/uploads/brands/' . $imageName;
        }
        $brand->update(array_merge($request->except('image'), ['slug' => Str::slug($request->name, '-')]));
        return redirect()->route('admin.brands.index')->with('ssmsg', 'Sửa brand thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        if (!$brand) {
            return redirect()->route('admin.brands.index')->with('ermsg', 'Không tìm thấy brand cần xóa');
        }
        if ($brand->products()->count() > 0) {
            return redirect()->route('admin.brands.index')->with('ermsg', 'Brand không thể xóa vì có sản phẩm liên quan.');
        }
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('ssmsg', 'Xóa brand thành công');
    }
}
