<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition()
    {
        return [
            'nome_fornecedor' => $this->faker->company,
            'valor_ingrediente' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
