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
        <form class="row" action="{{ route('admin.products.update', $products->slug) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $products->id }}">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm"
                        value="{{ $products->name }}">
                    @error('name')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="summary">Mô tả ngắn</label>
                    <textarea class="form-control" id="ckeditor1" name="summary">{{ $products->summary }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_id">Danh Mục</label>
                    <select class="form-control choose_init" id="category_id" name="category_id">
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $products->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="brand_id">Brand</label>
                    <select class="form-control choose_init" id="brand_id" name="brand_id">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 10px">
                <div class="form-group">
                    <label for="color">Biến thể</label>
                    @foreach ($products->productDetails as $productDetail)
                        <div class="row justify-content-center">
                            <div class="col-md-2" style="margin-bottom: 10px">
                                <label for="color">Màu</label>
                                <input type="text" class="form-control" id="color" name="color[]"
                                    value="{{ $productDetail->color->name }}" placeholder="Nhập màu....">
                            </div>
                            <div class="col-md-2">
                                <label for="size">Size</label>
                                <input type="text" class="form-control" id="size" name="size[]"
                                    value="{{ $productDetail->size->name }}" placeholder="Nhập size....">
                            </div>
                            <div class="col-md-2">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" id="quantity" name="quantity[]"
                                    value="{{ $productDetail->quantity }}" placeholder="Nhập số lượng....">
                            </div>
                            <div class="col-md-2">
                                <label for="prices">Giá Sản Phẩm</label>
                                <input type="number" class="form-control" id="prices" name="prices[]"
                                    value="{{ $productDetail->price }}" placeholder="Nhập giá....">
                            </div>
                            <div class="col-md-2">
                                <label for="sale_prices">Giá Sale</label>
                                <input type="number" class="form-control" id="sale_prices" name="sale_prices[]"
                                    value="{{ $productDetail->sale_price }}" placeholder="Nhập giá sale....">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Giá Sản Phẩm</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá...."
                        value="{{ $products->price }}">
                    @error('price')
                        <span style="color: red"><i class="fa-solid fa-circle-exclamation fa-beat"></i>
                            {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sale_price">Giá Khuyến Mãi</label>
                    <input type="number" class="form-control" id="sale_price" name="sale_price"
                        value="{{ $products->sale_price }}">
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
                        <option value="0" {{ $products->hot == 0 ? 'selected' : '' }}>Không</option>
                        <option value="1" {{ $products->hot == 1 ? 'selected' : '' }}>Có</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Ẩn/Hiện</label>
                    <select class="form-control" id="visibility" name="status">
                        <option value="0" {{ $products->status == 0 ? 'selected' : '' }}>Ẩn</option>
                        <option value="1" {{ $products->status == 1 ? 'selected' : '' }}>Hiện</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-control-file" id="image" name="images" accept="image/*">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ $products->images }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="images">Hình ảnh chi tiết</label>
                    <input type="file" multiple class="form-control-file" id="images" name="imgdetail[]">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            @foreach ($products->gallery as $item)
                                <div class="col-md-3">
                                    <img src="{{ $item->name }}" alt="" class="img-fluid">
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="tags">Tag</label>
                    <select class="form-control select2_choose" name="tags[]" multiple="multiple">
                        @foreach ($products->tags as $tag)
                            <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                        @endforeach
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
                    <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="20">{{ $products->description }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
        CKEDITOR.replace('ckeditor1', options);
    </script>
@endsection
