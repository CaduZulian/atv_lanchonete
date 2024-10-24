<?php
namespace Database\Factories;

use App\Models\ClienteEndereco;
use App\Models\Cliente;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteEnderecoFactory extends Factory
{
    protected $model = ClienteEndereco::class;

    public function definition()
    {
        return [
            'id_cliente' => Cliente::factory(),
            'id_endereco' => Endereco::factory(),
        ];
    }
}
?>