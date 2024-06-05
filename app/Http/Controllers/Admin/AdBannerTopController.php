<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerTopRequest;
use App\Models\BannerTop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdBannerTopController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Banner Top';
        $banners = BannerTop::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.banner-top.banner', $this->data, compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $this->data['title'] = 'Sửa Banner Top';
        $banner = BannerTop::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner-top.index')->with('ermsg', 'Không tìm thấy banner cần sửa');
        }
        return view('admin.pages.banner-top.editbanner', $this->data, compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerTopRequest $request, string $id)
    {
        $banner = BannerTop::find($id);
        if (!$banner) {
            return redirect()->route('admin.banner-top.index')->with('ermsg', 'Không tìm thấy banner cần sửa');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/banners', $imageName);

            $banner->image = '/storage/banners/' . $imageName;
        }
        $banner->update($request->except('image'));
        return redirect()->route('admin.banner-top.index')->with('ssmsg', 'Sửa banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
