<?php

namespace App\Filament\Resources\ContentPlaylists\Pages;

use App\Filament\Resources\ContentPlaylists\ContentPlaylistResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContentPlaylists extends ListRecords
{
    protected static string $resource = ContentPlaylistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
