@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h3 class="page-title mb-0">{{ $title }}</h3>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb mb-0 p-0 float-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home p-1"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-header">
        <form class="row" method="POST" action="{{ route('admin.category.store') }}">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <label for="tendanhmuc">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="tendanhmuc" name="name"
                        placeholder="Nhập tên danh mục">
                    @error('name')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="danhmuccha">Chọn Danh Mục Cha</label>
                    <select class="form-control choose_init" id="danhmuccha" name="parent_id">
                        <option value="0">--- Chọn Danh Mục Cha ---</option>
                        @foreach ($cateParent as $cateP)
                            <option value="{{ $cateP->id }}">{{ $cateP->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <button type="reset" class="btn btn-danger">Nhập Lại</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".select2_choose").select2({
            tags: true,
            tokenSeparators: [',']
        });
        $(".choose_init").select2({});
    </script>
@endsection
