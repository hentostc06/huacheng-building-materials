<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ContentPlaylist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_zh',
        'platform',
        'url',
        'thumbnail',
        'description',
        'description_zh',
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

    public function getThumbnailUrlAttribute(): string
    {
        if (! $this->thumbnail) {
            return asset('images/product-placeholder.svg');
        }

        $thumbnail = ltrim((string) $this->thumbnail, '/');

        if (str_starts_with($thumbnail, 'http://') || str_starts_with($thumbnail, 'https://')) {
            return $thumbnail;
        }

        if (str_starts_with($thumbnail, 'storage/')) {
            return asset($thumbnail);
        }

        if (str_starts_with($thumbnail, 'public/')) {
            $thumbnail = str_replace('public/', '', $thumbnail);
        }

        return Storage::disk('public')->exists($thumbnail)
            ? Storage::disk('public')->url($thumbnail)
            : asset('storage/' . $thumbnail);
    }

    public function getEmbedUrlAttribute(): ?string
    {
        $url = trim((string) $this->url);

        if ($url === '') {
            return null;
        }

        if (str_contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY) ?? '', $query);

            return isset($query['v'])
                ? 'https://www.youtube.com/embed/' . $query['v']
                : null;
        }

        if (str_contains($url, 'youtu.be/')) {
            $id = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');

            return $id ? 'https://www.youtube.com/embed/' . $id : null;
        }

        if (str_contains($url, 'youtube.com/shorts/')) {
            $path = trim(parse_url($url, PHP_URL_PATH) ?? '', '/');
            $id = str_replace('shorts/', '', $path);

            return $id ? 'https://www.youtube.com/embed/' . $id : null;
        }

        return null;
    }
}
