<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource\RelationManagers;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationGroup = "Communications";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Détails de l\'expéditeur')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('name')
                            ->label('Nom'),
                        \Filament\Infolists\Components\TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-m-envelope'),
                        \Filament\Infolists\Components\TextEntry::make('phone')
                            ->label('Téléphone')
                            ->icon('heroicon-m-phone'),
                        \Filament\Infolists\Components\TextEntry::make('created_at')
                            ->label('Reçu le')
                            ->dateTime('d M Y, H:i'),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Message')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('subject')
                            ->label('Sujet')
                            ->weight('bold'),
                        \Filament\Infolists\Components\TextEntry::make('message')
                            ->label('Contenu du message')
                            ->markdown()
                            ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable()
                    ->weight(fn ($record) => $record->is_read ? 'normal' : 'bold'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Sujet')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\IconColumn::make('replied_at')
                    ->label('Répondu')
                    ->boolean()
                    ->getStateUsing(fn ($record): bool => $record->replied_at !== null),
                Tables\Columns\TextColumn::make('replier.name')
                    ->label('Par')
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('reply')
                    ->label('Répondre')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->color('success')
                    ->form([
                        Forms\Components\Textarea::make('reply_message')
                            ->label('Votre réponse')
                            ->required()
                            ->rows(5)
                            ->hint('Un email sera envoyé à l\'expéditeur avec cette réponse.'),
                    ])
                    ->action(function (ContactMessage $record, array $data) {
                        \Illuminate\Support\Facades\Mail::raw($data['reply_message'], function ($message) use ($record) {
                            $message->to($record->email)
                                ->subject('RE: ' . $record->subject);
                        });
                        
                        $record->update([
                            'replied_at' => now(),
                            'replied_by' => auth()->id(),
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('Réponse envoyée avec succès')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
        ];
    }
}
