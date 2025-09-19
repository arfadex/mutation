<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nom' => 'Alami',
                'prenom' => 'Ahmed',
                'email' => 'ahmed.alami@education.ma',
                'dateN' => '1985-03-15',
                'dateAffLycee' => '2010-09-01',
                'etatCivil' => 'Marié',
                'nEnfants' => 2,
                'username' => 'ahmed.alami',
                'password' => Hash::make('password123'),
                'points' => 150,
                'idLycee' => 1,
            ],
            [
                'nom' => 'Benali',
                'prenom' => 'Fatima',
                'email' => 'fatima.benali@education.ma',
                'dateN' => '1988-07-22',
                'dateAffLycee' => '2012-09-01',
                'etatCivil' => 'Célibataire',
                'nEnfants' => 0,
                'username' => 'fatima.benali',
                'password' => Hash::make('password123'),
                'points' => 200,
                'idLycee' => 2,
            ],
            [
                'nom' => 'Chraibi',
                'prenom' => 'Mohammed',
                'email' => 'mohammed.chraibi@education.ma',
                'dateN' => '1982-11-08',
                'dateAffLycee' => '2008-09-01',
                'etatCivil' => 'Marié',
                'nEnfants' => 3,
                'username' => 'mohammed.chraibi',
                'password' => Hash::make('password123'),
                'points' => 180,
                'idLycee' => 3,
            ],
            [
                'nom' => 'Daoudi',
                'prenom' => 'Aicha',
                'email' => 'aicha.daoudi@education.ma',
                'dateN' => '1990-01-14',
                'dateAffLycee' => '2015-09-01',
                'etatCivil' => 'Mariée',
                'nEnfants' => 1,
                'username' => 'aicha.daoudi',
                'password' => Hash::make('password123'),
                'points' => 120,
                'idLycee' => 4,
            ],
            [
                'nom' => 'El Fassi',
                'prenom' => 'Omar',
                'email' => 'omar.elfassi@education.ma',
                'dateN' => '1987-05-30',
                'dateAffLycee' => '2011-09-01',
                'etatCivil' => 'Marié',
                'nEnfants' => 2,
                'username' => 'omar.elfassi',
                'password' => Hash::make('password123'),
                'points' => 160,
                'idLycee' => 5,
            ],
            [
                'nom' => 'Fassi',
                'prenom' => 'Khadija',
                'email' => 'khadija.fassi@education.ma',
                'dateN' => '1984-09-12',
                'dateAffLycee' => '2009-09-01',
                'etatCivil' => 'Divorcée',
                'nEnfants' => 1,
                'username' => 'khadija.fassi',
                'password' => Hash::make('password123'),
                'points' => 140,
                'idLycee' => 6,
            ],
            [
                'nom' => 'Gharbi',
                'prenom' => 'Youssef',
                'email' => 'youssef.gharbi@education.ma',
                'dateN' => '1986-12-03',
                'dateAffLycee' => '2013-09-01',
                'etatCivil' => 'Célibataire',
                'nEnfants' => 0,
                'username' => 'youssef.gharbi',
                'password' => Hash::make('password123'),
                'points' => 190,
                'idLycee' => 7,
            ],
            [
                'nom' => 'Hassani',
                'prenom' => 'Zineb',
                'email' => 'zineb.hassani@education.ma',
                'dateN' => '1989-04-18',
                'dateAffLycee' => '2014-09-01',
                'etatCivil' => 'Mariée',
                'nEnfants' => 2,
                'username' => 'zineb.hassani',
                'password' => Hash::make('password123'),
                'points' => 170,
                'idLycee' => 8,
            ],
            [
                'nom' => 'Idrissi',
                'prenom' => 'Rachid',
                'email' => 'rachid.idrissi@education.ma',
                'dateN' => '1983-08-25',
                'dateAffLycee' => '2007-09-01',
                'etatCivil' => 'Marié',
                'nEnfants' => 4,
                'username' => 'rachid.idrissi',
                'password' => Hash::make('password123'),
                'points' => 220,
                'idLycee' => 9,
            ],
            [
                'nom' => 'Jabri',
                'prenom' => 'Naima',
                'email' => 'naima.jabri@education.ma',
                'dateN' => '1991-06-07',
                'dateAffLycee' => '2016-09-01',
                'etatCivil' => 'Célibataire',
                'nEnfants' => 0,
                'username' => 'naima.jabri',
                'password' => Hash::make('password123'),
                'points' => 100,
                'idLycee' => 10,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // Create admin user
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Système',
            'email' => 'admin@mutation.ma',
            'dateN' => '1980-01-01',
            'dateAffLycee' => '2000-09-01',
            'etatCivil' => 'Marié',
            'nEnfants' => 2,
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'points' => 0,
            'idLycee' => 1,
            'is_admin' => 1,
        ]);
    }
}
