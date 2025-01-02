<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnauthorizedController;
use App\Http\Controllers\LocaleController;
use App\Http\Middleware\CheckRole;



Route::get('/', [CustController::class, 'index'])->name('home');

Route::get('locale/{lang}',[LocaleController::class,'setLocale']);

Route::get('/login', [SesiController::class, 'index'])->name('login');
Route::post('/login', [SesiController::class, 'login']);
Route::post('/logout', [SesiController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/produk/{id}',[CustController::class, 'detail'])->name('cust.detail');


//Route::get('/register', function () {return view('auth.register');})->name('register');
//Route::post('/register', [SesiController::class, 'register']);

// Landing Page
//Route::get('/home', function () {return view('index');})->name('home');

Route::fallback(function () {
    return response()->view('auth.unauthorized', [], 404);
});

// Admin
Route::middleware(['auth', 'checkRole:admin'])->group(function() {
    // Hanya admin yang dapat mengakses halaman:
    Route::get('/admin-home', [AdminController::class, 'admin'])->name('admin-home');
    Route::get('/admin-reviews', [AdminController::class, 'review'])->name('admin-reviews');
    Route::get('/admin-users', [AdminController::class, 'user'])->name('admin-users');
    //update role
    Route::patch('/admin-users/{id}/role', [AdminController::class, 'updateRole'])->name('admin-updateRole');
    //hapus user
    Route::delete('/admin-users/{id}', [AdminController::class, 'deleteUser'])->name('admin-deleteUser');


    //route review
    Route::patch('/admin/reviews/{id}/approve', [AdminController::class, 'approveReview'])->name('admin.approve-review');
    Route::patch('/admin/reviews/{id}/reject', [AdminController::class, 'rejectReview'])->name('admin.reject-review');
    Route::delete('/admin/reviews/{id}/delete', [AdminController::class, 'deleteReview'])->name('admin.delete-review');
    Route::get('/admin/reviews/search', [AdminController::class, 'searchReview'])->name('admin.search-review');


    // Product (tampil, tambah)
    Route::get('/admin-products', [ProductsController::class, 'product'])->name('admin-products');
    Route::post('/store-product', [ProductsController::class, 'store'])->name('product-store');
    // Product (edit)
    Route::get('/admin-products/{id}/edit', [ProductsController::class, 'edit'])->name('products-edit');
    Route::put('/admin-products/{id}', [ProductsController::class, 'update'])->name('products-update');
    //Product (hapus)
    Route::delete('/admin-products/{id}', [ProductsController::class, 'destroy'])->name('products-destroy');
    //Product (search)
    Route::get('/admin-products/search', [ProductsController::class, 'search'])->name('products-search');

});

// Cust
Route::middleware(['auth', 'checkRole:cust'])->group(function() {
    // Hanya cust yang dapat mengakses halaman:
    Route::get('/home', [CustController::class, 'index'])->name('cust-home');
    Route::get('/products/review/{id}', [CustController::class, 'reviewForm'])->name('cust.review');
    Route::post('/products/review/{id}', [CustController::class, 'submitReview'])->name('product.review');

});
