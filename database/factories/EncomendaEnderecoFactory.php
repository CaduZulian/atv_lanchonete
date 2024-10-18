<?php

namespace Database\Factories;

use App\Models\EncomendaEndereco;
use App\Models\Encomenda;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncomendaEnderecoFactory extends Factory
{
    protected $model = EncomendaEndereco::class;

    public function definition()
    {
        return [
            'id_encomendas' => Encomenda::factory(),
            'id_enderecos' => Endereco::factory(),
        ];
    }
}
