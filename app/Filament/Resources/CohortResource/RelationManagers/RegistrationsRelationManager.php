<?php

namespace App\Filament\Resources\CohortResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegistrationsRelationManager extends RelationManager
{
    protected static string $relationship = 'registrations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->label('Statut de la candidature')
                    ->options([
                        'pending' => 'En attente',
                        'accepted' => 'Acceptée',
                        'rejected' => 'Refusée',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('company.name')
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Entreprise')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Soumise le')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                // We don't typically create registrations from here (done via front-end)
            ])
            ->actions([
                Tables\Actions\Action::make('view_details')
                    ->label('Détails')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => \App\Filament\Resources\CohortRegistrationResource::getUrl('view', ['record' => $record])),
                Tables\Actions\EditAction::make()->label('Modifier Statut'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
