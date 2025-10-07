<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPage\AboutCompanyController;
use App\Http\Controllers\LandingPage\BannerController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MasterData\ProductController;
use App\Http\Controllers\ProductController as LandingPageProductController; 
use App\Http\Controllers\Transaction\CartController;
use App\Http\Controllers\Transaction\TransactionController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');
Route::resource('product', LandingPageProductController::class);
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('add/{productId}', [CartController::class, 'addToCart'])->name('add');
        Route::delete('remove/{cartId}', [CartController::class, 'removeFromCart'])->name('remove');
    });

    Route::resource('checkout', CheckoutController::class);
    Route::get('deliver/done', [CheckoutController::class, 'done'])->name('deliver.done');

    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('update/{id}', [TransactionController::class, 'update'])->name('update');
    });

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('cms')->name('cms.')->group(function () {
        Route::resource('banner', BannerController::class);
        Route::resource('about-company', AboutCompanyController::class);
    });

    Route::prefix('master-data')->name('master-data.')->group(function () {
        Route::resource('product', ProductController::class);
    });
});
