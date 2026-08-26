<?php

namespace App\Filament\Resources\CohortRegistrationResource\Widgets;

use App\Models\CohortRegistration;
use App\Models\Cohort;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CohortRegistrationStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalCohorts = Cohort::count();
        $totalRegistrations = CohortRegistration::count();
        $completedRegistrations = CohortRegistration::where('status', '!=', 'draft')->count();
        $inProgressRegistrations = CohortRegistration::where('status', 'draft')->count();

        return [
            Stat::make('Total Cohortes', $totalCohorts)
                ->icon('heroicon-o-academic-cap'),
            Stat::make('Total Inscrits', $totalRegistrations)
                ->description('Toutes inscriptions confondues')
                ->icon('heroicon-o-users'),
            Stat::make('Inscriptions Finalisées', $completedRegistrations)
                ->description('Candidatures soumises')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),
            Stat::make('Inscriptions En Cours', $inProgressRegistrations)
                ->description('Brouillons')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}
