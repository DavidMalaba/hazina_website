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
            Actions\Action::make('rappeler_tous')
                ->label('Rappeler tous les incomplets')
                ->icon('heroicon-m-megaphone')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Envoyer un rappel global')
                ->modalDescription('Cette action enverra un email à tous les candidats qui ont commencé leur inscription il y a plus de 24 heures mais qui ne l\'ont pas terminée. Voulez-vous continuer ?')
                ->action(function () {
                    $registrations = \App\Models\CohortRegistration::where('status', 'draft')
                        ->where('created_at', '<', now()->subDay())
                        ->where(function($query) {
                            $query->whereNull('last_reminded_at')
                                  ->orWhere('last_reminded_at', '<', now()->subDay());
                        })
                        ->get();

                    $count = 0;
                    foreach ($registrations as $registration) {
                        if ($registration->user && $registration->user->email) {
                            \Illuminate\Support\Facades\Mail::to($registration->user->email)
                                ->send(new \App\Mail\ReminderRegistrationMail($registration));
                            $registration->update(['last_reminded_at' => now()]);
                            $count++;
                        }
                    }

                    \Filament\Notifications\Notification::make()
                        ->title('Rappels envoyés')
                        ->body("$count candidat(s) ont été relancés avec succès.")
                        ->success()
                        ->send();
                }),
            Actions\CreateAction::make(),
        ];
    }
}
