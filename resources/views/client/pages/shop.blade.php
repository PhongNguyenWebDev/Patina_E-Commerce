@extends('layouts.client')
@section('content')
    <!-- Products -->
    @include('client.blocks.banner')
    <section class="container py-5">
        <div class="row">
            <!-- Left -->
            <div class="col-xl-3">
                <!-- Filter Price -->
                <div>
                    <h6 class="bg-filter p-2 mt-2 text-black">Lọc theo giá</h6>
                    <ul class="py-2 px-1">
                        @php
                            $priceRangesLabels = [
                                '0-499' => 'Dưới $500',
                                '500-999' => '$500 - $999',
                                '1000-1999' => '$1000 - $1999',
                                '2000-3999' => '$2000 - $3999',
                                '4000-4999' => '$4000 - $4999',
                                '5000+' => 'Over $5000',
                            ];
                        @endphp
                        @foreach ($priceRangesLabels as $range => $label)
                            <li class="d-flex align-items-center justify-content-between">
                                <x-vertical-nav-link style="font-size:var(--font-size)"
                                    href="{{ route('client.shop-page', array_merge(request()->except('price_range'), ['price_range' => $range, 'category' => $categorySlug])) }}"
                                    :active="request()->input('price_range') === $range">
                                    {{ $label }}
                                </x-vertical-nav-link>
                                <p style="font-size: var(--font-size); margin: 0;" class="amout">
                                    {{ $priceRanges[$range] ?? 0 }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <!-- Lọc theo danh mục -->
                <div>
                    <h6 class="bg-filter p-2 mt-2 text-black">Lọc theo danh mục</h6>
                    <ul class="py-2 px-1">
                        @forelse ($categories as $category)
                            @if ($category->parent_id == 0)
                                @if ($category->parent()->count() > 0)
                                    <li class="nav-link mt-1">
                                        <div class="accordion" id="accordion-{{ $category->slug }}">
                                            <div class="accordion-item border-0 show">
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <a class="text-decoration-none p-0"
                                                        style="font-size: var(--font-size); color: var(--secondary-1200-color);"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse-{{ $category->slug }}"
                                                        aria-expanded="true" aria-controls="collapse-{{ $category->slug }}">
                                                        {{ $category->name }}
                                                    </a>
                                                    <p style="font-size: var(--font-size); margin: 0;" class="amout">
                                                        {{ $category->totalChildProducts() }}</p>
                                                </div>
                                                <div id="collapse-{{ $category->slug }}"
                                                    class="accordion-collapse collapse show">
                                                    <div class="accordion-body p-0">
                                                        <ul>
                                                            @foreach ($category->parent as $child)
                                                                <li class="nav-link d-flex justify-content-between mt-1">
                                                                    <x-vertical-nav-link
                                                                        style="font-size: var(--font-size);"
                                                                        href="{{ route('client.shop-page', $child->slug) }}"
                                                                        :active="request('category') === $child->slug">
                                                                        {{ $child->name }}
                                                                    </x-vertical-nav-link>
                                                                    <p style="font-size: var(--font-size); margin: 0;"
                                                                        class="amout">
                                                                        {{ $child->products_count }}</p>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="d-flex align-items-center justify-content-between mt-1">
                                        <x-vertical-nav-link style="font-size: var(--font-size);"
                                            href="{{ route('client.shop-page', $category->slug) }}" :active="request('category') === $category->slug">
                                            {{ $category->name }}
                                        </x-vertical-nav-link>
                                        <p style="font-size: var(--font-size); margin: 0;" class="amout">
                                            {{ $category->products_count }}
                                        </p>
                                    </li>
                                @endif
                            @endif
                        @empty
                            <li>Không có danh mục nào được tìm thấy.</li>
                        @endforelse
                    </ul>
                </div>



                <!-- Filter by Brand -->
                <div class="brand">
                    <h6 class="bg-filter p-2 mt-2 text-black">Lọc theo thương hiệu</h6>
                    <div class="container-fluid px-0 py-2">
                        <div class="row g-2">
                            @foreach ($brands as $brand)
                                <div class="col-4 item-brand">
                                    <x-vertical-nav-link
                                        href="{{ route('client.shop-page', array_merge(request()->except('brand'), ['brand' => $brand->slug, 'category' => $categorySlug])) }}"
                                        :slugBrand="request()->input('brand') === $brand->slug">
                                        <img class="object-fit-contain img-thumbnail w-100 h-100 border-0"
                                            src="{{ $brand->image }}" alt="">
                                    </x-vertical-nav-link>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Popular Product  -->
                <div class="popular">
                    <h6 class="bg-filter p-2 mt-2 text-black">Sản phẩm phổ biến</h6>
                    <div class="container-fluid p-0">
                        @foreach ($popularProducts as $product)
                            <a style="text-decoration: none" class="nav-link"
                                href="{{ route('client.detail', $product->slug) }}">
                                <div class="d-flex my-3" style="height: 90px;">
                                    <img class="img-thumbnail w-25" src="{{ $product->images }}"
                                        alt="{{ $product->name }}">
                                    <div class="mx-2">
                                        <h6 style="font-size: 18px; font-weight:550">{{ $product->name }}</h6>
                                        <p style="font-size: 16px; margin: 0;">
                                            <del
                                                style="color: red">${{ number_format($product->sale_price) ? number_format($product->price) : null }}</del>
                                            ${{ number_format($product->sale_price) ? number_format($product->sale_price) : number_format($product->price) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Right -->
            <div class="col-xl-9 container-fluid">
                <div class="d-flex flex-column flex-xl-row ">
                    <div class="col-9">
                        <p style="margin: 0; font-size: 18px;">Showing 1-12 of 14 results</p>
                    </div>
                    {{-- <div class="col-3 dropdown d-flex justify-content-start justify-content-xl-end">
                        <button class="btn rounded dropdown-toggle p-0 p-xl-2" style="font-size: 18px;" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" wire:click="sortByPriceAsc">Giá từ thấp đến cao</a></li>
                            <li><a class="dropdown-item" wire:click="sortByPriceDesc">Giá từ cao đến thấp</a></li>
                            <li><a class="dropdown-item" wire:click="sortByNameAsc">Tên sản phẩm từ A-Z</a></li>
                            <li><a class="dropdown-item" wire:click="sortByNameDesc">Tên sản phẩm từ Z-A</a></li>
                        </ul>
                    </div> --}}
                </div>
                {{--                <!-- Products --> --}}
                <div class="container-fluid p-0 my-3">
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
                                            <a class="nav-link" href="{{ route('client.favorite.add', $product->id) }}"><i
                                                    style=" background-color: rgb(203, 51, 51); color:white;"
                                                    class="fa-regular fa-heart rounded-5 p-2"></i></a>
                                        @else
                                            <a class="nav-link" href="{{ route('client.favorite.index') }}"><i
                                                    style=" background-color:#fff; color:#d8d8d8"
                                                    class="fas fa-heart rounded-5 p-2"></i></a>
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
                <div class="d-flex justify-content-center">
                    {{ $products->links('pagination::default') }}
                </div>
            </div>


            {{--            Show sản phẩm và sắp xếp sản phẩm bằng livewire  --}}
            {{-- @livewire('client-sort-products') --}}

        </div>
        </div>
    </section>
    <!-- Flash Sales -->
    {{-- <section class="container my-5">
        <div class="p-xl-5 p-3" style="background-color:#F7F2EE; ">
            <div class="d-flex flex-column flex-xl-row p-0 p-xl-5 bg-white w-100">
                <!-- Left -->
                <div class="col-xl-6 col-12">
                    <div class="container pt-3 pt-xl-0">
                        <span class="badge px-3 py-2 fs-4 text-bg-danger">- 20%</span>
                        <div class="py-5">
                            <h1>New Collection</h1>
                            <p style="color: var(--secondary-1000-color); font-size: 18px;">Introducing our luxurious
                                Harmony Chair – a perfect blend of comfort and style for your
                                living space.</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div class="d-flex flex-column border py-2 align-items-center time-flash-sales"
                                style="width: 7rem; background-color: #F7F2EE; color: black;">
                                <h3 id="days"></h3>
                                <p>Days</p>
                            </div>
                            <div class="d-flex flex-column border py-2 align-items-center time-flash-sales"
                                style="width: 7rem; background-color: #F7F2EE; color: black;">
                                <h3 id="hours"></h3>
                                <p>Hours</p>
                            </div>
                            <div class="d-flex flex-column border py-2 align-items-center time-flash-sales"
                                style="width: 7rem; background-color: #F7F2EE; color: black;">
                                <h3 id="minutes"></h3>
                                <p>Minutes</p>
                            </div>
                            <div class="d-flex flex-column border py-2 align-items-center time-flash-sales"
                                style="width: 7rem; background-color: #F7F2EE; color: black;">
                                <h3 id="seconds"></h3>
                                <p>Seconds</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-12 col-xl-6 d-flex justify-xl-content-end justify-content-center">
                    <img class="w-75" src="/assets/clients/img/Image-banner.png" alt="">
                </div>
            </div>
        </div>
    </section> --}}
@endsection
