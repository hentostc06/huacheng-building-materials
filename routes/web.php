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

Route::get('/robots.txt', function () {
    return response(
        "User-agent: *\nAllow: /\nSitemap: https://huacheng.co.id/sitemap.xml\n",
        200,
        ['Content-Type' => 'text/plain']
    );
});

Route::get('/sitemap.xml', function () {
    $urls = [
        url('/'),
        url('/produk'),
        url('/proyek'),
        url('/blog'),
        url('/playlist'),
        url('/kontak'),
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . e($url) . '</loc>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200, ['Content-Type' => 'application/xml']);
});
