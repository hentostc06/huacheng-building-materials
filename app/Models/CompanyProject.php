<?php

namespace App\Models;

use App\Models\Concerns\AutoTranslatesZhFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CompanyProject extends Model
{
    use HasFactory, AutoTranslatesZhFields;

    protected $fillable = [
        'title',
        'title_zh',
        'description',
        'description_zh',
        'location',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getDisplayTitleAttribute(): string
    {
        return $this->title_zh
            ? $this->title . ' / ' . $this->title_zh
            : $this->title;
    }

    public function getImageUrlAttribute(): string
    {
        if (! $this->image) {
            return asset('images/product-placeholder.svg');
        }

        $image = ltrim((string) $this->image, '/');

        if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
            return $image;
        }

        if (str_starts_with($image, 'storage/')) {
            return asset($image);
        }

        if (str_starts_with($image, 'public/')) {
            $image = str_replace('public/', '', $image);
        }

        return Storage::disk('public')->exists($image)
            ? Storage::disk('public')->url($image)
            : asset('storage/' . $image);
    }
}
