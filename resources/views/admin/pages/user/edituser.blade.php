@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="page-title mb-0">{{ $title }}</h3>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb mb-0 p-0 float-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-header">
        <form class="row" method="POST" action="{{ route('admin.users.update', $users) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $users->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên User</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}"
                        placeholder="Nhập tên User">
                    @error('name')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}"
                        placeholder="Nhập email">
                    @error('email')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $users->phone }}"
                        placeholder="Nhập số điện thoại">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu"
                        value="{{ $users->password }}">
                    @error('password')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="active">Trạng Thái</label>
                    <select class="form-control" name="active" id="active">
                        <option value="0" {{ $users->active == 0 ? 'selected' : '' }}>Chưa kích hoạt</option>
                        <option value="1" {{ $users->active == 1 ? 'selected' : '' }}>Đã kích hoạt</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="role">Vai Trò</label>
                    <select class="form-control" name="role" id="role">
                        <option value="0" {{ $users->role == 0 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ $users->role == 1 ? 'selected' : '' }}>Member</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                <button type="reset" class="btn btn-danger">Nhập Lại</button>
            </div>
        </form>
    </div>
@endsection
