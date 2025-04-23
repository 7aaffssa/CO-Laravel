<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Phone;
use Illuminate\Database\Seeder;

class ClientPhoneSeeder extends Seeder
{
    public function run()
    {
        // Create 10 clients with phones
        Client::factory()
            ->count(10)
            ->create();
        
            Phone::factory()
            ->count(10)
            ->create();
    }
}