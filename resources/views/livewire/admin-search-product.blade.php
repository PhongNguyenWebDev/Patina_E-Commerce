<div>
    <div style="margin-left: 10px">
        <a style="font-weight: bold" href="#">Danh sách sản phẩm</a> |
        <a href="{{ route('admin.products-trashed') }}">Danh sách sản phẩm đã xóa</a>
    </div>
    <form action="" class="" role="search">
        <input wire:model.live="search" class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
    </form>

    <table class="table custom-table">
        <thead class="thead-light">
        <tr>
            <th>Ảnh Sản Phẩm </th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Giá Khuyến Mãi</th>
            <th>Sản Phẩm Hot</th>
            <th>Ngày Tạo</th>
            <th>Ẩn/Hiện</th>
            <th class="text-right">Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        @if (!empty($products))
            @foreach ($products as $item)
                <tr>
                    <td>
                        <img style="width: 76px"
                             src="{{ $item->images }}"
                             alt="">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price) }} VNĐ</td>
                    <td>{{ number_format($item->sale_price) == 0 ? 'Không khuyến mãi' : number_format($item->sale_price) . ' VNĐ' }}
                    </td>
                    <td>{{ $item->hot == 0 ? 'Không' : 'Hot' }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->status == 0 ? 'Ẩn' : 'Hiện' }}</td>
                    <td class="text-right">
                        <a href="{{ route('admin.products.edit', $item->slug) }}"
                           class="btn btn-primary btn-sm mb-1">
                            <i class="far fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.products.destroy', $item->slug) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm {{ $item->name }}?')"
                                type="submit" class="btn btn-danger btn-sm mb-1">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>Không có sản phẩm nào</td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class=" mt-3 pagination justify-content-center">
        {{ $products->links() }}
    </div>
</div>

