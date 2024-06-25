<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ClCartController extends Controller
{
    public function cart()
    {
        $title = 'Giỏ Hàng';
        $cart = Cart::where('user_id', auth()->id())->get();
        if ($cart->isEmpty()) {
            return redirect()->route('client.home-page')->with('ermsg', 'Giỏ hàng trống');
        }
        return view('client.pages.cart', compact('title', 'cart'));
    }
    public function add(Product $product, Request $request)
    {
        $quantity = $request->quantity ? floor($request->quantity) : 1;
        $size = Size::findOrFail($request->size_id)->name;
        $color = Color::findOrFail($request->color_id)->name;
        $user_id = auth()->id();
        $cartExist = Cart::where([
            'user_id' => $user_id,
            'product_id' => $product->id,
            'color' => $color,
            'size' => $size,
        ])->first();

        if ($cartExist) {
            $cartExist->increment('quantity', $quantity);
            return redirect()->route('client.cart-page.index')->with('ssmsg', 'Thêm vào giỏ hàng thành công');
        } else {
            $data = [
                'user_id' => $user_id,
                'product_id' => $product->id,
                'size' => $size,
                'color' =>  $color,
                'quantity' => $quantity,
            ];
            if (Cart::create($data)) {
                return redirect()->route('client.cart-page.index')->with('ssmsg', 'Thêm vào giỏ hàng thành công');
            }
        }
        return redirect()->route('client.home-page')->with('ermsg', 'Thêm vào giỏ hàng thất bại, vui lòng thử lại');
    }
    public function update($id, Request $request)
    {
        $quantity = $request->quantity;
        $carts = Cart::find($id);

        if ($carts) {
            // Cập nhật số lượng trong cơ sở dữ liệu
            $carts->update([
                'quantity' => $quantity
            ]);

            // Tính toán lại subtotal
            $subTotal = $carts->quantity * $carts->price; // Ví dụ tính toán lại subtotal

            return response()->json([
                'quantity' => $carts->quantity,
                'subTotal' => $subTotal
            ]);
        }

        return response()->json(['error' => 'Không tìm thấy sản phẩm trong giỏ hàng.'], 404);
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $cart->delete();
            return redirect()->route('client.cart-page.index')->with('ssmsg', 'Đã xóa sản phẩm khỏi giỏ hàng');
        }
        return redirect()->route('client.cart-page.index')->with('ermsg', 'Xóa sản phẩm khỏi giỏ hàng thất bại');
    }
}
