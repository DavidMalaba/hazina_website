<?php

namespace App\Filament\Resources\PartnerRequestResource\Pages;

use App\Filament\Resources\PartnerRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPartnerRequest extends ViewRecord
{
    protected static string $resource = PartnerRequestResource::class;

    public function mount(int | string $record): void
    {
        parent::mount($record);
        
        if (!$this->record->is_read) {
            $this->record->update(['is_read' => true]);
        }
    }
}
