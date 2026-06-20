<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'home'])->name('home');

Route::get('/produk', [WebsiteController::class, 'products'])->name('products.index');
Route::get('/produk/{product:slug}', [WebsiteController::class, 'productDetail'])->name('products.show');

Route::get('/blog', [WebsiteController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{blogPost:slug}', [WebsiteController::class, 'blogShow'])->name('blog.show');

Route::get('/proyek', [WebsiteController::class, 'projects'])->name('projects.index');
Route::get('/playlist', [WebsiteController::class, 'playlists'])->name('playlists.index');

Route::get('/kontak', [WebsiteController::class, 'contact'])->name('contact');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

if (file_exists(__DIR__ . '/auth.php')) {
    require __DIR__ . '/auth.php';
}

if (file_exists(__DIR__ . '/settings.php')) {
    require __DIR__ . '/settings.php';
}
