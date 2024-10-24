<?php
namespace Database\Factories;

use App\Models\IngredienteFornecedor;
use App\Models\Ingrediente;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredienteFornecedorFactory extends Factory
{
    protected $model = IngredienteFornecedor::class;

    public function definition()
    {
        return [
            'id_ingrediente' => Ingrediente::factory(),
            'id_fornecedor' => Fornecedor::factory(),
        ];
    }
}
?>