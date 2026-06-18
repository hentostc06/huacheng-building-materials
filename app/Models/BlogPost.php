<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_zh',
        'slug',
        'excerpt',
        'excerpt_zh',
        'content',
        'content_zh',
        'cover_image',
        'is_active',
        'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (BlogPost $post): void {
            if (blank($post->slug) && filled($post->title)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    public function getDisplayTitleAttribute(): string
    {
        return $this->title_zh
            ? $this->title . ' / ' . $this->title_zh
            : $this->title;
    }

    public function getCoverImageUrlAttribute(): string
    {
        if (! $this->cover_image) {
            return asset('images/product-placeholder.svg');
        }

        $cover = ltrim((string) $this->cover_image, '/');

        if (str_starts_with($cover, 'http://') || str_starts_with($cover, 'https://')) {
            return $cover;
        }

        if (str_starts_with($cover, 'storage/')) {
            return asset($cover);
        }

        if (str_starts_with($cover, 'public/')) {
            $cover = str_replace('public/', '', $cover);
        }

        return Storage::disk('public')->exists($cover)
            ? Storage::disk('public')->url($cover)
            : asset('storage/' . $cover);
    }
}
