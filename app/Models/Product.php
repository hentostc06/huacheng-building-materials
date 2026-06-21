<?php

namespace App\Models;

use App\Models\Concerns\AutoTranslatesZhFields;
use App\Services\GoogleTranslateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, AutoTranslatesZhFields;

    protected $fillable = [
        'product_category_id',
        'name',
        'name_zh',
        'slug',
        'short_description',
        'short_description_zh',
        'description',
        'description_zh',
        'specification',
        'specification_zh',
        'price',
        'image',
        'gallery',
        'is_featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Product $product): void {
            if (blank($product->slug) && filled($product->name)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public static function translateNameToChinese(?string $name): ?string
    {
        return self::translateTextToChinese($name);
    }

    public static function translateShortDescriptionInputToChinese(?string $name, ?string $text): ?string
    {
        return self::translateTextToChinese($text);
    }

    public static function translateDescriptionInputToChinese(?string $name, ?string $text): ?string
    {
        return self::translateTextToChinese($text);
    }

    public static function translateSpecificationInputToChinese(?string $name, ?string $text): ?string
    {
        return self::translateSpecificationToChinese($text);
    }

    public static function translateTextToChinese(?string $text): ?string
    {
        return app(GoogleTranslateService::class)->translate($text);
    }

    public static function translateSpecificationToChinese(?string $text): ?string
    {
        return app(GoogleTranslateService::class)->translate($text);
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name_zh
            ? $this->name . ' / ' . $this->name_zh
            : $this->name;
    }

    public function getImageUrlAttribute(): string
    {
        return $this->resolvePublicFileUrl($this->image);
    }

    public function getGalleryUrlsAttribute(): array
    {
        return collect($this->gallery ?? [])
            ->filter()
            ->map(fn ($path) => $this->resolvePublicFileUrl((string) $path))
            ->values()
            ->all();
    }

    private function resolvePublicFileUrl(?string $path): string
    {
        if (! $path) {
            return asset('images/product-placeholder.svg');
        }

        $file = ltrim((string) $path, '/');

        if (str_starts_with($file, 'http://') || str_starts_with($file, 'https://')) {
            return $file;
        }

        if (str_starts_with($file, 'storage/')) {
            return asset($file);
        }

        if (str_starts_with($file, 'public/')) {
            $file = str_replace('public/', '', $file);
        }

        return Storage::disk('public')->exists($file)
            ? Storage::disk('public')->url($file)
            : asset('storage/' . $file);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
