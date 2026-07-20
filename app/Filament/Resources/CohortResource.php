<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CohortResource\Pages;
use App\Filament\Resources\CohortResource\RelationManagers;
use App\Models\Cohort;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CohortResource extends Resource
{
    protected static ?string $model = Cohort::class;

    protected static ?string $navigationGroup = "Événements";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom de la cohorte')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->label('Description')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'blockquote', 'bold', 'bulletList', 'h2', 'h3', 'italic', 'link', 'orderedList', 'redo', 'strike', 'underline', 'undo',
                    ]),
                Forms\Components\FileUpload::make('brochure')
                    ->label('Brochure (PDF)')
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('cohorts/brochures')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Date de début')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('Date de fin')
                    ->required(),
                Forms\Components\DatePicker::make('registration_start_date')
                    ->label('Début des inscriptions'),
                Forms\Components\DatePicker::make('registration_end_date')
                    ->label('Fin des inscriptions'),
                Forms\Components\TextInput::make('max_participants')
                    ->label('Participants max')
                    ->numeric(),
                Forms\Components\TextInput::make('sector')
                    ->label('Secteur (optionnel)')
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Statut')
                    ->options([
                        'draft' => 'Brouillon',
                        'published' => 'Publiée',
                        'closed' => 'Fermée',
                    ])
                    ->required()
                    ->default('draft'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->columnSpanFull(),
            ]);
    }

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Informations générales')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('name')
                            ->label('Nom de la cohorte')
                            ->weight('bold'),
                        \Filament\Infolists\Components\TextEntry::make('status')
                            ->label('Statut')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'draft' => 'gray',
                                'published' => 'success',
                                'closed' => 'danger',
                                default => 'primary',
                            }),
                        \Filament\Infolists\Components\TextEntry::make('sector')
                            ->label('Secteur ciblé'),
                        \Filament\Infolists\Components\TextEntry::make('max_participants')
                            ->label('Places maximums'),
                        \Filament\Infolists\Components\TextEntry::make('description')
                            ->label('Description')
                            ->html()
                            ->columnSpanFull(),
                    ])->columns(2),

                \Filament\Infolists\Components\Section::make('Calendrier')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('registration_start_date')
                            ->label('Ouverture des inscriptions')
                            ->date('d M Y'),
                        \Filament\Infolists\Components\TextEntry::make('registration_end_date')
                            ->label('Fermeture des inscriptions')
                            ->date('d M Y'),
                        \Filament\Infolists\Components\TextEntry::make('start_date')
                            ->label('Début du programme')
                            ->date('d M Y'),
                        \Filament\Infolists\Components\TextEntry::make('end_date')
                            ->label('Fin du programme')
                            ->date('d M Y'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'closed' => 'danger',
                        default => 'primary',
                    }),
                Tables\Columns\TextColumn::make('registrations_count')
                    ->counts('registrations')
                    ->label('Inscrits')
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Début')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('registration_end_date')
                    ->label('Fin inscript.')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\RegistrationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCohorts::route('/'),
            'create' => Pages\CreateCohort::route('/create'),
            'view' => Pages\ViewCohort::route('/{record}'),
            'edit' => Pages\EditCohort::route('/{record}/edit'),
        ];
    }
}
