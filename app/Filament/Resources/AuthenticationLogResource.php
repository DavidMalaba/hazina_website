<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthenticationLogResource\Pages;
use App\Filament\Resources\AuthenticationLogResource\RelationManagers;
use App\Models\AuthenticationLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthenticationLogResource extends Resource
{
    protected static ?string $model = AuthenticationLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';
    protected static ?string $modelLabel = 'Journal de connexion';
    protected static ?string $pluralModelLabel = 'Journaux de connexion';
    protected static ?string $navigationLabel = 'Journal des connexions';

    protected static ?string $navigationGroup = 'Sécurité et Accès';
    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->label('Email'),
                Forms\Components\TextInput::make('ip_address')
                    ->label('Adresse IP'),
                Forms\Components\TextInput::make('city')
                    ->label('Ville'),
                Forms\Components\TextInput::make('country')
                    ->label('Pays'),
                Forms\Components\TextInput::make('device')
                    ->label('Appareil'),
                Forms\Components\TextInput::make('browser')
                    ->label('Navigateur'),
                Forms\Components\TextInput::make('platform')
                    ->label('Système d\'exploitation'),
                Forms\Components\TextInput::make('status')
                    ->label('Statut'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Utilisateur')
                    ->searchable()
                    ->sortable()
                    ->placeholder(fn ($record) => $record->email ?? 'Inconnu'),
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
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'successful' => 'Succès',
                        'failed' => 'Échec',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Pas de suppression en masse pour la sécurité
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthenticationLogs::route('/'),
            'view' => Pages\ViewAuthenticationLog::route('/{record}'),
        ];
    }
}
