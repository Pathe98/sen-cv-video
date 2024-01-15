<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // Assurez-vous d'importer la classe Storage
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Utilisez putFile pour stocker le fichier dans le stockage
        $imagePath = '/images/1704975255.jpg';
        User::create([
            'nom' => 'gueye',
            'prenom' => 'Adja Khoudia',
            'adresse' => 'Parcelles',
            'email' => 'adjakhou@gmail.com',
            'password' => Hash::make('adjakhou1234'),
            'user_type' => 'admin',
            'role' => 'admin',
            'image' => $imagePath, // Pas besoin de guillemets autour de $image ici

        
        ]);

        $imagePath = '/images/1705313403.jpg';
        User::create([
            'nom' => 'Ba',
            'prenom' => 'Demba',
            'adresse' => 'Dakar',
            'email' => 'demba@gmail.com',
            'password' => Hash::make('demba1234'),
            'user_type' => 'admin',
            'role' => 'admin',
            'image' => $imagePath, // Pas besoin de guillemets autour de $image ici

        
        ]);
    }
}
