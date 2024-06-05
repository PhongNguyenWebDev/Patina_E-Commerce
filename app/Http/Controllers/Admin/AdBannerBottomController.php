<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerBotRequest;
use App\Models\BannerBottom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdBannerBottomController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Banner Bottom';
        $banners = BannerBottom::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.banner-bottom.banner', $this->data, compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Banner Bottom';
        return view('admin.pages.banner-bottom.thembanner', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerBotRequest $request)
    {
        $banner = BannerBottom::create($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/banners', $imageName);

            $banner->image = Storage::url('public/banners/' . $imageName);
        }
        $banner->save();
        return redirect()->route('admin.banner-bottom.index')->with('ssmsg', 'Thêm thành công một banner mới');
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
    public function edit(string $id)
    {
        $this->data['title'] = 'Sửa banner';
        $banner = BannerBottom::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner-bottom.index')->with('ermsg', 'Không tìm thấy banner cần sửa');
        }
        return view('admin.pages.banner-bottom.editbanner', $this->data, compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerBotRequest $request, string $id)
    {
        $banner = BannerBottom::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner-bottom.index')->with('ermsg', 'Không tìm thấy banner cần sửa');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/banners', $imageName);

            $banner->image = '/storage/banners/' . $imageName;
        }
        $banner->update($request->except('image'));
        return redirect()->route('admin.banner-bottom.index')->with('ssmsg', 'Sửa banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = BannerBottom::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner-bottom.index')->with('ermsg', 'Không tìm thấy banner cần xóa');
        }
        BannerBottom::destroy($id);
        return redirect()->route('admin.banner-bottom.index')->with('ssmsg', 'Xóa banner thành công');
    }
}
