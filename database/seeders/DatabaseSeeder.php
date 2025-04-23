<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Categorie::factory(5)->create();
        Produit::factory(500)->create();
        
        // User::factory(10)->create();
  
        $this->call(ClientPhoneSeeder::class);
    }
}
