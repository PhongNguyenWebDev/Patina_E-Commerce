<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductTag;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Http\Request;
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
        $data = $request->all();
        $product = Product::create([
            'name' => $request->name,
            'summary' => $request->summary,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'hot' => $request->hot,
            'status' => $request->status,
        ]);

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $product->images = '/uploads/products/' . $imageName;
        }

        $product->slug = Str::slug($product->name, '-');
        $product->save();

        if ($request->hasFile('imgdetail')) {
            foreach ($request->file('imgdetail') as $imgdetail) {
                $imgName = $imgdetail->getClientOriginalName();
                $imgdetail->move(public_path('uploads/products'), $imgName);

                $gallery = new Gallery();
                $gallery->name = '/uploads/products/' . $imgName;
                $gallery->product_id = $product->id;
                $gallery->save();
            }
        }

        if (is_array($request->tags)) {
            foreach ($request->tags as $tagItem) {
                $tag = Tag::firstOrCreate(['name' => $tagItem]);
                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }

        foreach ($data['colors'] as $colorData) {
            $color = Color::firstOrCreate(['name' => $colorData['name']]);
            foreach ($colorData['sizes'] as $sizeData) {
                $size = Size::firstOrCreate(['name' => $sizeData['size']]);
                $productDetail = new ProductDetail();
                $productDetail->product_id = $product->id;
                $productDetail->color_id = $color->id;
                $productDetail->size_id = $size->id;
                $productDetail->quantity = $sizeData['quantity'];
                $productDetail->price = $sizeData['price'];
                $productDetail->sale_price = $sizeData['sale_price'];
                $productDetail->save();
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Thêm thành công một sản phẩm mới');
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
    public function update(ProductEditRequest $request, string $slug)
    {
        // dd($request->all());
        $product = Product::where('slug', $slug)->firstOrFail();
        if (!$product) {
            return redirect()->route('admin.products.index')->with('ermsg', 'Không tìm thấy sản phẩm cần sửa');
        }

        $product->update([
            'name' => $request->name,
            'summary' => $request->summary,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'hot' => $request->hot,
            'status' => $request->status,
        ]);

        if ($request->name !== $product->name) {
            $product->slug = Str::slug($request->name, '-');
        }

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $product->images = '/uploads/products/' . $imageName;
        }

        if ($request->hasFile('imgdetail')) {
            Gallery::where('product_id', $product->id)->delete();
            foreach ($request->file('imgdetail') as $imgdetail) {
                $imgName = $imgdetail->getClientOriginalName();
                $imgdetail->move(public_path('uploads/products'), $imgName);

                $gallery = new Gallery();
                $gallery->name = '/uploads/products/' . $imgName;
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

        if (is_array($request->color)) {
            foreach ($product->productDetails as $key => $productDetail) {
                $productDetail->update([
                    'color_id' => Color::firstOrCreate(['name' => $request->color[$key]])->id,
                    'size_id' => Size::firstOrCreate(['name' => $request->size[$key]])->id,
                    'quantity' => $request->quantity[$key],
                    'price' => $request->prices[$key],
                    'sale_price' => $request->sale_prices[$key],
                ]);
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
    public function trashedProducts()
    {
        $this->data['title'] = 'Sản Phẩm Đã Xóa';
        $products = Product::onlyTrashed()->paginate(6);
        return view('admin.pages.product.trashed', $this->data, compact('products'));
    }
    public function restore(string $slug)
    {
        $product = Product::onlyTrashed()->where('slug', $slug)->first();
        if (!$product) {
            return redirect()->route('admin.products.index')->with('ermsg', 'Không tìm thấy sản phẩm đã bị xóa để khôi phục');
        }

        $product->restore();

        return redirect()->route('admin.products.index')->with('ssmsg', 'Sản phẩm đã được khôi phục thành công');
    }
    public function forceDelete(string $slug)
    {
        $product = Product::onlyTrashed()->where('slug', $slug)->first();
        if (!$product) {
            return redirect()->route('admin.products.index')->with('ermsg', 'Không tìm thấy sản phẩm đã bị xóa để xóa hoàn toàn');
        }

        $product->forceDelete();

        return redirect()->route('admin.products.index')->with('ssmsg', 'Sản phẩm đã được xóa hoàn toàn thành công');
    }
}
