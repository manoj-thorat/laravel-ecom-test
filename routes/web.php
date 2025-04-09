<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Admin\AdminOrderController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\Api\PaymentController;



Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/product-images/{id}', [ProductController::class, 'deleteImage'])->name('product-images.delete');
    Route::resource('products', ProductController::class);
    Route::resource('/orders', AdminOrderController::class)->only(['index', 'show'])->names('orders');
    
});


Route::prefix('api')->group(function () {
    Route::get('/products', [ProductApiController::class, 'index']);
    Route::get('/cart', [CartApiController::class, 'index']);
    Route::withoutMiddleware([VerifyCsrfToken::class])->post('/cart', [CartApiController::class, 'store']);
    Route::withoutMiddleware([VerifyCsrfToken::class])->put('/cart/{id}', [CartApiController::class, 'update']);
    Route::delete('/cart/{id}', [CartApiController::class, 'destroy']);
    // Route::withoutMiddleware([VerifyCsrfToken::class])->post('/checkout', [CheckoutController::class, 'store']);
    Route::withoutMiddleware([VerifyCsrfToken::class])
    ->post('/checkout', [PaymentController::class, 'checkout']);
});

Route::get('/admin/cart', [AdminCartController::class, 'index'])->name('admin.cart.index');
// Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
// Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');



require __DIR__.'/auth.php';
