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
        $imagePath = 'public/images/moi.jpeg';
        $image = Storage::putFile('images', $imagePath, 'public');

        User::create([
            'nom' => 'Ba',
            'prenom' => 'Demba',
            'adresse' => 'Diourbel',
            'email' => 'demba@gmail.com',
            'password' => Hash::make('Passer123'),
            'user_type' => 'admin',
            'role' => 'admin',
            'image' => $image, // Pas besoin de guillemets autour de $image ici
        ]);
    }
}
