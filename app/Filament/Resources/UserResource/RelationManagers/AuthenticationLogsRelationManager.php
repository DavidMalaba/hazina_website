<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthenticationLogsRelationManager extends RelationManager
{
    protected static string $relationship = 'authenticationLogs';
    protected static ?string $title = 'Historique des connexions';
    
    public function isReadOnly(): bool
    {
        return true;
    }

    public function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('email')
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'successful' => 'success',
                        'failed' => 'danger',
                        default => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'successful' => 'Succès',
                        'failed' => 'Échec',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Localisation')
                    ->getStateUsing(fn ($record) => ($record->city && $record->country) ? "{$record->city}, {$record->country}" : 'Inconnue'),
                Tables\Columns\TextColumn::make('device')
                    ->label('Appareil')
                    ->description(fn ($record) => "{$record->browser} sur {$record->platform}")
                    ->searchable(['device', 'browser', 'platform']),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }
}
