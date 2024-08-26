<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangPassRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClProfileController extends Controller
{
    public function profile()
    {
        if (Auth::check()) {
            $title = 'Thông Tin Cá Nhân';
            $user = Auth::user();
            $username = $user->name;
            $email = $user->email;
            $address = $user->address;
            $password = $user->password;
            return view('client.pages.accounts.profile', compact('title', 'username', 'email', 'address', 'password'));
        } else {
            return redirect()->route('logIn');
        }
    }
    public function UpdateSite()
    {
        if (Auth::check()) {
            $title = 'Cập nhật thông tin';
            $users = Auth::user();
            return view('client.pages.accounts.update', compact('title', 'users'));
        } else {
            return redirect()->route('logIn');
        }
    }
    public function hoadon()
    {
        $title = 'Hóa đơn';
        $users = auth()->user();
        $orders = Order::where('user_id', $users->id)->orderBy('id', 'desc')->paginate(6);
        return view('client.pages.accounts.bill', compact('title', 'orders'));
    }
    public function cancelOrder(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('client.account.hoadon')->with('ermsg', 'Không tìm thấy hóa đơn');
        }
        if ($order->status == 5) {
            return redirect()->route('client.account.hoadon')->with('ermsg', 'Bạn đã hủy đơn hàng này');
        }
        if ($order->status != 0 && $order->status != 1) {
            return redirect()->route('client.account.hoadon')->with('ermsg', 'Không thể hủy đơn hàng đã được xử lý');
        }
        
        $order->status = 5;
        $order->reason = $request->input('reason', 'Không có lý do');
        $order->save();

        return redirect()->route('client.account.hoadon')->with('ssmsg', 'Đơn hàng đã được hủy');
    }

    public function showhoadon($id)
    {
        $title = 'Chi tiết hóa đơn';
        $order = Order::find($id);
        if (!$order) {
            return redirect()->route('account.profile')->with('ermsg', 'Không tìm thấy hóa đơn');
        }
        return view('client.pages.accounts.hoadonchitiet', compact('title', 'order'));
    }

    public function update()
    {
        $title = "Cập nhật thông tin tài khoản";
        $users = auth()->user();
        return view('client.pages.accounts.update', compact('title', 'users'));
    }
    public function check_update(ProfileRequest $request)
    {
        $users = auth()->user();
        $data = $request->only('name', 'phone', 'email', 'address');
        $check = User::where('id', $users->id)->update($data);
        if ($check) {
            return redirect()->route('client.account.profile-page')->with('ssmsg', 'Cập nhật thông tin thành công');
        }
        return redirect()->route('client.account.update')->with('ermsg', 'Cập nhật thông tin thất bại');
    }
    public function updatePass()
    {
        $title = "Thay đổi mật khẩu";
        $users = auth()->user();
        return view('client.pages.accounts.doimatkhau', compact('title', 'users'));
    }
    public function check_updatePass(ChangPassRequest $request)
    {
        $users = auth()->user();
        $data['password'] = bcrypt($request->password);
        if (User::where('id', $users->id)->update($data)) {
            return redirect()->route('client.account.profile-page')->with('ssmsg', 'Đổi mật khẩu thành công');
        }
        return redirect()->route('client.account.updatePass')->with('ermsg', 'Đổi mật khẩu thất bại');
    }
}
