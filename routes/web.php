<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/produk', [WebsiteController::class, 'products'])->name('products.index');
Route::get('/produk/{product:slug}', [WebsiteController::class, 'productDetail'])->name('products.show');
Route::get('/kontak', [WebsiteController::class, 'contact'])->name('contact');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

if (file_exists(__DIR__ . '/auth.php')) {
    require __DIR__ . '/auth.php';
}
