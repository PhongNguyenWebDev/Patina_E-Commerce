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
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><span>{{ $title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-header">
        <form class="row" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name"
                        placeholder="Nhập tên sản phẩm">
                    @error('name')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="summary">Mô tả ngắn</label>
                    <textarea class="form-control" name="summary">{{ old('summary') }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_id">Danh Mục</label>
                    <select class="form-control choose_init" id="category_id" name="category_id">
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="brand_id">Brand</label>
                    <select class="form-control choose_init" id="brand_id" name="brand_id">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="color">Color</label>
                    <select class="form-control select2_choose" name="colors[]" multiple="multiple">
                    </select>
                    @error('colors')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="size">Size</label>
                    <select class="form-control select2_choose" name="sizes[]" multiple="multiple">
                    </select>
                    @error('sizes')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Giá Sản Phẩm</label>
                    <input type="number" class="form-control" id="price" value="{{ old('price') }}" name="price"
                        placeholder="Nhập giá....">
                    @error('price')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price_sale">Giá Khuyến Mãi</label>
                    <input type="number" class="form-control" id="price_sale" value="{{ old('sale_price') }}"
                        name="sale_price">
                    @error('sale_price')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hot">Hot</label>
                    <select class="form-control" id="hot" name="hot">
                        <option value="0">Không</option>
                        <option value="1">Có</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="active">Ẩn/Hiện</label>
                    <select class="form-control" id="visibility" name="status">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-control-file" id="image" name="images" accept="image/*">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="images">Hình ảnh chi tiết</label>
                    <input type="file" multiple class="form-control-file" id="images" name="imgdetail[]">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="image">Tag</label>
                    <select class="form-control select2_choose" name="tags[]" multiple="multiple">
                    </select>
                    @error('tags')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="20">{{ old('description') }}</textarea>
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
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('ckeditor', options);
    </script>
@endsection
