<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecoFactory extends Factory
{
    protected $model = Endereco::class;

    public function definition()
    {
        return [
            'rua' => $this->faker->streetName,
            'bairro' => $this->faker->citySuffix,
            'numero_casa' => $this->faker->buildingNumber,
            'cidade' => $this->faker->city,
        ];
    }
}
