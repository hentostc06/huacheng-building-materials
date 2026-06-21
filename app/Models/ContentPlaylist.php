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
        'video_file',
        'description',
        'description_zh',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getVideoFileUrlAttribute(): ?string
    {
        if (! $this->video_file) {
            return null;
        }

        return $this->resolvePublicFileUrl((string) $this->video_file);
    }

    public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail) {
            return $this->resolvePublicFileUrl((string) $this->thumbnail);
        }

        $youtubeId = $this->youtubeId();

        if ($youtubeId) {
            return 'https://img.youtube.com/vi/' . $youtubeId . '/hqdefault.jpg';
        }

        if ($this->isTikTokContent()) {
            return $this->placeholderThumbnailSvg(
                label: 'TIKTOK',
                title: $this->title ?: 'TikTok Video',
                subtitle: 'Putar di TikTok yuk?'
            );
        }

        return $this->placeholderThumbnailSvg(
            label: 'HUACHENG',
            title: $this->title ?: 'Playlist Konten',
            subtitle: 'Konten Huacheng'
        );
    }

    public function getEmbedUrlAttribute(): ?string
    {
        $youtubeId = $this->youtubeId();

        if ($youtubeId) {
            return 'https://www.youtube-nocookie.com/embed/' . $youtubeId . '?rel=0&modestbranding=1&playsinline=1';
        }

        $tiktokId = $this->tiktokId();

        if ($tiktokId) {
            return 'https://www.tiktok.com/embed/v2/' . $tiktokId;
        }

        return null;
    }

    public function getIsEmbeddableAttribute(): bool
    {
        return filled($this->embed_url);
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

    public function tiktokId(): ?string
    {
        $url = trim((string) $this->url);

        if ($url === '') {
            return null;
        }

        $patterns = [
            '/tiktok\.com\/@[^\/]+\/video\/([0-9]+)/',
            '/tiktok\.com\/embed\/v2\/([0-9]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1] ?? null;
            }
        }

        return null;
    }

    private function isTikTokContent(): bool
    {
        return str_contains(strtolower((string) $this->platform), 'tiktok')
            || str_contains(strtolower((string) $this->url), 'tiktok.com');
    }

    private function resolvePublicFileUrl(string $path): string
    {
        $file = ltrim($path, '/');

        if (Str::startsWith($file, ['http://', 'https://', 'data:'])) {
            return $file;
        }

        if (Str::startsWith($file, 'storage/')) {
            return asset($file);
        }

        if (Str::startsWith($file, 'public/')) {
            $file = str_replace('public/', '', $file);
        }

        return asset('storage/' . $file);
    }

    private function placeholderThumbnailSvg(string $label, string $title, string $subtitle): string
    {
        $label = htmlspecialchars(Str::upper($label), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $title = htmlspecialchars(Str::limit($title, 34), ENT_QUOTES | ENT_XML1, 'UTF-8');
        $subtitle = htmlspecialchars($subtitle, ENT_QUOTES | ENT_XML1, 'UTF-8');

        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1280" height="720" viewBox="0 0 1280 720">
  <defs>
    <linearGradient id="bg" x1="0" y1="0" x2="1" y2="1">
      <stop offset="0%" stop-color="#020617"/>
      <stop offset="52%" stop-color="#082f49"/>
      <stop offset="100%" stop-color="#075985"/>
    </linearGradient>
    <radialGradient id="glow1" cx="80%" cy="18%" r="58%">
      <stop offset="0%" stop-color="#38bdf8" stop-opacity="0.42"/>
      <stop offset="100%" stop-color="#38bdf8" stop-opacity="0"/>
    </radialGradient>
    <radialGradient id="glow2" cx="18%" cy="82%" r="55%">
      <stop offset="0%" stop-color="#0ea5e9" stop-opacity="0.22"/>
      <stop offset="100%" stop-color="#0ea5e9" stop-opacity="0"/>
    </radialGradient>
  </defs>

  <rect width="1280" height="720" fill="url(#bg)"/>
  <rect width="1280" height="720" fill="url(#glow1)"/>
  <rect width="1280" height="720" fill="url(#glow2)"/>

  <text x="640" y="455" text-anchor="middle" font-family="Arial, sans-serif" font-size="46" font-weight="900" fill="#ffffff">{$title}</text>
  <text x="640" y="505" text-anchor="middle" font-family="Arial, sans-serif" font-size="22" font-weight="700" fill="#bae6fd">{$subtitle}</text>

  <text x="640" y="620" text-anchor="middle" font-family="Arial, sans-serif" font-size="17" font-weight="800" letter-spacing="4" fill="#ffffff" fill-opacity="0.45">HUACHENG BUILDING MATERIALS</text>
</svg>
SVG;

        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }
}
