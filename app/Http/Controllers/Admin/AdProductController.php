<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductTag;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdProductController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Sản Phẩm';
        $products = Product::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.product.sanpham', $this->data, [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Sản Phẩm';
        $categorys = Category::all();
        $brands = Brand::all();
        return view('admin.pages.product.themsanpham', $this->data, compact('categorys', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $products = Product::create($request->all());

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);

            $products->images = Storage::url('public/products/' . $imageName);
        }
        $products->slug = Str::slug($products->name, '-');
        $products->save();

        if ($request->hasFile('imgdetail')) {
            foreach ($request->file('imgdetail') as $imgdetail) {
                $imgName = $imgdetail->getClientOriginalName();
                $imgdetail->storeAs('public/products', $imgName);

                $gallery = new Gallery();
                $gallery->name = Storage::url('public/products/' . $imgName);
                $gallery->product_id = $products->id;
                $gallery->save();
            }
        }
        if (is_array($request->tags)) {
            foreach ($request->tags as $tagItem) {
                $tags = Tag::firstOrCreate(['name' => $tagItem]);
                ProductTag::create([
                    'product_id' => $products->id,
                    'tag_id' => $tags->id,
                ]);
            }
        }
        if (is_array($request->sizes)) {
            foreach ($request->sizes as $sizeItem) {
                $sizes = Size::firstOrCreate(['name' => $sizeItem]);
                ProductSize::create([
                    'product_id' => $products->id,
                    'size_id' => $sizes->id,
                ]);
            }
        }
        if (is_array($request->colors)) {
            foreach ($request->colors as $colorItem) {
                $colors = Color::firstOrCreate(['name' => $colorItem]);
                ProductColor::create([
                    'product_id' => $products->id,
                    'color_id' => $colors->id,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('ssmsg', 'Thêm thành công một sản phẩm mới');
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
        $this->data['title'] = 'Sửa Sản Phẩm';
        $categorys = Category::all();
        $brands = Brand::all();
        $products = Product::where('slug', $slug)->firstOrFail();
        if (!$products) {
            return redirect()->route('admin.products.index')->with('ermsg', 'Không tìm thấy sản phẩm cần sửa');
        }
        return view('admin.pages.product.editsanpham', $this->data, compact('categorys', 'brands', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        if (!$product) {
            return redirect()->route('admin.products.index')->with('ermsg', 'Không tìm thấy sản phẩm cần sửa');
        }

        $product->update($request->all());

        if ($request->name !== $product->name) {
            $product->slug = Str::slug($request->name, '-');
        }

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            $product->images = Storage::url('public/products/' . $imageName);
        }
        if ($request->hasFile('imgdetail')) {
            foreach ($request->file('imgdetail') as $imgdetail) {
                $imgName = $imgdetail->getClientOriginalName();
                $imgdetail->storeAs('public/products', $imgName);
    
                $gallery = new Gallery();
                $gallery->name = Storage::url('public/products/' . $imgName);
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }

        if (is_array($request->tags)) {
            $product->tags()->detach(); 
            foreach ($request->tags as $tagItem) {
                $tag = Tag::firstOrCreate(['name' => $tagItem]);
                $product->tags()->attach($tag->id);
            }
        }
    
        if (is_array($request->sizes)) {
            $product->sizes()->detach(); 
            foreach ($request->sizes as $sizeItem) {
                $size = Size::firstOrCreate(['name' => $sizeItem]);
                $product->sizes()->attach($size->id);
            }
        }
    
        if (is_array($request->colors)) {
            $product->colors()->detach(); 
            foreach ($request->colors as $colorItem) {
                $color = Color::firstOrCreate(['name' => $colorItem]);
                $product->colors()->attach($color->id);
            }
        }
    
        $product->save();


        return redirect()->route('admin.products.index')->with('ssmsg', 'Sửa sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $products = Product::where('slug', $slug)->first();
        if (!$products) {
            return redirect()->route('admin.products.index')->with('ermsg', 'Không tìm thấy sản phẩm cần xóa');
        }
        $products->delete();
        return redirect()->route('admin.products.index')->with('ssmsg', 'Xóa sản phẩm thành công');
    }
}
