<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
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

        $totalPrice = $subTotal - $couponDiscount;
        $discountedPrice = $totalPrice * 0.9;
        Session::put('discounted_price', $discountedPrice);
        $savedCoupons = UserCoupon::where('user_id', auth()->id())
            ->whereNull('used_at')
            ->pluck('coupon_id')
            ->toArray();

        $allCoupons = Coupon::where(function ($query) use ($savedCoupons) {
            $query->whereIn('id', $savedCoupons)
                ->orWhere('user_specific', 0)
                ->where('usage_limit', '>', 0);
        })->whereDate('end_date', '>=', now())->get();
        return view('client.pages.checkout', compact('title', 'couponDiscount', 'allCoupons', 'users', 'appliedCouponCode', 'totalPrice', 'discountedPrice'));
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
    public function checkout(CheckoutRequest $request)
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
                    'name' => $cart->product->name,
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
                    // Trừ tồn kho
                    $productDetail->quantity -= $cart->quantity;
                    $productDetail->save();
                    // Cộng số lượng đã mua của sản phẩm
                    $product = Product::find($cart->product_id);
                    $product->total_buy += $cart->quantity;
                    $product->save();
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
            if ($coupon) {
                $coupon->increment('usage_count');
                // Nếu user_specific = 0 thì giảm usage_limit đi 1
                if ($coupon->user_specific == 0) {
                    $coupon->decrement('usage_limit');
                }
            }


            // Xóa mã giảm giá đã áp dụng khỏi phiên làm việc
            session()->forget('applied_coupon_id');

            // Lưu token đơn hàng và gửi email xác nhận
            $order->token = $token;
            $order->save();
            Mail::to($user->email)->send(new OrderMail($order, $token));
            return redirect()->route('client.account.hoadon')->with('ssmsg', 'Vui lòng check mail để xác thực đơn hàng');
        }
    }

    public function vnpay_payment()
    {
        $total = Session::get('discounted_price');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/checkout-page";
        $vnp_TmnCode = "448K3DUD"; //Mã website tại VNPAY 
        $vnp_HashSecret = "CTKW71DHRW3VJTQ0XGOD94MKIGYOZM1E"; //Chuỗi bí mật

        $vnp_TxnRef = '123123';
        $vnp_OrderInfo = "Bill Payment";
        $vnp_OrderType = "Thanh toán";
        $vnp_Amount = $total * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address = $_POST['txt_inv_addr1'];
        // $vnp_Bill_City = $_POST['txt_bill_city'];
        // $vnp_Bill_Country = $_POST['txt_bill_country'];
        // $vnp_Bill_State = $_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
        // $vnp_Inv_Email = $_POST['txt_inv_email'];
        // $vnp_Inv_Customer = $_POST['txt_inv_customer'];
        // $vnp_Inv_Address = $_POST['txt_inv_addr1'];
        // $vnp_Inv_Company = $_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type = $_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
            // "vnp_ExpireDate" => $vnp_ExpireDate,
            // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            // "vnp_Bill_Email" => $vnp_Bill_Email,
            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            // "vnp_Bill_LastName" => $vnp_Bill_LastName,
            // "vnp_Bill_Address" => $vnp_Bill_Address,
            // "vnp_Bill_City" => $vnp_Bill_City,
            // "vnp_Bill_Country" => $vnp_Bill_Country,
            // "vnp_Inv_Phone" => $vnp_Inv_Phone,
            // "vnp_Inv_Email" => $vnp_Inv_Email,
            // "vnp_Inv_Customer" => $vnp_Inv_Customer,
            // "vnp_Inv_Address" => $vnp_Inv_Address,
            // "vnp_Inv_Company" => $vnp_Inv_Company,
            // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            // "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
}
