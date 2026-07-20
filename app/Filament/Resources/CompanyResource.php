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
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                    ->options([
                        'institution' => 'Institution',
                        'mine' => 'Mine',
                        'finance' => 'Finance',
                        'autre' => 'Autre',
                    ])
                    ->visible(fn (Forms\Get $get) => $get('type') === 'partner'),
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
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'applicant' => 'gray',
                        'partner' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('partner_category')
                    ->badge(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('industry_sector')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business_age_range')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_count')
                    ->searchable(),
                Tables\Columns\TextColumn::make('revenue_range')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_count_range')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
