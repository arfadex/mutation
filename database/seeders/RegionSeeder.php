<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['nomRegion' => 'Casablanca-Settat'],
            ['nomRegion' => 'Rabat-Salé-Kénitra'],
            ['nomRegion' => 'Fès-Meknès'],
            ['nomRegion' => 'Marrakech-Safi'],
            ['nomRegion' => 'Tanger-Tétouan-Al Hoceïma'],
            ['nomRegion' => 'Oriental'],
            ['nomRegion' => 'Béni Mellal-Khénifra'],
            ['nomRegion' => 'Souss-Massa'],
            ['nomRegion' => 'Guelmim-Oued Noun'],
            ['nomRegion' => 'Laâyoune-Sakia El Hamra'],
            ['nomRegion' => 'Dakhla-Oued Ed-Dahab'],
            ['nomRegion' => 'Drâa-Tafilalet'],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }
    }
}
