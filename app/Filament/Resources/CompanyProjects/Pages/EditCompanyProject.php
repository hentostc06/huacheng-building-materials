<?php

namespace App\Filament\Resources\CompanyProjects\Pages;

use App\Filament\Resources\CompanyProjects\CompanyProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCompanyProject extends EditRecord
{
    protected static string $resource = CompanyProjectResource::class;

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
