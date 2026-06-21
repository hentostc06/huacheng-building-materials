<?php

namespace App\Models;

use App\Models\Concerns\AutoTranslatesZhFields;
use App\Services\GoogleTranslateService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use HasFactory, AutoTranslatesZhFields;

    protected $fillable = [
        'name',
        'name_zh',
        'slug',
        'description',
        'icon',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (ProductCategory $category): void {
            if (blank($category->slug) && filled($category->name)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public static function translateNameToChinese(?string $name): ?string
    {
        return app(GoogleTranslateService::class)->translate($name);
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name_zh
            ? $this->name . ' / ' . $this->name_zh
            : $this->name;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
