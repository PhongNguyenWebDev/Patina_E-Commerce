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
use App\Http\Controllers\Client\ClBlogController;
use App\Http\Controllers\Client\ClCartController;
use App\Http\Controllers\Client\ClContactController;
use App\Http\Controllers\Client\ClFavoriteController;
use App\Http\Controllers\Client\ClHomeController;
use App\Http\Controllers\Client\ClInTroController;
use App\Http\Controllers\Client\ClProfileController;
use App\Http\Controllers\Client\ClSeriesShopController;
use App\Http\Controllers\Client\ClShopController;

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


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdHomeController::class, 'admin'])->name('home');
    Route::resource('category', AdCategoryController::class);
    Route::resource('brands', AdBrandController::class);
    Route::resource('users', AdUserController::class);
    Route::resource('blog', AdBlogController::class);
    Route::resource('products', AdProductController::class);
    Route::resource('coupons', AdCouponController::class);
    Route::resource('comments', AdCommentController::class);
    Route::resource('sliders', AdSliderController::class);
    Route::resource('banner-top', AdBannerTopController::class);
    Route::resource('banner-bottom', AdBannerBottomController::class);
    Route::resource('social-network', AdSocialController::class);
    Route::get('/orders/chua-xac-nhan', [AdOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/da-xac-nhan', [AdOrderController::class, 'index1'])->name('orders.index1');
    Route::get('/orders/dang-giao-hang', [AdOrderController::class, 'index2'])->name('orders.index2');
    Route::get('/orders/da-thanh-toan', [AdOrderController::class, 'index3'])->name('orders.index3');
    Route::get('/orders/da-huy', [AdOrderController::class, 'index4'])->name('orders.index4');
    Route::get('/orders/{order}/edit', [AdOrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [AdOrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [AdOrderController::class, 'destroy'])->name('orders.destroy');
});



Route::prefix('/')->name('client.')->group(function () {
    Route::get('/', [ClHomeController::class, 'homePage'])->name('home-page');
    Route::get('/shop-page', [ClShopController::class, 'shop'])->name('shop-page');
    Route::get('/blog-page', [ClBlogController::class, 'blog'])->name('blog-page');
    Route::get('/introduce-page', [ClInTroController::class, 'introduce'])->name('introduce-page');
    Route::get('/contact-page', [ClContactController::class, 'contact'])->name('contact-page');
    Route::get('/series-shop-page', [ClSeriesShopController::class, 'seriesShop'])->name('series-shop-page');
    Route::get('/cart-page', [ClCartController::class, 'cart'])->name('cart-page');
    Route::get('/logIn-page', [ClProfileController::class, 'logIn'])->name('logIn-page');
    Route::get('/signIn-page', [ClProfileController::class, 'signIn'])->name('signIn-page');
    Route::get('/product-detail-page', [ClShopController::class, 'productDetail'])->name('product-detail-page');
    Route::get('/favorite-page', [ClFavoriteController::class, 'favorite'])->name('favorite-page');
});
