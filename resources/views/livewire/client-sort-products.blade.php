<div class="col-xl-9 container-fluid">
    <div class="d-flex flex-column flex-xl-row ">
        <div class="col-9">
            <p style="margin: 0; font-size: 18px;">Showing 1-12 of 14 results</p>
        </div>
        <div class="col-3 dropdown d-flex justify-content-start justify-content-xl-end">
            <button class="btn rounded dropdown-toggle p-0 p-xl-2" style="font-size: 18px;" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Sắp xếp theo
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" wire:click="sortByPriceAsc">Giá từ thấp đến cao</a></li>
                <li><a class="dropdown-item" wire:click="sortByPriceDesc">Giá từ cao đến thấp</a></li>
                <li><a class="dropdown-item" wire:click="sortByNameAsc">Tên sản phẩm từ A-Z</a></li>
                <li><a class="dropdown-item" wire:click="sortByNameDesc">Tên sản phẩm từ Z-A</a></li>
            </ul>
        </div>
    </div>
    <!-- Products -->
    <div class="container-fluid p-0">
        <div class="row g-2">
            @foreach ($products as $product)
                <div class="col-xl-4 col-12 position-relative d-flex flex-wrap flex-column align-items-center">
                    <a href="{{ route('client.detail', $product->slug) }}">
                        <img class="img-thumbnail" src="{{ $product->images }}" alt="">
                    </a>
                    <div class="position-absolute top-0 p-3 w-100 end-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <span class="badge text-bg-danger fs-6">- 20%</span>
                            @php
                                $isFavorite = false;
                                foreach ($favorite as $item) {
                                    if ($item->product_id === $product->id) {
                                        $isFavorite = true;
                                        break;
                                    }
                                }
                            @endphp
                            @if ($isFavorite)
                                <a href="{{ route('client.favorite.index') }}"><i
                                        style="border: 0.5px solid var(--primary-800-color); background-color: var(--primary-800-color); color:white"
                                        class="fas fa-heart rounded-5 p-2 fs-5"></i></a>
                            @else
                                <a href="{{ route('client.favorite.add', $product->id) }}"><i
                                        style="border: 0.5px solid var(--primary-800-color); background-color: white; color:var(--primary-800-color)"
                                        class="fa-regular fa-heart rounded-5 p-2 fs-5"></i></a>
                            @endif
                        </div>
                    </div>
                    <h4 class="pt-1 mt-1 fs-5">{{ $product->name }}</h4>
                    <p style="font-size: 16px; color:#000516A4; margin: 0;">{{ $product->category->name }}</p>
                    <div class="d-flex">
                        <p style="font-size: var(--font-size); margin: 0;"
                           class="text-decoration-line-through text-danger mx-2">
                            ${{ number_format($product->sale_price) ? number_format($product->price) : null }}
                        </p>
                        <p style="font-size: var(--font-size); margin: 0; color: black;">
                            ${{ number_format($product->sale_price) ? number_format($product->sale_price) : number_format($product->price) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center ps-xl-0 ps-5">
        <div style="width: 9%;"></div>
        <div>
            <button style="background-color:#5F2D00C9;" class="btn m-2"><span
                    class="text-white">1</span></button>
            <button style="border: 3px solid #5F2D00C9;" class="btn"><span>2</span></button>
        </div>
        <div class="d-flex align-items-center p-1 rounded" style="border: 3px solid #5F2D00C9; height: 35px;">
            <button class="btn rounded" style="font-weight: var(--Bold); font-size: 18px;">Next</button><i
                class="fa-solid fa-angle-right me-2"></i>
        </div>
    </div>
</div>
