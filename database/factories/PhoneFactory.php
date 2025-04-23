<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'number' => $this->faker->phoneNumber(),
            'type' => $this->faker->randomElement(['mobile', 'home', 'work']),
        ];
    }
}