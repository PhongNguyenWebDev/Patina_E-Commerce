<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class AdCouponController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Coupon';
        $coupons = Coupon::paginate(6);
        return view('admin.pages.coupon.coupons', $this->data, compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Coupon';
        return view('admin.pages.coupon.themcoupon', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        if (!Coupon::create($request->all())) {
            return view('admin.pages.coupon.themcoupon');
        }
        return redirect()->route('admin.coupons.index')->with('ssmsg', 'Thêm thành công một Coupon mới');
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
        $this->data['title'] = 'Sửa coupon';
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons.index')->with('ermsg', 'Không tìm thấy Coupon cần sửa');
        }
        return view('admin.pages.coupon.editcoupon', $this->data, compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons.index')->with('ermsg', 'Không tìm thấy Coupon cần sửa');
        }
        $coupon->update($request->all());
        return redirect()->route('admin.coupons.index')->with('ssmsg', 'Sửa Coupon thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->route('admin.coupons.index')->with('ermsg', 'Không tìm thấy Coupon cần xóa');
        }
        Coupon::destroy($id);
        return redirect()->route('admin.coupons.index')->with('ssmsg', 'Xóa Coupon thành công');
    }
}

