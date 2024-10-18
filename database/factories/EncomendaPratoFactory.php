<?php

namespace Database\Factories;

use App\Models\EncomendaPrato;
use App\Models\Encomenda;
use App\Models\Prato;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncomendaPratoFactory extends Factory
{
    protected $model = EncomendaPrato::class;

    public function definition()
    {
        return [
            'id_encomendas' => Encomenda::factory(),
            'id_pratos' => Prato::factory(),
            'quantidade_pratos' => $this->faker->numberBetween(1, 5),
            'preco_total' => $this->faker->randomFloat(2, 20, 200),
            'data_encomendas' => $this->faker->date,
        ];
    }
}
