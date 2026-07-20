<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            'Bas-Uele', 'Équateur', 'Haut-Katanga', 'Haut-Lomami', 'Haut-Uele', 'Ituri',
            'Kasaï', 'Kasaï-Central', 'Kasaï-Oriental', 'Kinshasa', 'Kongo Central',
            'Kwango', 'Kwilu', 'Lomami', 'Lualaba', 'Mai-Ndombe', 'Maniema', 'Mongala',
            'Nord-Kivu', 'Nord-Ubangi', 'Sankuru', 'Sud-Kivu', 'Sud-Ubangi', 'Tanganyika',
            'Tshopo', 'Tshuapa'
        ];

        foreach ($provinces as $province) {
            \App\Models\Province::firstOrCreate(['name' => $province]);
        }
    }
}
