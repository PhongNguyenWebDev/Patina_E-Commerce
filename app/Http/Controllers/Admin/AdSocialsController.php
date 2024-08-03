<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Models\Info;
use Illuminate\Http\Request;

class AdSocialsController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Mạng Xã Hội';
        $socials = Info::whereIn('name', ['Facebook', 'X','Instagram','Youtube'])->paginate(6);
        return view('admin.pages.social-network.social', $this->data, compact('socials'));
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
    public function store()
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
        $this->data['title'] = 'Sửa social';
        $social = Info::find($id);
        if (!$social) {
            return redirect()->route('admin.social-network.index')->with('ermsg', 'Không tìm thấy Mạng Xã Hội cần sửa');
        }
        return view('admin.pages.social-network.editsocial', $this->data, compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialRequest $request, string $id)
    {
        $social = Info::find($id);
        if (!$social) {
            return redirect()->route('admin.social-network.index')->with('ermsg', 'Không tìm thấy Mạng Xã Hội cần sửa');
        }
        $social->update($request->all());
        return redirect()->route('admin.social-network.index')->with('ssmsg', 'Sửa Mạng Xã Hội thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $social = Info::find($id);
        if (!$social) {
            return redirect()->route('admin.social-network.index')->with('ermsg', 'Không tìm thấy Mạng Xã Hội cần xóa');
        }
        Info::destroy($id);
        return redirect()->route('admin.social-network.index')->with('ssmsg', 'Xóa Mạng Xã Hội thành công');
    }
}
