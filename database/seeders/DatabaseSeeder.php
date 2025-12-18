<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //Créer un admin
        User::create([
            'name' => 'Teshani',
            'email' => 'admin@test.fr',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        //Créer un utilisateur normal
        User::create([
            'name' => 'Lina',
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        
        $this->call([
            CategorySeeder::class,
            BookSeeder::class,
        ]);
    }
}
