<?php

namespace Database\Factories;

use App\Models\Prato;
use Illuminate\Database\Eloquent\Factories\Factory;

class PratoFactory extends Factory
{
    protected $model = Prato::class;

    public function definition()
    {
        return [
            'nome_pratos' => $this->faker->word,
            'valor' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
