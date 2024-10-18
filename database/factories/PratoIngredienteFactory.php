<?php

namespace Database\Factories;

use App\Models\PratoIngrediente;
use App\Models\Prato;
use App\Models\Ingrediente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PratoIngredienteFactory extends Factory
{
    protected $model = PratoIngrediente::class;

    public function definition()
    {
        return [
            'id_pratos' => Prato::factory(),
            'id_ingredientes' => Ingrediente::factory(),
        ];
    }
}
