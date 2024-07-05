<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\TransportFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClCheckOutController extends Controller
{
    public function index()
    {
        $title = 'Thanh toán';
        $users = auth()->user();
        $cart = Cart::where('user_id', auth()->id())->get();
        // Lấy thông tin mã giảm giá từ session
        $couponId = Session::get('applied_coupon_id');
        $couponCode = Session::get('applied_coupon_id') ? Coupon::find(Session::get('applied_coupon_id')) : null;
        $couponDiscount = 0;
        $appliedCouponCode = null;

        if ($couponId) {
            $coupon = Coupon::find($couponId);
            if ($coupon) {
                $subTotal = $this->calculateSubTotal($cart);
                if ($subTotal >= $coupon->min_price) {
                    $couponDiscount = $coupon->discount;
                    $appliedCouponCode = $coupon->code;
                } else {
                    Session::forget('applied_coupon_id');
                    $couponId = null;
                }
            } else {
                Session::forget('applied_coupon_id');
                $couponId = null;
            }
        }

        $transportFee = $this->calculateTransportFee($users->address);
        $totalPrice = $this->calculateTotalPrice($cart, $couponDiscount, $transportFee);

        return view('client.pages.checkout', compact('title','couponCode', 'couponDiscount', 'users', 'appliedCouponCode', 'transportFee', 'totalPrice'));
    }
    public function applyCoupon(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())->get();
        $couponCode = $request->input('coupon_code');
        $coupon = Coupon::where('code', $couponCode)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->first();

        if ($coupon) {
            $subTotal = $this->calculateSubTotal($cart);
            if ($subTotal < $coupon->min_price) {
                return redirect()->back()->with('ermsg', 'Mã giảm giá không áp dụng với đơn hàng bé hơn ' . number_format($coupon->min_price));
            }
            Session::put('applied_coupon_id', $coupon->id);
            return redirect()->back()->with('ssmsg', 'Đã áp dụng mã giảm giá');
        } else {
            return redirect()->back()->with('ermsg', 'Mã giảm giá không hợp lệ');
        }
    }

    private function calculateSubTotal($cart)
    {
        $subTotal = 0;
        foreach ($cart as $item) {
            $subTotal += $item->price * $item->quantity;
        }
        return $subTotal;
    }

    private function calculateTransportFee($userAddress)
    {
        $transportFee = 2;
        $freeTransportLocations = TransportFee::pluck('name')->toArray();
        foreach ($freeTransportLocations as $location) {
            if (stripos($userAddress, $location) !== false) {
                $transportFee = 0;
                break;
            }
        }
        return $transportFee;
    }

    private function calculateTotalPrice($cart, $couponDiscount, $transportFee)
{
    $subTotal = $this->calculateSubTotal($cart);
    $discountedAmount = 0;
    $coupon = Session::get('applied_coupon_id') ? Coupon::find(Session::get('applied_coupon_id')) : null;
    
    if ($coupon && $coupon->discount_type === 'percentage') {
        $discountedAmount = ($couponDiscount / 100) * $subTotal;
    } elseif ($coupon && $coupon->discount_type === 'fixed') {
        $discountedAmount = $couponDiscount;
    }

    $totalPrice = $subTotal - $discountedAmount + $transportFee;
    return $totalPrice;
}

}