<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Utilisez putFile pour stocker le fichier dans le stockage
        $imagePath = 'images/1704747438.jpeg';

        User::create([
            'nom' => 'Ba',
            'prenom' => 'Demba',
            'adresse' => 'Diourbel',
            'email' => 'demba@gmail.com',
            'password' => Hash::make('Passer123'),
            'user_type' => 'admin',
            'role' => 'admin',
            'image' => $imagePath, // Pas besoin de guillemets autour de $image ici
        ]);
    }
}
