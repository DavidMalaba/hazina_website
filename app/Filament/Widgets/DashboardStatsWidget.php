<?php

namespace App\Filament\Widgets;

use App\Models\City;
use App\Models\Cohort;
use App\Models\CohortRegistration;
use App\Models\Company;
use App\Models\ContactMessage;
use App\Models\PartnerRequest;
use App\Models\Province;
use App\Models\User;
use App\Filament\Resources\CityResource;
use App\Filament\Resources\CohortRegistrationResource;
use App\Filament\Resources\CohortResource;
use App\Filament\Resources\CompanyResource;
use App\Filament\Resources\ContactMessageResource;
use App\Filament\Resources\PartnerRequestResource;
use App\Filament\Resources\ProvinceResource;
use App\Filament\Resources\UserResource;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Utilisateurs', User::count())
                ->description('Total des comptes inscrits')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->url(UserResource::getUrl('index')),

            Stat::make('Entreprises', Company::count())
                ->description('Startups et Partenaires')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary')
                ->url(CompanyResource::getUrl('index')),

            Stat::make('Provinces Couvertes', Province::count())
                ->description('Présence nationale')
                ->descriptionIcon('heroicon-m-map')
                ->color('success')
                ->url(ProvinceResource::getUrl('index')),

            Stat::make('Villes', City::count())
                ->description('Total des villes')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('success')
                ->url(CityResource::getUrl('index')),

            Stat::make('Cohortes Créées', Cohort::count())
                ->description('Nombre total de cohortes')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('emerald')
                ->url(CohortResource::getUrl('index')),
                
            Stat::make('Entreprises Inscrites', CohortRegistration::count())
                ->description('Total des candidatures aux cohortes')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('info')
                ->url(CohortRegistrationResource::getUrl('index')),
                
            Stat::make('Messages Reçus', ContactMessage::count())
                ->description('Depuis le formulaire de contact')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('gray')
                ->url(ContactMessageResource::getUrl('index')),
                
            Stat::make('Demandes de Partenariat', PartnerRequest::count())
                ->description('Institutions & Investisseurs')
                ->descriptionIcon('heroicon-m-hand-raised')
                ->color('warning')
                ->url(PartnerRequestResource::getUrl('index')),
        ];
    }
}
