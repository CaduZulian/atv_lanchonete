<?php

namespace Database\Factories;

use App\Models\Encomenda;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncomendaFactory extends Factory
{
    protected $model = Encomenda::class;

    public function definition()
    {
        return [
            'id_clientes' => Cliente::factory(),
        ];
    }
}
