<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterSubscriberResource\Pages;
use App\Filament\Resources\NewsletterSubscriberResource\RelationManagers;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsletterSubscriberResource extends Resource
{
    protected static ?string $model = NewsletterSubscriber::class;

    protected static ?string $navigationGroup = 'Communications';
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $modelLabel = 'Abonné';
    protected static ?string $pluralModelLabel = 'Abonnés Newsletter';
    protected static ?string $navigationLabel = 'Abonnés';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informations Personnelles')->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nom')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                        ->label('Téléphone')
                        ->maxLength(50),
                    Forms\Components\Toggle::make('is_phone_also')
                        ->label('Ce numéro est-il aussi pour les appels ?')
                        ->default(false),
                    Forms\Components\Select::make('status')
                        ->label('Statut Global')
                        ->options(\App\Enums\SubscriberStatus::class)
                        ->default(\App\Enums\SubscriberStatus::Active)
                        ->required()
                        ->live(),
                    Forms\Components\Textarea::make('unsubscription_reason')
                        ->label('Raison de désabonnement')
                        ->visible(fn (Forms\Get $get) => $get('status') === \App\Enums\SubscriberStatus::Unsubscribed->value)
                        ->columnSpanFull(),
                ])->columns(2),

                Forms\Components\Section::make('Préférences de Communication')->schema([
                    Forms\Components\Toggle::make('accepts_email')
                        ->label('Accepte E-mails')
                        ->default(true),
                    Forms\Components\Toggle::make('accepts_whatsapp')
                        ->label('Accepte WhatsApp')
                        ->default(true),
                    Forms\Components\Toggle::make('accepts_sms')
                        ->label('Accepte SMS')
                        ->default(true),
                ])->columns(3),
            ]);
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Détails de l\'abonné')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('name')
                            ->label('Nom')
                            ->weight('bold'),
                        \Filament\Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-m-envelope'),
                        \Filament\Infolists\Components\TextEntry::make('phone')
                            ->label('Téléphone')
                            ->icon('heroicon-m-phone'),
                        \Filament\Infolists\Components\IconEntry::make('is_phone_also')
                            ->label('Numéro d\'appel')
                            ->boolean(),
                        \Filament\Infolists\Components\TextEntry::make('status')
                            ->label('Statut Global')
                            ->badge(),
                        \Filament\Infolists\Components\TextEntry::make('created_at')
                            ->label('Abonné le')
                            ->dateTime('d M Y, H:i'),
                        \Filament\Infolists\Components\TextEntry::make('unsubscription_reason')
                            ->label('Raison de désabonnement')
                            ->columnSpanFull()
                            ->visible(fn ($record) => $record->status === \App\Enums\SubscriberStatus::Unsubscribed),
                    ])->columns(2),
                
                \Filament\Infolists\Components\Section::make('Canaux Acceptés')
                    ->schema([
                        \Filament\Infolists\Components\IconEntry::make('accepts_email')
                            ->label('E-mail')
                            ->boolean(),
                        \Filament\Infolists\Components\IconEntry::make('accepts_whatsapp')
                            ->label('WhatsApp')
                            ->boolean(),
                        \Filament\Infolists\Components\IconEntry::make('accepts_sms')
                            ->label('SMS')
                            ->boolean(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Téléphone')
                    ->searchable(),
                Tables\Columns\IconColumn::make('accepts_email')
                    ->label('Email')
                    ->boolean(),
                Tables\Columns\IconColumn::make('accepts_whatsapp')
                    ->label('WhatsApp')
                    ->boolean(),
                Tables\Columns\IconColumn::make('accepts_sms')
                    ->label('SMS')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut Global')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()->label('Modifier')->icon('heroicon-o-pencil'),
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
            'index' => Pages\ListNewsletterSubscribers::route('/'),
            'view' => Pages\ViewNewsletterSubscriber::route('/{record}'),
        ];
    }
}
