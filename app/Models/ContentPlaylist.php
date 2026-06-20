<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContentPlaylist extends Model
{
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

    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) {
            $thumbnail = ltrim((string) $this->thumbnail, '/');

            if (Str::startsWith($thumbnail, ['http://', 'https://'])) {
                return $thumbnail;
            }

            if (Str::startsWith($thumbnail, 'storage/')) {
                return asset($thumbnail);
            }

            if (Str::startsWith($thumbnail, 'public/')) {
                $thumbnail = str_replace('public/', '', $thumbnail);
            }

            return asset('storage/' . $thumbnail);
        }

        $youtubeId = $this->youtubeId();

        if ($youtubeId) {
            return 'https://img.youtube.com/vi/' . $youtubeId . '/hqdefault.jpg';
        }

        return asset('images/Logo.png');
    }

    public function getEmbedUrlAttribute(): ?string
    {
        $youtubeId = $this->youtubeId();

        if ($youtubeId) {
            return 'https://www.youtube.com/embed/' . $youtubeId;
        }

        return null;
    }

    public function youtubeId(): ?string
    {
        $url = trim((string) $this->url);

        if ($url === '') {
            return null;
        }

        $patterns = [
            '/youtube\.com\/watch\?v=([^&]+)/',
            '/youtube\.com\/shorts\/([^?&]+)/',
            '/youtube\.com\/embed\/([^?&]+)/',
            '/youtu\.be\/([^?&]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1] ?? null;
            }
        }

        return null;
    }
}
