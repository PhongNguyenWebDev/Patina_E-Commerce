<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AdUserController extends Controller
{
    public $data = [];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['title'] = 'Người Dùng';
        $users = User::orderBy('id', 'desc')->paginate(6);
        return view('admin.pages.user.users', $this->data, [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['title'] = 'Thêm Tài Khoản';
        return view('admin.pages.user.themuser', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        if (!User::create($request->all())) {
            return view('admin.pages.user.themuser');
        }
        return redirect()->route('admin.users.index')->with('ssmsg', 'Thêm thành công một tài khoản mới');
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
        $this->data['title'] = 'Sửa User';
        $users = User::find($id);
        if (!$users) {
            return redirect()->route('admin.users.index')->with('ermsg', 'Không tìm thấy tài khoản cần sửa');
        }
        return view('admin.pages.user.edituser', $this->data, [
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $users = User::find($id);
        if (!$users) {
            return redirect()->route('admin.users.index')->with('ermsg', 'Không tìm thấy tài khoản người dùng cần sửa');
        }
        $users->update($request->all());
        return redirect()->route('admin.users.index')->with('ssmsg', 'Sửa tài khoản người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        if (!$users) {
            return redirect()->route('admin.users.index')->with('ermsg', 'Không tìm thấy tài khoản người dùng cần xóa');
        }
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('ssmsg', 'Xóa tài khoản thành công');
    }
}
