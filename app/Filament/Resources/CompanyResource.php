<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationGroup = "Écosystème";
    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $modelLabel = 'Entreprise';
    protected static ?string $pluralModelLabel = 'Entreprises';
    protected static ?string $navigationLabel = 'Entreprises';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo de l\'entreprise')
                    ->image()
                    ->directory('companies/logos')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        'applicant' => 'Candidat',
                        'partner' => 'Partenaire',
                    ])
                    ->required()
                    ->default('applicant')
                    ->live(),
                Forms\Components\Select::make('partner_category')
                    ->label('Catégorie de partenaire')
                    ->options([
                        'institution' => 'Institution',
                        'mine' => 'Mine',
                        'finance' => 'Finance',
                        'autre' => 'Autre',
                    ])
                    ->visible(fn (Forms\Get $get) => $get('type') === 'partner'),
                Forms\Components\Toggle::make('show_on_website')
                    ->label('Afficher sur le site web')
                    ->helperText('Si activé, cette entreprise sera visible publiquement sur le site.')
                    ->default(false)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('industry_sector')
                    ->maxLength(255),
                Forms\Components\TextInput::make('business_age_range')
                    ->maxLength(255),
                Forms\Components\TextInput::make('employee_count')
                    ->maxLength(255),
                Forms\Components\TextInput::make('revenue_range')
                    ->maxLength(255),
                Forms\Components\TextInput::make('client_count_range')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('province_id')
                    ->numeric(),
                Forms\Components\TextInput::make('city_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular()
                    ->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&background=059669&color=fff&bold=true')
                    ->size(42),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'applicant' => 'Candidat',
                        'partner'   => 'Partenaire',
                        default     => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'applicant' => 'gray',
                        'partner'   => 'success',
                        default     => 'gray',
                    }),

                Tables\Columns\TextColumn::make('partner_category')
                    ->label('Catégorie')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'institution' => 'Institution',
                        'mine'        => 'Mine',
                        'finance'     => 'Finance',
                        'autre'       => 'Autre',
                        default       => '—',
                    })
                    ->color('info')
                    ->placeholder('—'),

                Tables\Columns\ToggleColumn::make('show_on_website')
                    ->label('Visible sur le site')
                    ->sortable(),
            ])
            ->defaultSort('name')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Type')
                    ->options([
                        'applicant' => 'Candidat',
                        'partner'   => 'Partenaire',
                    ]),
                Tables\Filters\TernaryFilter::make('show_on_website')
                    ->label('Visible sur le site'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Modifier'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Supprimer'),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
