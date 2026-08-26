<?php

namespace App\Filament\Resources\NewsletterSubscriberResource\Pages;

use App\Filament\Resources\NewsletterSubscriberResource;
use App\Models\NewsletterSubscriber;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ListNewsletterSubscribers extends ListRecords
{
    protected static string $resource = NewsletterSubscriberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Ajouter un abonné'),
            
            Actions\Action::make('download_template')
                ->label('Modèle CSV')
                ->icon('heroicon-o-document-arrow-down')
                ->color('gray')
                ->action(function () {
                    $headers = [
                        'Content-type' => 'text/csv',
                        'Content-Disposition' => 'attachment; filename=modele_abonnes.csv',
                        'Pragma' => 'no-cache',
                        'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                        'Expires' => '0',
                    ];
                    
                    $columns = ['nom', 'email', 'telephone', 'is_phone_also'];
                    
                    $callback = function() use ($columns) {
                        $file = fopen('php://output', 'w');
                        fputcsv($file, $columns, ';');
                        fputcsv($file, ['Jean Dupont', 'jean@exemple.com', '+243999999999', '1'], ';');
                        fclose($file);
                    };
                    
                    return response()->stream($callback, 200, $headers);
                }),
                
            Actions\Action::make('import_csv')
                ->label('Importer CSV')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('success')
                ->form([
                    FileUpload::make('csv_file')
                        ->label('Fichier CSV')
                        ->acceptedFileTypes(['text/csv', 'text/plain', 'application/csv'])
                        ->required()
                        ->storeFiles(false)
                ])
                ->action(function (array $data) {
                    $file = $data['csv_file'];
                    
                    if (!file_exists($file->getRealPath())) {
                        Notification::make()->title('Erreur fichier')->danger()->send();
                        return;
                    }
                    
                    $handle = fopen($file->getRealPath(), 'r');
                    $header = fgetcsv($handle, 1000, ';');
                    
                    // Fallback to comma if semicolon didn't work properly
                    if (count($header) === 1) {
                        fclose($handle);
                        $handle = fopen($file->getRealPath(), 'r');
                        $header = fgetcsv($handle, 1000, ',');
                    }
                    
                    $count = 0;
                    while (($row = fgetcsv($handle, 1000, count($header) > 1 && strpos(implode(',', $header), ';') !== false ? ';' : ',')) !== false) {
                        if (count($header) == count($row)) {
                            $rowData = array_combine($header, $row);
                            
                            // Map columns based on French names used in template
                            $email = $rowData['email'] ?? null;
                            if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) continue;
                            
                            $name = $rowData['nom'] ?? 'Inconnu';
                            $phone = $rowData['telephone'] ?? null;
                            $isPhoneAlso = isset($rowData['is_phone_also']) ? filter_var($rowData['is_phone_also'], FILTER_VALIDATE_BOOLEAN) : false;
                            
                            NewsletterSubscriber::updateOrCreate(
                                ['email' => $email],
                                [
                                    'name' => $name,
                                    'phone' => $phone,
                                    'is_phone_also' => $isPhoneAlso,
                                    'status' => \App\Enums\SubscriberStatus::Active,
                                ]
                            );
                            $count++;
                        }
                    }
                    fclose($handle);
                    
                    Notification::make()
                        ->title('Import terminé')
                        ->body("$count abonnés ont été importés ou mis à jour avec succès.")
                        ->success()
                        ->send();
                }),
        ];
    }
}
