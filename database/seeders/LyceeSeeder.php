<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lycee;

class LyceeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lycees = [
            // Casablanca
            ['nomLycee' => 'Lycée Hassan II', 'ville' => 'Casablanca', 'idAcademie' => 1],
            ['nomLycee' => 'Lycée Mohammed V', 'ville' => 'Casablanca', 'idAcademie' => 1],
            ['nomLycee' => 'Lycée Ibn Sina', 'ville' => 'Casablanca', 'idAcademie' => 1],
            ['nomLycee' => 'Lycée Al Khawarizmi', 'ville' => 'Casablanca', 'idAcademie' => 2],
            ['nomLycee' => 'Lycée Ibn Battuta', 'ville' => 'Casablanca', 'idAcademie' => 2],
            
            // Settat
            ['nomLycee' => 'Lycée Al Farabi', 'ville' => 'Settat', 'idAcademie' => 3],
            ['nomLycee' => 'Lycée Ibn Rushd', 'ville' => 'Settat', 'idAcademie' => 3],
            
            // Rabat
            ['nomLycee' => 'Lycée Hassan II', 'ville' => 'Rabat', 'idAcademie' => 4],
            ['nomLycee' => 'Lycée Mohammed VI', 'ville' => 'Rabat', 'idAcademie' => 4],
            ['nomLycee' => 'Lycée Ibn Khaldoun', 'ville' => 'Rabat', 'idAcademie' => 5],
            ['nomLycee' => 'Lycée Al Kindi', 'ville' => 'Rabat', 'idAcademie' => 5],
            
            // Salé
            ['nomLycee' => 'Lycée Al Ghazali', 'ville' => 'Salé', 'idAcademie' => 6],
            ['nomLycee' => 'Lycée Ibn Tufail', 'ville' => 'Salé', 'idAcademie' => 6],
            
            // Kénitra
            ['nomLycee' => 'Lycée Al Biruni', 'ville' => 'Kénitra', 'idAcademie' => 7],
            ['nomLycee' => 'Lycée Ibn Hayyan', 'ville' => 'Kénitra', 'idAcademie' => 7],
            
            // Fès
            ['nomLycee' => 'Lycée Al Qarawiyyin', 'ville' => 'Fès', 'idAcademie' => 8],
            ['nomLycee' => 'Lycée Ibn Al Baitar', 'ville' => 'Fès', 'idAcademie' => 8],
            ['nomLycee' => 'Lycée Al Idrissi', 'ville' => 'Fès', 'idAcademie' => 9],
            ['nomLycee' => 'Lycée Ibn Zuhr', 'ville' => 'Fès', 'idAcademie' => 9],
            
            // Meknès
            ['nomLycee' => 'Lycée Al Mansour', 'ville' => 'Meknès', 'idAcademie' => 10],
            ['nomLycee' => 'Lycée Ibn Al Nafis', 'ville' => 'Meknès', 'idAcademie' => 10],
            
            // Marrakech
            ['nomLycee' => 'Lycée Ibn Al Khatib', 'ville' => 'Marrakech', 'idAcademie' => 11],
            ['nomLycee' => 'Lycée Al Ma\'mun', 'ville' => 'Marrakech', 'idAcademie' => 11],
            ['nomLycee' => 'Lycée Ibn Al Haytham', 'ville' => 'Marrakech', 'idAcademie' => 12],
            ['nomLycee' => 'Lycée Al Razi', 'ville' => 'Marrakech', 'idAcademie' => 12],
            
            // Safi
            ['nomLycee' => 'Lycée Al Zahrawi', 'ville' => 'Safi', 'idAcademie' => 13],
            ['nomLycee' => 'Lycée Ibn Al Jazzar', 'ville' => 'Safi', 'idAcademie' => 13],
            
            // Tanger
            ['nomLycee' => 'Lycée Ibn Al Baytar', 'ville' => 'Tanger', 'idAcademie' => 14],
            ['nomLycee' => 'Lycée Al Tusi', 'ville' => 'Tanger', 'idAcademie' => 14],
            ['nomLycee' => 'Lycée Ibn Al Shatir', 'ville' => 'Tanger', 'idAcademie' => 15],
            
            // Tétouan
            ['nomLycee' => 'Lycée Al Farghani', 'ville' => 'Tétouan', 'idAcademie' => 16],
            ['nomLycee' => 'Lycée Ibn Al Majid', 'ville' => 'Tétouan', 'idAcademie' => 16],
            
            // Oujda
            ['nomLycee' => 'Lycée Al Battani', 'ville' => 'Oujda', 'idAcademie' => 17],
            ['nomLycee' => 'Lycée Ibn Al Samh', 'ville' => 'Oujda', 'idAcademie' => 18],
            
            // Nador
            ['nomLycee' => 'Lycée Al Khazini', 'ville' => 'Nador', 'idAcademie' => 19],
            ['nomLycee' => 'Lycée Ibn Al Awwam', 'ville' => 'Nador', 'idAcademie' => 19],
            
            // Béni Mellal
            ['nomLycee' => 'Lycée Al Mas\'udi', 'ville' => 'Béni Mellal', 'idAcademie' => 20],
            ['nomLycee' => 'Lycée Ibn Al Wafid', 'ville' => 'Béni Mellal', 'idAcademie' => 21],
            
            // Khénifra
            ['nomLycee' => 'Lycée Al Dimashqi', 'ville' => 'Khénifra', 'idAcademie' => 22],
            
            // Agadir
            ['nomLycee' => 'Lycée Ibn Al Banna', 'ville' => 'Agadir', 'idAcademie' => 23],
            ['nomLycee' => 'Lycée Al Marrakushi', 'ville' => 'Agadir', 'idAcademie' => 23],
            ['nomLycee' => 'Lycée Ibn Al Qifti', 'ville' => 'Agadir', 'idAcademie' => 24],
            
            // Taroudant
            ['nomLycee' => 'Lycée Al Qalqashandi', 'ville' => 'Taroudant', 'idAcademie' => 25],
            
            // Guelmim
            ['nomLycee' => 'Lycée Al Suyuti', 'ville' => 'Guelmim', 'idAcademie' => 26],
            
            // Laâyoune
            ['nomLycee' => 'Lycée Al Maqrizi', 'ville' => 'Laâyoune', 'idAcademie' => 27],
            
            // Dakhla
            ['nomLycee' => 'Lycée Al Nuwayri', 'ville' => 'Dakhla', 'idAcademie' => 29],
            
            // Errachidia
            ['nomLycee' => 'Lycée Al Dhahabi', 'ville' => 'Errachidia', 'idAcademie' => 30],
            
            // Ouarzazate
            ['nomLycee' => 'Lycée Al Safadi', 'ville' => 'Ouarzazate', 'idAcademie' => 31],
        ];

        foreach ($lycees as $lycee) {
            Lycee::create($lycee);
        }
    }
}
