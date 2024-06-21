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
        return redirect()->route('home')->with('ermsg', 'Thêm vào giỏ hàng thất bại, vui lòng thử lại');
    }
}
