<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Throwable;

class AdminTranslateService
{
    public function translate(?string $text, string $source = 'id', string $target = 'zh-CN'): ?string
    {
        $text = trim((string) $text);

        if ($text === '') {
            return null;
        }

        try {
            $translator = new GoogleTranslate();
            $translator->setSource($source);
            $translator->setTarget($target);

            $translated = $translator->translate($text);

            if (! is_string($translated) || trim($translated) === '') {
                return null;
            }

            return html_entity_decode(trim($translated), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        } catch (Throwable $e) {
            Log::warning('Admin translate gagal.', [
                'message' => $e->getMessage(),
            ]);

            return null;
        }
    }
}
