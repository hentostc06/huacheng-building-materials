<?php

namespace App\Models\Concerns;

use App\Services\GoogleTranslateService;
use Illuminate\Support\Facades\Log;
use Throwable;

trait AutoTranslatesZhFields
{
    protected static function bootAutoTranslatesZhFields(): void
    {
        static::saving(function ($model): void {
            $model->fillBlankChineseTranslations();
        });
    }

    protected function fillBlankChineseTranslations(): void
    {
        foreach ($this->autoTranslateZhPairs() as $sourceColumn => $targetColumn) {
            $sourceText = trim((string) $this->getAttribute($sourceColumn));
            $targetText = trim((string) $this->getAttribute($targetColumn));

            if ($sourceText === '' || $targetText !== '') {
                continue;
            }

            try {
                $translated = app(GoogleTranslateService::class)->translate($sourceText);

                if ($translated) {
                    $this->setAttribute($targetColumn, $translated);
                }
            } catch (Throwable $e) {
                Log::warning('Auto translate Mandarin gagal.', [
                    'model' => static::class,
                    'source_column' => $sourceColumn,
                    'target_column' => $targetColumn,
                    'message' => $e->getMessage(),
                ]);
            }
        }
    }

    protected function autoTranslateZhPairs(): array
    {
        $pairs = [];
        $fillable = $this->getFillable();

        foreach ($fillable as $column) {
            if (! str_ends_with($column, '_zh')) {
                continue;
            }

            $sourceColumn = substr($column, 0, -3);

            if (in_array($sourceColumn, $fillable, true)) {
                $pairs[$sourceColumn] = $column;
            }
        }

        return $pairs;
    }
}
