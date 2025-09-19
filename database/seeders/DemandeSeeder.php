<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Demande;
use App\Models\DetailDemande;
use Carbon\Carbon;

class DemandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create demandes for different professors
        $demandes = [
            [
                'dateDem' => Carbon::now()->subDays(30),
                'idProfesseur' => 1,
            ],
            [
                'dateDem' => Carbon::now()->subDays(25),
                'idProfesseur' => 2,
            ],
            [
                'dateDem' => Carbon::now()->subDays(20),
                'idProfesseur' => 3,
            ],
            [
                'dateDem' => Carbon::now()->subDays(15),
                'idProfesseur' => 4,
            ],
            [
                'dateDem' => Carbon::now()->subDays(10),
                'idProfesseur' => 5,
            ],
            [
                'dateDem' => Carbon::now()->subDays(8),
                'idProfesseur' => 6,
            ],
            [
                'dateDem' => Carbon::now()->subDays(5),
                'idProfesseur' => 7,
            ],
            [
                'dateDem' => Carbon::now()->subDays(3),
                'idProfesseur' => 8,
            ],
            [
                'dateDem' => Carbon::now()->subDays(1),
                'idProfesseur' => 9,
            ],
            [
                'dateDem' => Carbon::now(),
                'idProfesseur' => 10,
            ],
        ];

        foreach ($demandes as $demande) {
            $createdDemande = Demande::create($demande);
            
            // Create detail demandes (preferred lycees) for each demande
            $numLycees = rand(2, 5); // Each professor chooses 2-5 lycees
            $selectedLycees = collect(range(1, 48))->shuffle()->take($numLycees);
            
            foreach ($selectedLycees as $index => $lyceeId) {
                DetailDemande::create([
                    'idDemande' => $createdDemande->idDemande,
                    'idLycee' => $lyceeId,
                    'numOrdre' => $index + 1, // Order of preference
                ]);
            }
        }

        // Create some additional demandes for professors who already have one
        $additionalDemandes = [
            [
                'dateDem' => Carbon::now()->subDays(40),
                'idProfesseur' => 1, // Ahmed Alami - second demande
            ],
            [
                'dateDem' => Carbon::now()->subDays(35),
                'idProfesseur' => 3, // Mohammed Chraibi - second demande
            ],
            [
                'dateDem' => Carbon::now()->subDays(45),
                'idProfesseur' => 5, // Omar El Fassi - second demande
            ],
        ];

        foreach ($additionalDemandes as $demande) {
            $createdDemande = Demande::create($demande);
            
            // Create detail demandes for additional demandes
            $numLycees = rand(2, 4);
            $selectedLycees = collect(range(1, 48))->shuffle()->take($numLycees);
            
            foreach ($selectedLycees as $index => $lyceeId) {
                DetailDemande::create([
                    'idDemande' => $createdDemande->idDemande,
                    'idLycee' => $lyceeId,
                    'numOrdre' => $index + 1,
                ]);
            }
        }
    }
}
