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
                'description' => "La première cohorte de l'année, axée sur l'innovation technologique dans le secteur minier. Un programme intensif de 6 mois pour transformer votre projet en entreprise bankable, intégrée dans la chaîne de valeur minière.\n\nNous accompagnons des startups et PME innovantes à travers des ateliers de formation, du mentoring avec des experts du secteur, des mises en relation avec des grands groupes miniers et des sessions de pitch devant des investisseurs.",
                'start_date' => now()->addMonths(2),
                'end_date' => now()->addMonths(8),
                'registration_start_date' => now()->subWeeks(2),
                'registration_end_date' => now()->addMonths(1),
                'max_participants' => 20,
                'sector' => 'Innovation & Tech Minière',
                'status' => 'open',
                'image' => '/images/engineer-sunset.jpg',
            ],
            [
                'name' => 'Cohorte Beta - 2024',
                'slug' => 'cohorte-beta-2024',
                'description' => "La seconde cohorte, dédiée à la chaîne de valeur et à la sous-traitance. Préparez-vous à intégrer les grands marchés miniers en tant que fournisseur de services ou de biens stratégiques.\n\nCette cohorte met l'accent sur les opportunités de sous-traitance locale, la conformité aux standards internationaux et l'accès aux contrats des sociétés minières.",
                'start_date' => now()->addMonths(4),
                'end_date' => now()->addMonths(10),
                'registration_start_date' => now()->addMonths(2),
                'registration_end_date' => now()->addMonths(3),
                'max_participants' => 25,
                'sector' => 'Chaîne de Valeur & Sous-traitance',
                'status' => 'upcoming',
                'image' => '/images/miner-sunset.jpg',
            ],
            [
                'name' => 'Cohorte Pilote - 2023',
                'slug' => 'cohorte-pilote-2023',
                'description' => "Notre toute première cohorte, un succès retentissant avec 15 startups accompagnées et 3 financées. Ce programme pilote a permis de valider notre modèle d'accompagnement et de nouer de précieux partenariats avec les acteurs clés du secteur.",
                'start_date' => now()->subYear(),
                'end_date' => now()->subMonths(6),
                'registration_start_date' => now()->subMonths(14),
                'registration_end_date' => now()->subMonths(13),
                'max_participants' => 15,
                'sector' => 'Programme Pilote',
                'status' => 'completed',
                'image' => '/images/professional-woman.jpg',
            ],
        ];

        foreach ($cohorts as $cohort) {
            \App\Models\Cohort::create($cohort);
        }
    }
}
