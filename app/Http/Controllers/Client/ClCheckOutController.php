<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\Size;
use App\Models\TransportFee;
use App\Models\UserCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ClCheckOutController extends Controller
{
    public function index()
    {
        $title = 'Thanh toán';
        $users = auth()->user();
        $cart = Cart::where('user_id', auth()->id())->get();
        // Lấy thông tin mã giảm giá từ session
        $couponId = Session::get('applied_coupon_id');
        $couponDiscount = 0;
        $appliedCouponCode = null;
        $subTotal = $this->calculateSubTotal($cart);

        if ($couponId) {
            $coupon = Coupon::find($couponId);
            if ($coupon) {
                if ($subTotal >= $coupon->min_price) {
                    if ($coupon->discount_type === 'percentage') {
                        $couponDiscount = ($coupon->discount / 100) * $subTotal;
                    } elseif ($coupon->discount_type === 'fixed') {
                        $couponDiscount = $coupon->discount;
                    }
                    if ($couponDiscount > $coupon->max_price) {
                        $couponDiscount = $coupon->max_price;
                    }
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
        $totalPrice = $subTotal - $couponDiscount + $transportFee;
        $discountedPrice = $totalPrice * 0.9;
        $savedCoupons = UserCoupon::where('user_id', auth()->id())
            ->whereNull('used_at')
            ->pluck('coupon_id')
            ->toArray();

        $allCoupons = Coupon::where(function ($query) use ($savedCoupons) {
            $query->whereIn('id', $savedCoupons)
                ->orWhere('user_specific', 0)
                ->where('usage_limit', '>', 0);
        })->whereDate('end_date', '>=', now())->get();
        return view('client.pages.checkout', compact('title', 'couponDiscount', 'allCoupons', 'users', 'appliedCouponCode', 'transportFee', 'totalPrice', 'discountedPrice'));
    }
    public function applyCoupon(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())->get();
        $couponCode = $request->input('coupon_code');
        $coupon = Coupon::where('code', $couponCode)
            ->whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->first();
        if ($coupon && $this->canUseCoupon($coupon, auth()->id())) {
            $subTotal = $this->calculateSubTotal($cart);
            if ($subTotal < $coupon->min_price) {
                return redirect()->back()->with('ermsg', 'Mã giảm giá không áp dụng với đơn hàng bé hơn ' . number_format($coupon->min_price));
            }
            if ($coupon->user_specific == 0 && $coupon->usage_limit <= 0) {
                return redirect()->back()->with('ermsg', 'Mã giảm giá đã hết số lượt sử dụng');
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

    private function canUseCoupon($coupon, $userId)
    {
        if ($coupon->user_specific) {
            return UserCoupon::where('user_id', $userId)
                ->where('coupon_id', $coupon->id)
                ->whereNull('used_at')
                ->exists();
        }
        return true;
    }
    public function checkout(Request $request)
    {
        $user = auth()->user();
        $data = $request->only('name', 'email', 'phone', 'address');
        $data['user_id'] = $user->id;
        $couponId = Session::get('applied_coupon_id');

        $data['coupon_id'] = $couponId;

        //So sánh tồn kho với cart
        $insufficientStock = []; 
        foreach ($user->carts as $cart) {
            $colorId = Color::where('name', $cart->color)->first()->id;
            $sizeId = Size::where('name', $cart->size)->first()->id;
            $productDetail = ProductDetail::where('product_id', $cart->product_id)
                ->where('color_id', $colorId)
                ->where('size_id', $sizeId)
                ->first();

            if ($productDetail && $productDetail->quantity < $cart->quantity) {
                $insufficientStock[] = [
                    'product' => $cart->product->name,
                    'color' => $cart->color,
                    'size' => $cart->size,
                    'available' => $productDetail->quantity,
                    'requested' => $cart->quantity,
                ];
            }
        }
        if (!empty($insufficientStock)) {
            return redirect()->back()->with('ermsg', 'Số lượng mua hàng vượt quá tồn kho cho các sản phẩm')->with('stockErrors', $insufficientStock);
        }

        if ($order = Order::create($data)) {
            $token = Str::random(40);
            foreach ($user->carts as $cart) {
                $orderDetailData = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                ];
                OrderDetail::create($orderDetailData);

                // Cập nhật số lượng sản phẩm theo màu sắc và kích thước
                $colorId = Color::where('name', $cart->color)->first()->id;
                $sizeId = Size::where('name', $cart->size)->first()->id;
                $productDetail = ProductDetail::where('product_id', $cart->product_id)
                    ->where('color_id', $colorId)
                    ->where('size_id', $sizeId)
                    ->first();

                if ($productDetail) {
                    $productDetail->quantity -= $cart->quantity;
                    $productDetail->save();
                }
            }

            // Xóa giỏ hàng của người dùng
            Cart::where('user_id', $user->id)->delete();

            // Cập nhật sử dụng mã giảm giá của người dùng
            UserCoupon::where('user_id', auth()->id())
                ->where('coupon_id', $couponId)
                ->update(['used_at' => now()]);

            // Tăng số lượng sử dụng mã giảm giá
            $coupon = Coupon::find($couponId);
            $coupon->increment('usage_count');

            // Nếu user_specific = 0 thì giảm usage_limit đi 1
            if ($coupon->user_specific == 0) {
                $coupon->decrement('usage_limit');
            }

            // Xóa mã giảm giá đã áp dụng khỏi phiên làm việc
            session()->forget('applied_coupon_id');

            // Lưu token đơn hàng và gửi email xác nhận
            $order->token = $token;
            $order->save();
            Mail::to($user->email)->send(new OrderMail($order, $token));
            return redirect()->route('account.hoadon')->with('ssmsg', 'Vui lòng check mail để xác thực đơn hàng');
        }
    }
}
