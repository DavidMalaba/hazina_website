<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerRequestResource\Pages;
use App\Filament\Resources\PartnerRequestResource\RelationManagers;
use App\Models\PartnerRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerRequestResource extends Resource
{
    protected static ?string $model = PartnerRequest::class;

    protected static ?string $navigationGroup = "Communications";
    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    protected static ?string $modelLabel = 'Demande de partenariat';
    protected static ?string $pluralModelLabel = 'Demandes de partenariat';
    protected static ?string $navigationLabel = 'Demandes Partenaires';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Informations sur l\'organisation')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('org_name')
                            ->label('Nom de l\'organisation')
                            ->weight('bold'),
                        \Filament\Infolists\Components\TextEntry::make('org_type')
                            ->label('Type d\'organisation'),
                        \Filament\Infolists\Components\TextEntry::make('website')
                            ->label('Site web')
                            ->url(fn ($record) => str_starts_with($record->website, 'http') ? $record->website : 'https://'.$record->website)
                            ->openUrlInNewTab()
                            ->color('primary'),
                    ])->columns(3),

                \Filament\Infolists\Components\Section::make('Détails du Contact')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('contact_name')
                            ->label('Nom du contact'),
                        \Filament\Infolists\Components\TextEntry::make('contact_role')
                            ->label('Fonction'),
                        \Filament\Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-m-envelope'),
                        \Filament\Infolists\Components\TextEntry::make('phone')
                            ->label('Téléphone')
                            ->icon('heroicon-m-phone'),
                    ])->columns(2),

                \Filament\Infolists\Components\Section::make('Demande de Partenariat')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('interests')
                            ->label('Centres d\'intérêt')
                            ->badge()
                            ->separator(','),
                        \Filament\Infolists\Components\TextEntry::make('message')
                            ->label('Message / Description')
                            ->markdown()
                            ->columnSpanFull(),
                        \Filament\Infolists\Components\TextEntry::make('created_at')
                            ->label('Date de la demande')
                            ->dateTime('d M Y, H:i'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Lu')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('org_name')
                    ->label('Organisation')
                    ->searchable()
                    ->sortable()
                    ->weight(fn ($record) => $record->is_read ? 'normal' : 'bold'),
                Tables\Columns\TextColumn::make('org_type')
                    ->label('Type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_name')
                    ->label('Contact')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Reçu le')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPartnerRequests::route('/'),
            'view' => Pages\ViewPartnerRequest::route('/{record}'),
        ];
    }
}
