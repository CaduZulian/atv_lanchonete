<?php
namespace Database\Factories;

use App\Models\Encomenda;
use App\Models\ClienteEndereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncomendaFactory extends Factory
{
    protected $model = Encomenda::class;

    public function definition()
    {
        return [
            'id_cliente_endereco' => ClienteEndereco::factory(),
            'data_encomenda' => $this->faker->date(),
        ];
    }
}
?>