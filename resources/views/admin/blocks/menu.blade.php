<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="{{ route('client.home-page') }}"
                    class="d-flex align-items-center text-decoration-none h-100 justify-content-center">
                    <p class="ms-5 m-0" style="font-weight:500; font-size: 28px; color:black;">PATINA
                    </p>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li>
                    <a href="#"><i class="fa fa-cogs"></i><span>Trang khách hàng</span><span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.sliders.index') }}"><i
                                    class="far fa-images"></i><span>Slider</span></a></li>
                        <li>
                            <a href="#"><i class="fa-solid fa-circle-info"></i><span>Thông tin shop</span><span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ route('admin.info.index') }}"><i
                                            class="fa-solid fa-circle-info"></i><span>Thông
                                            tin</span></a></li>
                                <li><a href="{{ route('admin.gio-mo-cua.index') }}"><i class="fa fa-clock"></i><span>Giờ
                                            mở cửa</span></a></li>
                                <li><a href="{{ route('admin.social-network.index') }}"><i
                                            class="fas fa-share-alt"></i><span>Mạng xã hội</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.home') }}"><i class="fas fa-chart-pie"></i><span>Thống Kê</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}"><i class="fas fa-list-ul"></i><span> Danh
                            Mục</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.brands.index') }}"><i class="fas fa-user-tie"></i><span> Thương hiệu</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}"><i class="fas fa-tshirt"></i><span> Sản
                            Phẩm</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-gift"></i><span>Phiếu giảm giá</span><span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.coupons.index') }}"><i
                                    class="fa-solid fa-ticket"></i><span>Coupon</span></a></li>
                        <li><a href="{{ route('admin.user-coupons') }}"><i
                                    class="fa-regular fa-floppy-disk"></i><span>Coupon được lưu</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.blog.index') }}"><i class="far fa-newspaper"></i> <span> Bài
                            Viết</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}"><i class="fa fa-address-book"></i><span> Người
                            Dùng</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.comments.index') }}"><i class="fa fa-comment-dots"></i>
                        <span> Bình luận</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.reviews.index') }}"><i class="fa-regular fa-star"></i>
                        <span> Đánh Giá</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-chart-bar"></i><span>Đơn Hàng</span><span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.orders.index') }}"><i
                                    class="fas fa-exclamation-circle"></i><span>Chưa Xác Nhận</span></a></li>
                        <li><a href="{{ route('admin.orders.index1') }}"><i class="fas fa-check-circle"></i><span>Đã
                                    Xác Nhận</span></a></li>
                        <li><a href="{{ route('admin.orders.index2') }}"><i class="fas fa-shipping-fast"></i><span>Đang
                                    Giao Hàng</span></a></li>
                        <li><a href="{{ route('admin.orders.index4') }}"><i
                                    class="fa-regular fa-credit-card"></i><span>Đã Trả Trước</span></a></li>
                        <li><a href="{{ route('admin.orders.index3') }}"><i
                                    class="fas fa-money-check-alt"></i><span>Đã Giao Hàng</span></a></li>
                        <li><a href="{{ route('admin.orders.index4') }}"><i class="fas fa-times"></i><span>Đã
                                    Hủy</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="/"><i class="fa fa-home"></i>
                        <span> Về Trang Chủ</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
