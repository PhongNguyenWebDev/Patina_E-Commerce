<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdHomeController extends Controller
{
    public $data = [];
    public function admin(Request $request)
    {
        $this->data['title'] = 'Thống Kê';
        $orders = Order::whereNotIn('status',[4] )->get();
        $ordersM =Order::where('status', 3)->get();

        $ordersTotalPrice = 0;

        foreach ($ordersM as $order) {
            $ordersTotalPrice += $order->totalPrice;
        }
        $contacts= Contact::all();
        $users = User::all();
        $products = Product::all();
        $comments = Comment::all();

        $cateCounts = [];

        foreach ($products as $product) {
            $categoryName = $product->category->name;

            if (isset($cateCounts[$categoryName])) {
                $cateCounts[$categoryName]++;
            } else {
                $cateCounts[$categoryName] = 1;
            }
        }

        $orderCounts = [];
        for ($i = 0; $i <= 4; $i++) {
            $orderCounts[$i] = Order::where('status', $i)->count();
        }
        $statusLabels = [
            "Chưa Xác Nhận",
            "Đã Xác Nhận",
            "Đang Giao Hàng",
            "Đã Giao Hàng",
            "Đã Hủy"
        ];

        $cateCounts = [];
        $categories = Category::all();
        foreach ($categories as $category) {
            $cateCounts[$category->name] = Product::where('category_id', $category->id)->count();
        }

        $startDateM = $request->input('startDateM');
        $startDateO = $request->input('startDateO');
        $endDate = $request->input('endDate');
        if (empty($endDate)) {
            $endDate = Carbon::now()->toDateString();;
        }
        if (!$startDateM) {
            $ordersMoneyPerDay = Order::select(DB::raw('DATE(orders.created_at) as date'), DB::raw('SUM(order_details.price * order_details.quantity) - SUM(IFNULL(coupons.discount, 0)) as total'))
                ->where('orders.status', 3)
                ->leftJoin('order_details', 'orders.id', '=', 'order_details.order_id')
                ->leftJoin('coupons', 'orders.coupon_id', '=', 'coupons.id')
                ->groupBy('date')
                ->take(15)
                ->orderBy('date', 'DESC')
                ->get();
        } else {
            $ordersMoneyPerDay = Order::select(DB::raw('DATE(orders.created_at) as date'), DB::raw('SUM(order_details.price * order_details.quantity) - SUM(IFNULL(coupons.discount, 0)) as total'))
                ->where('orders.status', 3)
                ->whereBetween('orders.created_at', [$startDateM, $endDate])
                ->leftJoin('order_details', 'orders.id', '=', 'order_details.order_id')
                ->leftJoin('coupons', 'orders.coupon_id', '=', 'coupons.id')
                ->groupBy('date')
                ->take(15)
                ->orderBy('date', 'DESC')
                ->get();
        }
        if (!$startDateO) {
            $ordersCountPerDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN status = 4 THEN 1 ELSE 0 END) as cancelled_total'))
                ->groupBy('date')
                ->take(15)
                ->orderBy('date', 'DESC')
                ->get();
        } else {
            $ordersCountPerDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'), DB::raw('SUM(CASE WHEN status = 4 THEN 1 ELSE 0 END) as cancelled_total'))
                ->whereBetween('created_at', [$startDateO, $endDate])
                ->groupBy('date')
                ->take(15)
                ->orderBy('date', 'DESC')
                ->get();
        }
        $ordersMoneyPerDay = $ordersMoneyPerDay->sortBy('date');
        $ordersCountPerDay = $ordersCountPerDay->sortBy('date');
        return view('admin.pages.home', $this->data, compact('orders', 'users', 'products', 'comments', 'orderCounts', 'statusLabels', 'ordersMoneyPerDay', 'ordersCountPerDay', 'cateCounts','ordersTotalPrice','contacts'));
    }
}
