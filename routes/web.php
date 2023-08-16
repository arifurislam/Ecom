<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Backend\User\UserController;

use App\Http\Controllers\Backend\Admin\BrandController;
use App\Http\Controllers\Backend\Admin\CouponController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\OrderController;





Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin
Route::group(['as'=>'admin.', 'prefix' => 'admin', 'middleware'=>['auth','admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::post('categories/store', [CategoryController::class, 'store']);
    Route::get('categories/show/{id}', [CategoryController::class, 'show']);
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('categories/update/{id}', [CategoryController::class, 'update']);
    Route::post('categories/delete/{id}', [CategoryController::class, 'delete']);
    Route::resource('/products', ProductController::class);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/show/{order_id}', [OrderController::class, 'show']);
    Route::resource('/brands', BrandController::class)->except([
        'show'
    ]);
    Route::resource('/coupons', CouponController::class)->except([
        'show'
    ]);
});

// user
Route::group(['as'=>'user.', 'prefix' => 'dashboard', 'namespace'=>'User','middleware'=>['auth','user']], function () {
    Route::get('/user', [UserController::class, 'index']);
});

// website
    Route::get('/', [HomeController::class, 'index']);
    Route::get('product/details/{slug}', [HomeController::class, 'product_details']);
    
    Route::post('/add/to-cart/{id}', [CartController::class, 'adToCart']);
    Route::get('cart', [CartController::class, 'cart']);
    Route::get('cart/destroy/{id}', [CartController::class, 'delete']);
    Route::post('card/update/{id}', [CartController::class, 'update']);
    Route::post('cart/coupon', [CartController::class, 'applyCoupon']);
    Route::get('cart/coupon/destroy', [CartController::class, 'CouponDestroy']);

    Route::get('/add/to-wishlist/{id}', [WishlistController::class, 'adToWishlist']);
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('/wishlist/delete/{slug}', [WishlistController::class, 'destroy']);

    // checkout
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/checkout/store', [ShippingController::class, 'store']);
    Route::get('/post/checkout', [ShippingController::class, 'postCheckout']);

require __DIR__.'/auth.php';
