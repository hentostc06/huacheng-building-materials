<?php

namespace App\Filament\Resources\CompanyProjects\Pages;

use App\Filament\Resources\CompanyProjects\CompanyProjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCompanyProject extends CreateRecord
{
    protected static string $resource = CompanyProjectResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

}
