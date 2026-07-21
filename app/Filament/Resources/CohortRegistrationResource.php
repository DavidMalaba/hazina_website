<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CohortRegistrationResource\Pages;
use App\Filament\Resources\CohortRegistrationResource\RelationManagers;
use App\Models\CohortRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CohortRegistrationResource extends Resource
{
    protected static ?string $model = CohortRegistration::class;

    protected static ?string $navigationGroup = "Événements";
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $modelLabel = 'Candidature';
    protected static ?string $pluralModelLabel = 'Candidatures';
    protected static ?string $navigationLabel = 'Candidatures';

    public static function form(Form $form): Form
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

    public static function infolist(\Filament\Infolists\Infolist $infolist): \Filament\Infolists\Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Dossier de candidature')
                    ->description('Détails complets de la demande d\'inscription.')
                    ->schema([
                        \Filament\Infolists\Components\Grid::make(3)
                            ->schema([
                                \Filament\Infolists\Components\TextEntry::make('cohort.name')
                                    ->label('Cohorte visée')
                                    ->weight('bold')
                                    ->icon('heroicon-m-academic-cap')
                                    ->color('primary'),
                                \Filament\Infolists\Components\TextEntry::make('company.name')
                                    ->label('Entreprise candidate')
                                    ->weight('bold')
                                    ->icon('heroicon-m-building-office-2'),
                                \Filament\Infolists\Components\TextEntry::make('status')
                                    ->label('Statut actuel')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'pending' => 'warning',
                                        'accepted' => 'success',
                                        'rejected' => 'danger',
                                        default => 'gray',
                                    }),
                            ]),

                        \Filament\Infolists\Components\Tabs::make('Tabs')
                            ->tabs([
                                \Filament\Infolists\Components\Tabs\Tab::make('L\'Entrepreneur')
                                    ->icon('heroicon-m-user')
                                    ->schema([
                                        \Filament\Infolists\Components\RepeatableEntry::make('company.users')
                                            ->label('Profils associés à l\'entreprise')
                                            ->schema([
                                                \Filament\Infolists\Components\TextEntry::make('first_name')->label('Prénom'),
                                                \Filament\Infolists\Components\TextEntry::make('last_name')->label('Nom'),
                                                \Filament\Infolists\Components\TextEntry::make('email')->label('Email')->icon('heroicon-m-envelope'),
                                                \Filament\Infolists\Components\TextEntry::make('phone')->label('Téléphone')->icon('heroicon-m-phone'),
                                                \Filament\Infolists\Components\TextEntry::make('gender')->label('Genre'),
                                                \Filament\Infolists\Components\TextEntry::make('bio')->label('Bio')->columnSpanFull(),
                                            ])->columns(2),
                                    ]),

                                \Filament\Infolists\Components\Tabs\Tab::make('L\'Entreprise')
                                    ->icon('heroicon-m-building-office')
                                    ->schema([
                                        \Filament\Infolists\Components\TextEntry::make('company.name')->label('Nom de l\'entreprise')->weight('bold'),
                                        \Filament\Infolists\Components\TextEntry::make('company.email')->label('Email de contact'),
                                        \Filament\Infolists\Components\TextEntry::make('company.website')->label('Site Web')->url(fn ($record) => $record->company->website ? (str_starts_with($record->company->website, 'http') ? $record->company->website : 'https://'.$record->company->website) : null)->openUrlInNewTab()->color('primary'),
                                        \Filament\Infolists\Components\TextEntry::make('company.industry_sector')->label('Secteur d\'activité'),
                                        \Filament\Infolists\Components\TextEntry::make('company.business_age_range')->label('Âge de l\'entreprise'),
                                        \Filament\Infolists\Components\TextEntry::make('company.employee_count')->label('Nombre d\'employés'),
                                        \Filament\Infolists\Components\TextEntry::make('company.revenue_range')->label('Chiffre d\'affaires'),
                                        \Filament\Infolists\Components\TextEntry::make('company.client_count_range')->label('Nombre de clients'),
                                        \Filament\Infolists\Components\TextEntry::make('company.city.name')->label('Ville'),
                                        \Filament\Infolists\Components\TextEntry::make('company.address')->label('Adresse physique')->columnSpanFull(),
                                        \Filament\Infolists\Components\TextEntry::make('company.description')->label('Description courte')->prose()->columnSpanFull(),
                                    ])->columns(2),

                                \Filament\Infolists\Components\Tabs\Tab::make('Les Documents')
                                    ->icon('heroicon-m-document-text')
                                    ->schema([
                                        \Filament\Infolists\Components\RepeatableEntry::make('company.documents')
                                            ->label('Documents légaux / Dossiers')
                                            ->schema([
                                                \Filament\Infolists\Components\TextEntry::make('type')->label('Type de document')->weight('bold'),
                                                \Filament\Infolists\Components\TextEntry::make('document_number')->label('Numéro de pièce / ID'),
                                                \Filament\Infolists\Components\TextEntry::make('file_path')
                                                    ->label('Fichier')
                                                    ->formatStateUsing(fn () => 'Télécharger / Voir le fichier')
                                                    ->url(fn ($state) => \Illuminate\Support\Facades\Storage::url($state))
                                                    ->openUrlInNewTab()
                                                    ->icon('heroicon-m-arrow-down-tray')
                                                    ->color('primary'),
                                            ])->columns(3),
                                    ]),

                                \Filament\Infolists\Components\Tabs\Tab::make('Motivation & Vision')
                                    ->icon('heroicon-m-sparkles')
                                    ->schema([
                                        \Filament\Infolists\Components\TextEntry::make('motivation')
                                            ->label('Pourquoi souhaitez-vous rejoindre cette cohorte ?')
                                            ->prose()
                                            ->columnSpanFull(),
                                        \Filament\Infolists\Components\TextEntry::make('desired_partners')
                                            ->label('Attentes & Partenaires recherchés')
                                            ->prose()
                                            ->columnSpanFull(),
                                    ]),
                                \Filament\Infolists\Components\Tabs\Tab::make('Le Projet')
                                    ->icon('heroicon-m-rocket-launch')
                                    ->schema([
                                        \Filament\Infolists\Components\TextEntry::make('project_description')
                                            ->label('Description du projet')
                                            ->prose()
                                            ->columnSpanFull(),
                                        \Filament\Infolists\Components\TextEntry::make('problem_solved')
                                            ->label('Problème résolu')
                                            ->prose()
                                            ->columnSpanFull(),
                                        \Filament\Infolists\Components\TextEntry::make('solution_description')
                                            ->label('Solution proposée')
                                            ->prose()
                                            ->columnSpanFull(),
                                        \Filament\Infolists\Components\TextEntry::make('target_market')
                                            ->label('Marché cible')
                                            ->prose()
                                            ->columnSpanFull(),
                                    ]),
                            ])->columnSpanFull(),

                        \Filament\Infolists\Components\TextEntry::make('created_at')
                            ->label('Candidature soumise le')
                            ->dateTime('d M Y à H:i')
                            ->color('gray')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cohort.name')
                    ->label('Cohorte')
                    ->sortable(),
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
                        'draft' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('current_step')
                    ->label('Étape actuelle')
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'informations_personnelles' => 'Infos personnelles',
                        'entreprise' => 'Entreprise',
                        'documents' => 'Documents',
                        'projet' => 'Projet',
                        default => $state,
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()->label('Modifier Statut'),
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
            'index' => Pages\ListCohortRegistrations::route('/'),
            'view' => Pages\ViewCohortRegistration::route('/{record}'),
            'edit' => Pages\EditCohortRegistration::route('/{record}/edit'),
        ];
    }
}
