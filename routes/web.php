<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


// Home
Route::get('/', [SiteController::class, 'home']);
// Detail product
Route::get('/detail/{id}', [SiteController::class, 'detail']);
// Shop
Route::get('/shop', [SiteController::class, 'shop']);
// Category
Route::get('/category/{id}', [SiteController::class, 'category']);
// Cart
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [SiteController::class,'cart']);
    Route::get('/addtocart/{id}', [SiteController::class,'addToCart']);
    Route::post('/addtocart/{id}', [SiteController::class,'addToCart']);
    Route::get('/deletecart/{id}', [SiteController::class,'deleteCart']);
    Route::get('/clearcart', [SiteController::class,'clearCart']);
    Route::put('/cart/update/{id}', [SiteController::class, 'updateCart'])->name('cart.update');
});

Route::get('/checkout', [SiteController::class, 'checkout']);
Route::post('/checkout', [SiteController::class,'handleCheckout']);

//Alert
Route::get('/alert', function () {
    return view('alert');
});

// ===================Search=======================
Route::get('/search', [SiteController::class, 'showSearchForm'])->name('search');
Route::post('/search', [SiteController::class, 'search'])->name('search');

//=======================================ADMIN=====================================================
Route::get('/admin', [AdminController::class, 'admin']);

// Login - Register
Route::group(['prefix'=>'admin'], function(){
    Route::get('/', [AdminController::class,'admin']);
    Route::get('login',[AdminController::class,'login']);
    Route::post('login', [AdminController::class,'handleLogin']);
    Route::get('logout', [AdminController::class, 'logout']);
    // ============================ORDER==========================================

    Route::get('orders', [OrderController::class,'listOrder']);
    Route::get('orders/{id}/edit', [OrderController::class, 'editOrder'])->name('orders.edit');
    Route::patch('orders/{id}', [OrderController::class, 'updateOrder'])->name('orders.update');
});

Route::group(['prefix' => 'admin' ,'middleware' => [AdminMiddleware::class] ],function(){
    Route::get('/', [AdminController::class, 'admin']);
    Route::resource('category', AdminCategoryController::class);
    Route::resource('products', AdminProductsController::class);
    });
        
// Comment
Route::post('/comments', [SiteController::class, 'comments']);
Route::get('/comments', [AdminController::class, 'listComment']);
Route::get('/admin/comment/{id}', [AdminController::class, 'deleteComment']);

// ================= Login ========================================
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'handleLogin']);
Route::get('/logout', [UserController::class,'logout']);
Route::get('/register', [UserController::class,'register']);
Route::post('/register', [UserController::class,'handleRegister']);


Route::get('/verifyAccount', [UserController::class,'verifyAccount']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
        return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/download', [AdminProductsController::class,'download'])->middleware('auth','verified');

Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with([
            'warn' => 'Activation mail sent!',
            'success' => 'Confirmation email has been sent successfully!'
        ]);
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');