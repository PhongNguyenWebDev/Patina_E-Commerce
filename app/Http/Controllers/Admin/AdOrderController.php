<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdOrderController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Hóa Đơn Chưa Xác Nhận';
        $orders = Order::where('status',0)->orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.order.orders', $this->data, compact('orders'));
    }
    public function index1()
    {
        $this->data['title'] = 'Hóa Đơn Đã Xác Nhận';
        $orders = Order::where('status',1)->orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.order.orders', $this->data, compact('orders'));
    }
    public function index2()
    {
        $this->data['title'] = 'Hóa Đơn Đang Giao Hàng';
        $orders = Order::where('status',2)->orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.order.orders', $this->data, compact('orders'));
    }
    public function index3()
    {
        $this->data['title'] = 'Hóa Đơn Đã Thanh Toán';
        $orders = Order::where('status',3)->orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.order.orders', $this->data, compact('orders'));
    }
    public function index4()
    {
        $this->data['title'] = 'Hóa Đơn Đã Hủy';
        $orders = Order::where('status',4)->orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.order.orders', $this->data, compact('orders'));
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
    public function store(Request $request)
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
        $this->data['title'] = 'Cập nhật trạng thái hóa đơn';
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('ermsg', 'Không tìm thấy Hóa Đơn cần sửa');
        }
        return view('admin.pages.order.editorder', $this->data, compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('ermsg', 'Không tìm thấy Hóa Đơn cần sửa');
        }
        $order->update($request->all());
        return redirect()->route('admin.orders.index')->with('ssmsg', 'Sửa Hóa Đơn thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('ermsg', 'Không tìm thấy Hóa Đơn cần xóa');
        }
        Order::destroy($id);
        return redirect()->route('admin.orders.index')->with('ssmsg', 'Xóa Hóa Đơn thành công');
    }
}
