<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            // Institutions Publiques
            ['name' => 'Ministère des Mines', 'category' => 'Institutions Publiques'],
            ['name' => 'ARSP', 'category' => 'Institutions Publiques'],
            ['name' => 'Camine', 'category' => 'Institutions Publiques'],
            ['name' => 'Gouvernement Provincial', 'category' => 'Institutions Publiques'],
            
            // Entreprises Minières
            ['name' => 'Glencore', 'category' => 'Entreprises Minières'],
            ['name' => 'TFM', 'category' => 'Entreprises Minières'],
            ['name' => 'Kamoa', 'category' => 'Entreprises Minières'],
            ['name' => 'KCC', 'category' => 'Entreprises Minières'],
            ['name' => 'Gecamine', 'category' => 'Entreprises Minières'],
            ['name' => 'Barrick', 'category' => 'Entreprises Minières'],
            ['name' => 'MMG', 'category' => 'Entreprises Minières'],
            ['name' => 'Ivanhoe', 'category' => 'Entreprises Minières'],
            
            // Écosystème & Finance
            ['name' => 'Silikin', 'category' => 'Écosystème & Finance'],
            ['name' => 'EquityBCDC', 'category' => 'Écosystème & Finance'],
            ['name' => 'Rawbank', 'category' => 'Écosystème & Finance'],
            ['name' => 'Enabel', 'category' => 'Écosystème & Finance'],
        ];

        foreach ($partners as $partner) {
            \App\Models\Company::updateOrCreate(
                ['name' => $partner['name']],
                [
                    'type' => 'partner',
                    'partner_category' => $partner['category'],
                ]
            );
        }
    }
}
