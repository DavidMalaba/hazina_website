<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterCampaignResource\Pages;
use App\Models\NewsletterCampaign;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsletterCampaignResource extends Resource
{
    protected static ?string $model = NewsletterCampaign::class;

    protected static ?string $navigationGroup = 'Communications';
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';
    protected static ?string $modelLabel = 'Campagne';
    protected static ?string $pluralModelLabel = 'Campagnes Newsletter';
    protected static ?string $navigationLabel = 'Campagnes';

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
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\Group::make([
                                        Forms\Components\Toggle::make('send_email')
                                            ->label('Envoyer par Email')
                                            ->default(true)
                                            ->live(),
                                        Forms\Components\TextInput::make('email_subject')
                                            ->label('Sujet de l\'email')
                                            ->required(fn (Forms\Get $get): bool => (bool) $get('send_email'))
                                            ->visible(fn (Forms\Get $get): bool => (bool) $get('send_email'))
                                            ->live(debounce: 500),
                                        Forms\Components\RichEditor::make('email_content')
                                            ->label('Contenu de l\'email')
                                            ->required(fn (Forms\Get $get): bool => (bool) $get('send_email'))
                                            ->visible(fn (Forms\Get $get): bool => (bool) $get('send_email'))
                                            ->live(debounce: 500),
                                        Forms\Components\Fieldset::make('Bouton d\'Appel à l\'Action (Optionnel)')
                                            ->schema([
                                                Forms\Components\TextInput::make('cta_text')
                                                    ->label('Texte du bouton')
                                                    ->placeholder('ex: Découvrir nos offres')
                                                    ->maxLength(255)
                                                    ->live(debounce: 500),
                                                Forms\Components\TextInput::make('cta_url')
                                                    ->label('Lien du bouton')
                                                    ->url()
                                                    ->placeholder('https://...')
                                                    ->live(debounce: 500),
                                            ])
                                            ->visible(fn (Forms\Get $get): bool => (bool) $get('send_email')),
                                    ])->columnSpan(1),
                                    Forms\Components\Group::make([
                                        Forms\Components\Placeholder::make('email_preview')
                                            ->label('')
                                            ->content(fn (Forms\Get $get) => view('filament.forms.components.email-preview', [
                                                'subject' => $get('email_subject'),
                                                'content' => $get('email_content'),
                                                'cta_text' => $get('cta_text'),
                                                'cta_url' => $get('cta_url'),
                                            ]))
                                    ])->columnSpan(1)->visible(fn (Forms\Get $get): bool => (bool) $get('send_email')),
                                ])
                            ]),
                        
                        Forms\Components\Tabs\Tab::make('WhatsApp')
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->schema([
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\Group::make([
                                        Forms\Components\Toggle::make('send_whatsapp')
                                            ->label('Envoyer par WhatsApp')
                                            ->default(false)
                                            ->live(),
                                        Forms\Components\FileUpload::make('whatsapp_image')
                                            ->label('Image WhatsApp')
                                            ->image()
                                            ->directory('whatsapp-campaigns')
                                            ->visible(fn (Forms\Get $get): bool => (bool) $get('send_whatsapp'))
                                            ->live(debounce: 500),
                                        Forms\Components\Textarea::make('whatsapp_content')
                                            ->label('Message WhatsApp')
                                            ->hint('Vous pouvez utiliser des emojis.')
                                            ->rows(6)
                                            ->required(fn (Forms\Get $get): bool => (bool) $get('send_whatsapp'))
                                            ->visible(fn (Forms\Get $get): bool => (bool) $get('send_whatsapp'))
                                            ->live(debounce: 500),
                                        Forms\Components\Fieldset::make('Bouton WhatsApp (Optionnel)')
                                            ->schema([
                                                Forms\Components\TextInput::make('whatsapp_cta_text')
                                                    ->label('Texte du bouton')
                                                    ->placeholder('ex: S\'inscrire')
                                                    ->maxLength(255)
                                                    ->live(debounce: 500),
                                                Forms\Components\TextInput::make('whatsapp_cta_url')
                                                    ->label('Lien du bouton')
                                                    ->url()
                                                    ->placeholder('https://...')
                                                    ->live(debounce: 500),
                                            ])
                                            ->visible(fn (Forms\Get $get): bool => (bool) $get('send_whatsapp')),
                                    ])->columnSpan(1),
                                    Forms\Components\Group::make([
                                        Forms\Components\Placeholder::make('whatsapp_preview')
                                            ->label('')
                                            ->content(fn (Forms\Get $get) => view('filament.forms.components.whatsapp-preview', [
                                                'content' => $get('whatsapp_content'),
                                                'image' => $get('whatsapp_image'),
                                                'cta_text' => $get('whatsapp_cta_text'),
                                                'cta_url' => $get('whatsapp_cta_url'),
                                            ]))
                                    ])->columnSpan(1)->visible(fn (Forms\Get $get): bool => (bool) $get('send_whatsapp')),
                                ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('SMS')
                            ->icon('heroicon-o-device-phone-mobile')
                            ->schema([
                                Forms\Components\Grid::make(2)->schema([
                                    Forms\Components\Group::make([
                                        Forms\Components\Toggle::make('send_sms')
                                            ->label('Envoyer par SMS')
                                            ->default(false)
                                            ->live(),
                                        Forms\Components\Textarea::make('sms_content')
                                            ->label('Texte du SMS')
                                            ->hint('Faites court et précis.')
                                            ->rows(4)
                                            ->required(fn (Forms\Get $get): bool => (bool) $get('send_sms'))
                                            ->visible(fn (Forms\Get $get): bool => (bool) $get('send_sms'))
                                            ->live(debounce: 500),
                                    ])->columnSpan(1),
                                    Forms\Components\Group::make([
                                        Forms\Components\Placeholder::make('sms_preview')
                                            ->label('')
                                            ->content(fn (Forms\Get $get) => view('filament.forms.components.sms-preview', [
                                                'content' => $get('sms_content'),
                                            ]))
                                    ])->columnSpan(1)->visible(fn (Forms\Get $get): bool => (bool) $get('send_sms')),
                                ]),
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
                Tables\Actions\Action::make('envoyer')
                    ->label('Envoyer')
                    ->icon('heroicon-m-paper-airplane')
                    ->color('success')
                    ->hidden(fn ($record) => $record->sent_at !== null)
                    ->requiresConfirmation()
                    ->modalHeading('Envoyer la campagne')
                    ->modalDescription('Êtes-vous sûr de vouloir envoyer cette campagne à tous les abonnés actifs ?')
                    ->action(function ($record) {
                        \App\Jobs\SendNewsletterCampaignJob::dispatch($record);
                        $record->update(['sent_at' => now()]);
                        \Filament\Notifications\Notification::make()
                            ->title('Campagne en cours d\'envoi')
                            ->body('Les messages sont en train d\'être envoyés en arrière-plan.')
                            ->success()
                            ->send();
                    }),
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
