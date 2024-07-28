<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\UserCoupon;
use Illuminate\Http\Request;

class ClCouponController extends Controller
{
    public function index(){
        $title = 'Danh sách voucher';
        $coupons= Coupon::where('user_specific',1)
        ->where('usage_limit','>', 0)->get();
        return view('client.pages.list-coupon', compact('title', 'coupons'));
    }
    public function add(Coupon $coupon)
    {
        $user_id = auth()->id();
        $usCpExist = UserCoupon::where([
            'user_id' => $user_id,
            'coupon_id' => $coupon->id,
        ])->first();

        if ($usCpExist) {
            return redirect()->route('client.list-coupon.index')->with('ermsg', 'Bạn đã lưu voucher này');
        } else {
            $data = [
                'user_id' => $user_id,
                'coupon_id' => $coupon->id,
                'saved_at' => now()
            ];
            if (UserCoupon::create($data)) {
                $coupon->decrement('usage_limit');
                return redirect()->route('client.list-coupon.index')->with('ssmsg', 'Bạn đã lưu voucher thành công');
            }
        }
        return redirect()->route('client.list-coupon.index')->with('ermsg', 'Bạn đã lưu voucher thất bại, vui lòng thử lại');
    }
}
