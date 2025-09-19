<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RegionSeeder::class,
            AcademieSeeder::class,
            LyceeSeeder::class,
            UserSeeder::class,
            DemandeSeeder::class,
        ]);
    }
}
