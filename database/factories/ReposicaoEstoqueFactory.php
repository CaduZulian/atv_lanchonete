<?php
namespace Database\Factories;

use App\Models\ReposicaoEstoque;
use App\Models\IngredienteFornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReposicaoEstoqueFactory extends Factory
{
    protected $model = ReposicaoEstoque::class;

    public function definition()
    {
        return [
            'nota_fiscal' => $this->faker->bothify('NF-#######'),
            'id_ingrediente_fornecedor' => IngredienteFornecedor::factory(),
            'data_compra' => $this->faker->date(),
            'valor_ingrediente' => $this->faker->randomFloat(2, 10, 500),
            'quantidade' => $this->faker->numberBetween(10, 100),
        ];
    }
}
?>