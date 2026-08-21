<?php

namespace App\Filament\Resources\CohortRegistrationResource\Pages;

use App\Filament\Resources\CohortRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCohortRegistration extends ViewRecord
{
    protected static string $resource = CohortRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('rappeler')
                ->label('Rappeler')
                ->icon('heroicon-m-paper-airplane')
                ->color('warning')
                ->hidden(fn () => $this->record->status !== 'draft' || $this->record->created_at > now()->subDay())
                ->action(function () {
                    \Illuminate\Support\Facades\Mail::to($this->record->user->email)->send(new \App\Mail\ReminderRegistrationMail($this->record));
                    \Filament\Notifications\Notification::make()
                        ->title('Rappel envoyé avec succès')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Envoyer un rappel')
                ->modalDescription('Êtes-vous sûr de vouloir envoyer un e-mail de rappel à ce candidat pour qu\'il termine son inscription ?'),
            Actions\EditAction::make()
                ->label('Modifier Statut')
                ->hidden(fn () => $this->record->status === 'draft'),
        ];
    }
}
