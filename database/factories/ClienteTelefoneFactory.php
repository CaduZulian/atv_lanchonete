<?php
namespace Database\Factories;

use App\Models\ClienteTelefone;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteTelefoneFactory extends Factory
{
    protected $model = ClienteTelefone::class;

    public function definition()
    {
        return [
            'id_cliente' => Cliente::factory(),
            'telefone_cliente' => $this->faker->phoneNumber(),
        ];
    }
}
?>