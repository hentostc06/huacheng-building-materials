<?php

namespace App\Filament\Resources\CompanyProjects\Pages;

use App\Filament\Resources\CompanyProjects\CompanyProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCompanyProjects extends ListRecords
{
    protected static string $resource = CompanyProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
