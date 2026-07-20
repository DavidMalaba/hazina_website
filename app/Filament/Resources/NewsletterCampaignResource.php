<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterCampaignResource\Pages;
use App\Filament\Resources\NewsletterCampaignResource\RelationManagers;
use App\Models\NewsletterCampaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsletterCampaignResource extends Resource
{
    protected static ?string $model = NewsletterCampaign::class;

    protected static ?string $navigationGroup = 'Communications';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom de la campagne')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\Tabs::make('Canaux')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Email')
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                Forms\Components\Toggle::make('send_email')
                                    ->label('Envoyer par Email')
                                    ->default(true)
                                    ->live(),
                                Forms\Components\TextInput::make('email_subject')
                                    ->label('Sujet de l\'email')
                                    ->required(fn (Forms\Get $get): bool => (bool) $get('send_email'))
                                    ->visible(fn (Forms\Get $get): bool => (bool) $get('send_email')),
                                Forms\Components\RichEditor::make('email_content')
                                    ->label('Contenu de l\'email')
                                    ->required(fn (Forms\Get $get): bool => (bool) $get('send_email'))
                                    ->visible(fn (Forms\Get $get): bool => (bool) $get('send_email'))
                                    ->columnSpanFull(),
                            ]),
                        
                        Forms\Components\Tabs\Tab::make('WhatsApp')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->schema([
                                Forms\Components\Toggle::make('send_whatsapp')
                                    ->label('Envoyer par WhatsApp')
                                    ->default(false)
                                    ->live(),
                                Forms\Components\Textarea::make('whatsapp_content')
                                    ->label('Message WhatsApp')
                                    ->hint('Vous pouvez utiliser des emojis.')
                                    ->rows(6)
                                    ->required(fn (Forms\Get $get): bool => (bool) $get('send_whatsapp'))
                                    ->visible(fn (Forms\Get $get): bool => (bool) $get('send_whatsapp'))
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('SMS')
                            ->icon('heroicon-o-device-phone-mobile')
                            ->schema([
                                Forms\Components\Toggle::make('send_sms')
                                    ->label('Envoyer par SMS')
                                    ->default(false)
                                    ->live(),
                                Forms\Components\Textarea::make('sms_content')
                                    ->label('Texte du SMS')
                                    ->hint('Faites court et précis.')
                                    ->rows(3)
                                    ->required(fn (Forms\Get $get): bool => (bool) $get('send_sms'))
                                    ->visible(fn (Forms\Get $get): bool => (bool) $get('send_sms'))
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom de la campagne')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('send_email')
                    ->label('Email')
                    ->boolean(),
                Tables\Columns\IconColumn::make('send_whatsapp')
                    ->label('WhatsApp')
                    ->boolean(),
                Tables\Columns\IconColumn::make('send_sms')
                    ->label('SMS')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sent_at')
                    ->label('Envoyé le')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListNewsletterCampaigns::route('/'),
            'create' => Pages\CreateNewsletterCampaign::route('/create'),
            'edit' => Pages\EditNewsletterCampaign::route('/{record}/edit'),
        ];
    }
}
