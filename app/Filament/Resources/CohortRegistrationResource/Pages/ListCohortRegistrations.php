<?php

namespace App\Filament\Resources\CohortRegistrationResource\Pages;

use App\Filament\Resources\CohortRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCohortRegistrations extends ListRecords
{
    protected static string $resource = CohortRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
