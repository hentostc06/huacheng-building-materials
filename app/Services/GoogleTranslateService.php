<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class GoogleTranslateService
{
    public function translate(?string $text, string $source = 'id', ?string $target = null): ?string
    {
        $text = trim((string) $text);

        if ($text === '') {
            return null;
        }

        $apiKey = (string) config('services.google_translate.api_key');

        if ($apiKey === '') {
            Log::warning('Google Translate API key belum diisi. Isi GOOGLE_TRANSLATE_API_KEY di file .env.');

            return null;
        }

        $target = $target ?: (string) config('services.google_translate.target', 'zh-CN');

        try {
            $response = Http::timeout(25)
                ->retry(2, 500)
                ->asForm()
                ->post('https://translation.googleapis.com/language/translate/v2?key=' . urlencode($apiKey), [
                    'q' => $text,
                    'source' => $source,
                    'target' => $target,
                    'format' => 'text',
                ]);

            if (! $response->successful()) {
                Log::warning('Google Translate API gagal.', [
                    'status' => $response->status(),
                    'body' => mb_substr($response->body(), 0, 500),
                ]);

                return null;
            }

            $translated = data_get($response->json(), 'data.translations.0.translatedText');

            if (! is_string($translated) || trim($translated) === '') {
                return null;
            }

            return html_entity_decode($translated, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        } catch (Throwable $e) {
            Log::warning('Google Translate API exception.', [
                'message' => $e->getMessage(),
            ]);

            return null;
        }
    }
}
