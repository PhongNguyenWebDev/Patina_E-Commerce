<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdCategoryController;
use App\Http\Controllers\Admin\AdHomeController;
use App\Http\Controllers\Admin\AdProductController;
use App\Http\Controllers\Admin\AdBlogController;
use App\Http\Controllers\Admin\AdBrandController;
use App\Http\Controllers\Admin\AdCommentController;
use App\Http\Controllers\Admin\AdCouponController;
use App\Http\Controllers\Admin\AdInfoController;
use App\Http\Controllers\Admin\AdOrderController;
use App\Http\Controllers\Admin\AdReviewController;
use App\Http\Controllers\Admin\AdSliderController;
use App\Http\Controllers\Admin\AdSocialsController;
use App\Http\Controllers\Admin\AdTimeController;
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
use App\Http\Controllers\Client\ClReviewController;
use App\Http\Controllers\Auth\LoginGoogleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\ClCommentController;
use App\Http\Controllers\Client\ClCouponController;

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

// Auth::routes();
// Login with Google


Route::controller(LoginGoogleController::class)->group(function () {
    Route::get('social/google', 'redirectToGoogle')->name('social.google');
    Route::get('social/google/callback', 'handleGoogleCallback');
});

Route::middleware('authlogin')->group(function () {
    // View của Trang đăng nhập
    Route::get('/login', [LogController::class, 'logIn'])->name('login');
    // POST thông tin trong Trang đăng nhập
    Route::post('/login', [LogController::class, 'aclogin']);
    // View của Trang đăng kí
    Route::get('/signIn-page', [LogController::class, 'signIn'])->name('signIn-page');
    // POST thông tin trong Trang đăng kí
    Route::post('/signIn-page', [LogController::class, 'register']);
    Route::get('/verify-account/{email}', [LogController::class, 'verify'])->name('verify');
    // View của trang quên mật khẩu
    Route::get('/forgotPassword', [LogController::class, 'viewquenmk'])->name('quenmk');

    Route::post('/forgotPassword', [LogController::class, 'quenmk']);
    // View của trang đổi mật khẩu
    Route::get('/changePassword/{token}', [LogController::class, 'viewdoimk'])->name('doimk');
    Route::post('/changePassword/{token}', [LogController::class, 'doimk']);
});
// View của trang admin
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
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
    Route::get('/product-trashed', [AdProductController::class, 'trashedProducts'])->name('products-trashed');
    Route::patch('/products/restore/{slug}', [AdProductController::class, 'restore'])->name('products-restore');
    Route::delete('/products/delete/{slug}', [AdProductController::class, 'forceDelete'])->name('products-force-delete');
    // Trang quản lý mã giảm giá
    Route::resource('coupons', AdCouponController::class);
    Route::get('/user-coupons', [AdCouponController::class, 'userCoupon'])->name('user-coupons');
    // Trang quản lý bình luận
    Route::resource('comments', AdCommentController::class);
    // Trang quản lý bình luận
    Route::resource('reviews', AdReviewController::class);
    // Trang quản lý Slider hình ảnh trang chủ
    Route::resource('sliders', AdSliderController::class);
    // Trang quản lý thông tin shop
    Route::resource('info', AdInfoController::class);
    // Trang quản lý mạng xã hội
    Route::resource('social-network', AdSocialsController::class);
    // Trang quản lý giờ mở cửa
    Route::resource('gio-mo-cua', AdTimeController::class);
    // Trang quản lý hóa đơn chưa xác nhận
    Route::get('/orders/chua-xac-nhan', [AdOrderController::class, 'index'])->name('orders.index');
    // Trang quản lý hóa đơn đã xác nhận
    Route::get('/orders/da-xac-nhan', [AdOrderController::class, 'index1'])->name('orders.index1');
    // Trang quản lý hóa đơn đang giao
    Route::get('/orders/dang-giao-hang', [AdOrderController::class, 'index2'])->name('orders.index2');
    // Trang quản lý hóa đơn đã thanh toán
    Route::get('/orders/da-thanh-toan', [AdOrderController::class, 'index3'])->name('orders.index3');
    // Trang quản lý hóa đơn đã thanh toán
    Route::get('/orders/da-thanh-toan-vnpay', [AdOrderController::class, 'index4'])->name('orders.index4');
    // Trang quản lý hóa đơn đã hủy
    Route::get('/orders/da-huy', [AdOrderController::class, 'index5'])->name('orders.index5');
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
    Route::get('/shop-page/{category:slug?}', [ClShopController::class, 'shop'])->name('shop-page');
    // Trang chi tiết sản phẩm
    Route::get('shop/{product:slug}', [ClProductController::class, 'show'])->name('detail');
    Route::post('shop/{product:slug}', [ClProductController::class, 'review'])->name('review');
    Route::get('shop/{product:slug}/reviews', [ClProductController::class, 'fetchReviews'])->name('reviews');
    // Trang bài viết
    Route::get('blog-page', [ClBlogController::class, 'blog'])->name('blog-page');
    Route::get('blog-page/{blogSlug}', [ClBlogController::class, 'blogDetail'])->name('blog-detail');
    Route::post('comment/{blog}/comments', [ClCommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [ClCommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/comments/{parentComment}/reply', [ClCommentController::class, 'reply'])->name('comments.reply');
    // Trang giới thiệu
    Route::get('/introduce-page', [ClInTroController::class, 'introduce'])->name('introduce-page');
    // Trang liên hệ
    Route::get('/contact-page', [ClContactController::class, 'contact'])->name('contact-page');
    // Xử lý post bình luận trong trang Liên hệ
    Route::post('/contact-page', [ClContactController::class, 'contactDetail']);
    // Trang chuỗi cửa hàng
    Route::get('/series-shop-page', [ClSeriesShopController::class, 'seriesShop'])->name('series-shop-page');
    // Trang thông tin khách hàng
    // Route::get('/bill-page', [ClBillController::class, 'bill'])->name('bill-page');  //thêm ngày 22/6 bởi ta

    //Trang list coupon
    Route::prefix('list-coupon-page')->name('list-coupon.')->group(function () {
        Route::get('/', [ClCouponController::class, 'index'])->name('index');
        Route::get('/add/{coupon}', [ClCouponController::class, 'add'])->name('add');
        // Route::get('/delete/{product}', [ClCouponController::class, 'delete'])->name('delete');
    });
    // Trang thanh toán
    Route::middleware('cus')->group(function () {
        Route::prefix('account')->name('account.')->group(function () {
            // View trang profile
            Route::get('/profile-page', [ClProfileController::class, 'profile'])->name('profile-page');
            // View trang danh sách hóa đơn
            Route::get('/hoa-don', [ClProfileController::class, 'hoadon'])->name('hoadon');
            // View trang chi tiết hóa đơn
            Route::get('/hoa-don/{order}', [ClProfileController::class, 'showhoadon'])->name('showhoadon');
            Route::post('/hoa-don/{order}/cancel', [ClProfileController::class, 'cancelOrder'])->name('cancelOrder');
            // View trang cập nhật tài khoản
            Route::get('/update-profile', [ClProfileController::class, 'update'])->name('update');
            Route::post('/update-profile', [ClProfileController::class, 'check_update']);
            // View trang đổi mật khẩu
            Route::get('/doi-mat-khau', [ClProfileController::class, 'updatePass'])->name('updatePass');
            Route::post('/doi-mat-khau', [ClProfileController::class, 'check_updatePass']);
        });
        Route::prefix('cart-page')->name('cart-page.')->group(function () {
            Route::get('/', [ClCartController::class, 'cart'])->name('index');
            Route::post('/add/{product}', [ClCartController::class, 'add'])->name('add');
            Route::post('/update/{id}', [ClCartController::class, 'update'])->name('update');
            Route::get('/delete/{product}', [ClCartController::class, 'delete'])->name('delete');
        });
        Route::prefix('favorite-page')->name('favorite.')->group(function () {
            Route::get('/', [ClFavoriteController::class, 'favorite'])->name('index');
            Route::get('/add/{product}', [ClFavoriteController::class, 'add'])->name('add');
            Route::get('/delete/{product}', [ClFavoriteController::class, 'delete'])->name('delete');
        });
        Route::prefix('checkout-page')->name('checkout.')->group(function () {
            Route::get('/', [ClCheckOutController::class, 'index'])->name('index');
            Route::post('/', [ClCheckoutController::class, 'checkout']);
            Route::get('/verify/{token}', [ClCheckOutController::class, 'verify'])->name('verify');
            Route::post('/apply-coupon', [ClCheckoutController::class, 'applyCoupon'])->name('apply_coupon');
            Route::post('/vnpay_payment', [ClCheckOutController::class, 'vnpay_payment'])->name('vnpay_payment');
            Route::get('/checkout-page/ReturnUrl', [ClCheckoutController::class, 'handleVnpayReturn'])->name('returnUrl');
            Route::get('/payment-success', [ClCheckoutController::class, 'showSuccessPage'])->name('payment.success');
        });
    });
});
Route::get('/logout', [LogController::class, 'logout'])->name('logout');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
