<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // // Chemin de l'image existante
        $imagePath = 'images/1704831720.jpeg';

        // // Utilisez la méthode basename pour obtenir le nom du fichier
        // $filename = basename($imagePath);

        // // Utilisez Storage::copy pour copier l'image vers le stockage
        // Storage::copy($imagePath, 'public/' . $filename);

        User::create([
            'nom' => 'BA',
            'prenom' => 'Demba Pathe',
            'email' => 'demba@gmail.com',
            'adresse' => 'Pikine',
            'user_type' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('Passer123'),
            'image' => $imagePath,
        ]);
    }
}
