<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\CompanyProject;
use App\Models\ContentPlaylist;
use App\Models\Product;
use App\Models\ProductCategory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Schema;

class AdminStatsOverview extends BaseWidget
{
    protected ?string $heading = 'Ringkasan Website';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Produk', $this->countTable(Product::class, 'products'))
                ->description('Total produk katalog')
                ->color('info'),

            Stat::make('Kategori Produk', $this->countTable(ProductCategory::class, 'product_categories'))
                ->description('Kategori untuk katalog')
                ->color('info'),

            Stat::make('Proyek Dikerjakan', $this->countTable(CompanyProject::class, 'company_projects'))
                ->description('Dokumentasi proyek')
                ->color('success'),

            Stat::make('Playlist Konten', $this->countTable(ContentPlaylist::class, 'content_playlists'))
                ->description('Video / konten perusahaan')
                ->color('warning'),

            Stat::make('Blog Perusahaan', $this->countTable(BlogPost::class, 'blog_posts'))
                ->description('Artikel website')
                ->color('primary'),

            Stat::make('Produk Aktif', $this->activeCount(Product::class, 'products'))
                ->description('Produk tampil di frontend')
                ->color('success'),
        ];
    }

    private function countTable(string $modelClass, string $table): int
    {
        if (! class_exists($modelClass) || ! Schema::hasTable($table)) {
            return 0;
        }

        return $modelClass::query()->count();
    }

    private function activeCount(string $modelClass, string $table): int
    {
        if (! class_exists($modelClass) || ! Schema::hasTable($table)) {
            return 0;
        }

        if (! Schema::hasColumn($table, 'is_active')) {
            return $modelClass::query()->count();
        }

        return $modelClass::query()->where('is_active', true)->count();
    }
}
