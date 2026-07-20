<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            CohortSeeder::class,
            PartnerSeeder::class,
        ]);

        $adminRole = \App\Models\Role::where('name', 'admin')->first();

        User::firstOrCreate(
            ['email' => 'malabadavidson@gmail.com'],
            [
                'first_name' => 'David',
                'last_name' => 'MALABA',
                'role_id' => $adminRole->id,
                'password' => bcrypt('password'),
                'phone' => '+243823474128',
            ]
        );
    }
}
