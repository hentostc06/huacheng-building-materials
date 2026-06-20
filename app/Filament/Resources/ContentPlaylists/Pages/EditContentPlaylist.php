<?php

namespace App\Filament\Resources\ContentPlaylists\Pages;

use App\Filament\Resources\ContentPlaylists\ContentPlaylistResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditContentPlaylist extends EditRecord
{
    protected static string $resource = ContentPlaylistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

}
