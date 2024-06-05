<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdSliderController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Slider';
        $sliders = Slider::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.sliders.slider', $this->data, compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Slider';
        return view('admin.pages.sliders.themslider', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $sliders = Slider::create($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/sliders', $imageName);

            $sliders->image = Storage::url('public/sliders/' . $imageName);
        }
        $sliders->save();
        return redirect()->route('admin.sliders.index')->with('ssmsg', 'Thêm thành công một slider mới');
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
        $this->data['title'] = 'Sửa Slider';
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('admin.sliders.index')->with('ermsg', 'Không tìm thấy slider cần sửa');
        }
        return view('admin.pages.sliders.editslider', $this->data, compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, string $id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('admin.sliders.index')->with('ermsg', 'Không tìm thấy slider cần sửa');
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/sliders', $imageName);

            $slider->image = '/storage/sliders/' . $imageName;
        }
        $slider->update($request->except('image'));
        return redirect()->route('admin.sliders.index')->with('ssmsg', 'Sửa slider thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('admin.sliders.index')->with('ermsg', 'Không tìm thấy slider cần xóa');
        }
        Slider::destroy($id);
        return redirect()->route('admin.sliders.index')->with('ssmsg', 'Xóa slider thành công');
    }
}
