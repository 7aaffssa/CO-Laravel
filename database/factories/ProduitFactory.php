<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'prix' => $this->faker->randomFloat(2, 10, 500),
            'idC' => Categorie::inRandomOrder()->first()->idC ?? Categorie::factory(),
        ];
    }
}