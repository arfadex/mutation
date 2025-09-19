<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Academie;

class AcademieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academies = [
            // Casablanca-Settat
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Casablanca-Settat', 'idRegion' => 1],
            ['nomAcademie' => 'Académie de Casablanca', 'idRegion' => 1],
            ['nomAcademie' => 'Académie de Settat', 'idRegion' => 1],
            
            // Rabat-Salé-Kénitra
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Rabat-Salé-Kénitra', 'idRegion' => 2],
            ['nomAcademie' => 'Académie de Rabat', 'idRegion' => 2],
            ['nomAcademie' => 'Académie de Salé', 'idRegion' => 2],
            ['nomAcademie' => 'Académie de Kénitra', 'idRegion' => 2],
            
            // Fès-Meknès
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Fès-Meknès', 'idRegion' => 3],
            ['nomAcademie' => 'Académie de Fès', 'idRegion' => 3],
            ['nomAcademie' => 'Académie de Meknès', 'idRegion' => 3],
            
            // Marrakech-Safi
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Marrakech-Safi', 'idRegion' => 4],
            ['nomAcademie' => 'Académie de Marrakech', 'idRegion' => 4],
            ['nomAcademie' => 'Académie de Safi', 'idRegion' => 4],
            
            // Tanger-Tétouan-Al Hoceïma
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Tanger-Tétouan-Al Hoceïma', 'idRegion' => 5],
            ['nomAcademie' => 'Académie de Tanger', 'idRegion' => 5],
            ['nomAcademie' => 'Académie de Tétouan', 'idRegion' => 5],
            
            // Oriental
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Oriental', 'idRegion' => 6],
            ['nomAcademie' => 'Académie d\'Oujda', 'idRegion' => 6],
            ['nomAcademie' => 'Académie de Nador', 'idRegion' => 6],
            
            // Béni Mellal-Khénifra
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Béni Mellal-Khénifra', 'idRegion' => 7],
            ['nomAcademie' => 'Académie de Béni Mellal', 'idRegion' => 7],
            ['nomAcademie' => 'Académie de Khénifra', 'idRegion' => 7],
            
            // Souss-Massa
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Souss-Massa', 'idRegion' => 8],
            ['nomAcademie' => 'Académie d\'Agadir', 'idRegion' => 8],
            ['nomAcademie' => 'Académie de Taroudant', 'idRegion' => 8],
            
            // Guelmim-Oued Noun
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Guelmim-Oued Noun', 'idRegion' => 9],
            ['nomAcademie' => 'Académie de Guelmim', 'idRegion' => 9],
            
            // Laâyoune-Sakia El Hamra
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Laâyoune-Sakia El Hamra', 'idRegion' => 10],
            ['nomAcademie' => 'Académie de Laâyoune', 'idRegion' => 10],
            
            // Dakhla-Oued Ed-Dahab
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Dakhla-Oued Ed-Dahab', 'idRegion' => 11],
            ['nomAcademie' => 'Académie de Dakhla', 'idRegion' => 11],
            
            // Drâa-Tafilalet
            ['nomAcademie' => 'Académie Régionale de l\'Éducation et de la Formation Drâa-Tafilalet', 'idRegion' => 12],
            ['nomAcademie' => 'Académie de Errachidia', 'idRegion' => 12],
            ['nomAcademie' => 'Académie de Ouarzazate', 'idRegion' => 12],
        ];

        foreach ($academies as $academie) {
            Academie::create($academie);
        }
    }
}
