<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Kinshasa' => ['Kinshasa'],
            'Kongo Central' => ['Matadi', 'Boma', 'Moanda', 'Mbanza-Ngungu'],
            'Haut-Katanga' => ['Lubumbashi', 'Likasi', 'Kasumbalesa', 'Kipushi'],
            'Lualaba' => ['Kolwezi', 'Fungurume', 'Mutshatsha'],
            'Nord-Kivu' => ['Goma', 'Beni', 'Butembo', 'Rutshuru'],
            'Sud-Kivu' => ['Bukavu', 'Uvira', 'Kamituga', 'Baraka'],
            'Tshopo' => ['Kisangani', 'Isangi', 'Bafwasende'],
            'Haut-Uele' => ['Isiro', 'Watsa', 'Dungu'],
            'Ituri' => ['Bunia', 'Mahagi', 'Aru'],
            'Kasaï' => ['Tshikapa', 'Ilebo', 'Mweka'],
            'Kasaï-Central' => ['Kananga', 'Demba', 'Dimbelenge'],
            'Kasaï-Oriental' => ['Mbuji-Mayi', 'Tshilenge', 'Miabi'],
            'Lomami' => ['Kabinda', 'Mwene-Ditu'],
            'Sankuru' => ['Lusambo', 'Lodja', 'Tshumbe'],
            'Maniema' => ['Kindu', 'Kasongo', 'Punia'],
            'Tanganyika' => ['Kalemie', 'Kongolo', 'Moba'],
            'Haut-Lomami' => ['Kamina', 'Bukama', 'Malemba-Nkulu'],
            'Kwango' => ['Kenge', 'Popokabaka', 'Feshi'],
            'Kwilu' => ['Bandundu', 'Kikwit', 'Bulungu', 'Idiofa'],
            'Mai-Ndombe' => ['Inongo', 'Kutu', 'Nioki'],
            'Équateur' => ['Mbandaka', 'Bikoro', 'Bolomba'],
            'Nord-Ubangi' => ['Gbadolite', 'Businga', 'Yakoma'],
            'Sud-Ubangi' => ['Gemena', 'Zongo', 'Kungu'],
            'Mongala' => ['Lisala', 'Bumba', 'Bongandanga'],
            'Tshuapa' => ['Boende', 'Ikela', 'Monkoto'],
            'Bas-Uele' => ['Buta', 'Aketi', 'Bondo'],
        ];

        foreach ($data as $provinceName => $cities) {
            $province = \App\Models\Province::where('name', $provinceName)->first();
            if ($province) {
                foreach ($cities as $city) {
                    \App\Models\City::firstOrCreate([
                        'province_id' => $province->id,
                        'name' => $city,
                    ]);
                }
            }
        }
    }
}
