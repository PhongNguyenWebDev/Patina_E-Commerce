<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdBannerBottomController;
use App\Http\Controllers\Admin\AdBannerTopController;
use App\Http\Controllers\Admin\AdCategoryController;
use App\Http\Controllers\Admin\AdHomeController;
use App\Http\Controllers\Admin\AdProductController;
use App\Http\Controllers\Admin\AdBlogController;
use App\Http\Controllers\Admin\AdBrandController;
use App\Http\Controllers\Admin\AdCommentController;
use App\Http\Controllers\Admin\AdCouponController;
use App\Http\Controllers\Admin\AdOrderController;
use App\Http\Controllers\Admin\AdSliderController;
use App\Http\Controllers\Admin\AdSocialController;
use App\Http\Controllers\Admin\AdUserController;
use App\Http\Controllers\Client\ClBillController;
use App\Http\Controllers\Client\ClBlogController;
use App\Http\Controllers\Client\ClCartController;
use App\Http\Controllers\Client\ClCheckOutController;
use App\Http\Controllers\Client\ClContactController;
use App\Http\Controllers\Client\ClFavoriteController;
use App\Http\Controllers\Client\ClHomeController;
use App\Http\Controllers\Client\ClInTroController;
use App\Http\Controllers\Client\ClProductController;
use App\Http\Controllers\Client\ClProfileController;
use App\Http\Controllers\Client\ClSeriesShopController;
use App\Http\Controllers\Client\ClShopController;
use App\Http\Controllers\LogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// View của Trang đăng nhập
Route::get('/logIn-page', [LogController::class, 'logIn'])->name('logIn-page');
// POST thông tin trong Trang đăng nhập
Route::post('/logIn-page', [LogController::class, 'aclogin']);
// View của Trang đăng kí
Route::get('/signIn-page', [LogController::class, 'signIn'])->name('signIn-page');
// POST thông tin trong Trang đăng kí
Route::post('/signIn-page', [LogController::class, 'register']);
Route::get('/verify-account/{email}', [LogController::class, 'verify'])->name('verify');

// View của trang admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdHomeController::class, 'admin'])->name('home');
    // Trang quản lý danh mục sản phẩm
    Route::resource('category', AdCategoryController::class);
    // Trang quản lý thương hiệu
    Route::resource('brands', AdBrandController::class);
    // Trang quản lý người dùng
    Route::resource('users', AdUserController::class);
    // Trang quản lý bài viết
    Route::resource('blog', AdBlogController::class);
    // Trang quản lý sản phẩm
    Route::resource('products', AdProductController::class);
    // Trang quản lý mã giảm giá
    Route::resource('coupons', AdCouponController::class);
    // Trang quản lý bình luận
    Route::resource('comments', AdCommentController::class);
    // Trang quản lý Slider hình ảnh trang chủ
    Route::resource('sliders', AdSliderController::class);
    // Trang quản lý banner
    Route::resource('banner-top', AdBannerTopController::class);
    // Trang quản lý banner
    Route::resource('banner-bottom', AdBannerBottomController::class);
    // Trang quản lý mạng xã hội
    Route::resource('social-network', AdSocialController::class);
    // Trang quản lý hóa đơn chưa xác nhận
    Route::get('/orders/chua-xac-nhan', [AdOrderController::class, 'index'])->name('orders.index');
    // Trang quản lý hóa đơn đã xác nhận
    Route::get('/orders/da-xac-nhan', [AdOrderController::class, 'index1'])->name('orders.index1');
    // Trang quản lý hóa đơn đang giao
    Route::get('/orders/dang-giao-hang', [AdOrderController::class, 'index2'])->name('orders.index2');
    // Trang quản lý hóa đơn đã thanh toán
    Route::get('/orders/da-thanh-toan', [AdOrderController::class, 'index3'])->name('orders.index3');
    // Trang quản lý hóa đơn đã hủy
    Route::get('/orders/da-huy', [AdOrderController::class, 'index4'])->name('orders.index4');
    // Trang chỉnh sửa hóa đơn
    Route::get('/orders/{order}/edit', [AdOrderController::class, 'edit'])->name('orders.edit');
    // Trang cập nhật mới hóa đơn
    Route::put('/orders/{order}', [AdOrderController::class, 'update'])->name('orders.update');
    // Trang xóa hóa đơn
    Route::delete('/orders/{order}', [AdOrderController::class, 'destroy'])->name('orders.destroy');
});



// Trang người dùng
Route::prefix('/')->name('client.')->group(function () {
    // Trang chủ
    Route::get('/', [ClHomeController::class, 'homePage'])->name('home-page');
    // Trang Sản phẩm
    Route::get('/shop-page', [ClShopController::class, 'shop'])->name('shop-page');
    // Trang chi tiết sản phẩm
    Route::get('shop/{product:slug}', [ClProductController::class, 'show'])->name('detail');
    // Trang bài viết
    Route::get('/blog-page', [ClBlogController::class, 'blog'])->name('blog-page');
    // Trang giới thiệu
    Route::get('/introduce-page', [ClInTroController::class, 'introduce'])->name('introduce-page');
    // Trang liên hệ
    Route::get('/contact-page', [ClContactController::class, 'contact'])->name('contact-page');
    // Xử lý post bình luận trong trang Liên hệ
    Route::post('/contact-page', [ClContactController::class, 'contactDetail']);
    // Trang chuỗi cửa hàng
    Route::get('/series-shop-page', [ClSeriesShopController::class, 'seriesShop'])->name('series-shop-page');
    // Trang thông tin khách hàng
    Route::get('/profile-page', [ClProfileController::class, 'profile'])->name('profile-page');  //thêm ngày 22/6 bởi ta
    // Route::get('/bill-page', [ClBillController::class, 'bill'])->name('bill-page');  //thêm ngày 22/6 bởi ta
    // Trang thanh toán
    Route::get('/checkout-page', [ClCheckOutController::class, 'checkOut'])->name('checkout-page');
    Route::prefix('cart-page')->name('cart-page.')->group(function () {
        Route::get('/', [ClCartController::class, 'cart'])->name('index');
        Route::post('/add/{product}', [ClCartController::class, 'add'])->name('add');
        Route::get('/update/{id}', [ClCartController::class, 'update'])->name('update');
        Route::get('/delete/{product}', [ClCartController::class, 'delete'])->name('delete');
        // Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('apply_coupon');
    });
    Route::prefix('favorite-page')->name('favorite.')->group(function () {
        Route::get('/', [ClFavoriteController::class, 'favorite'])->name('index');
        Route::get('/add/{product}', [ClFavoriteController::class, 'add'])->name('add');
        Route::get('/delete/{product}', [ClFavoriteController::class, 'delete'])->name('delete');
    });
    
});
Route::get('/logout', [LogController::class, 'logout'])->name('logout');