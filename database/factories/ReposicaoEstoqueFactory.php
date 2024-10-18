<?php

namespace Database\Factories;

use App\Models\ReposicaoEstoque;
use App\Models\Fornecedor;
use App\Models\Ingrediente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReposicaoEstoqueFactory extends Factory
{
    protected $model = ReposicaoEstoque::class;

    public function definition()
    {
        return [
            'id_fornecedores' => Fornecedor::factory(),
            'id_ingredientes' => Ingrediente::factory(),
            'data_compra' => $this->faker->date,
            'nota_fiscal' => $this->faker->unique()->numberBetween(1000, 9999),
        ];
    }
}
