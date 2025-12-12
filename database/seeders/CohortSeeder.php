<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CohortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cohorts = [
            [
                'name' => 'Cohorte Alpha - 2024',
                'slug' => 'cohorte-alpha-2024',
                'description' => "La première cohorte de l'année, axée sur l'innovation technologique dans le secteur minier. Un programme intensif de 6 mois pour transformer votre projet.",
                'start_date' => now()->subMonths(2),
                'end_date' => now()->addMonths(4),
                'status' => 'open',
                'image' => '/images/engineer-sunset.jpg',
            ],
            [
                'name' => 'Cohorte Beta - 2024',
                'slug' => 'cohorte-beta-2024',
                'description' => "La seconde cohorte, dédiée à la chaîne de valeur et à la sous-traitance. Préparez-vous à intégrer les grands marchés miniers.",
                'start_date' => now()->addMonths(3),
                'end_date' => now()->addMonths(9),
                'status' => 'upcoming',
                'image' => '/images/miner-sunset.jpg',
            ],
            [
                'name' => 'Cohorte Pilote - 2023',
                'slug' => 'cohorte-pilote-2023',
                'description' => "Notre toute première cohorte, un succès retentissant avec 15 startups accompagnées et 3 financées.",
                'start_date' => now()->subYear(),
                'end_date' => now()->subMonths(6),
                'status' => 'completed',
                'image' => '/images/professional-woman.jpg',
            ],
        ];

        foreach ($cohorts as $cohort) {
            \App\Models\Cohort::create($cohort);
        }
    }
}
