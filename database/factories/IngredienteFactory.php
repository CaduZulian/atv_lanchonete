<?php
namespace Database\Factories;

use App\Models\Ingrediente;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredienteFactory extends Factory
{
    protected $model = Ingrediente::class;

    public function definition()
    {
        return [
            'nome_ingrediente' => $this->faker->word(),
            'quantidade_ingrediente' => $this->faker->numberBetween(10, 100),
        ];
    }
}
?>