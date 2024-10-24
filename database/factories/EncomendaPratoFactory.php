<?php
namespace Database\Factories;

use App\Models\EncomendaPrato;
use App\Models\Encomenda;
use App\Models\Prato;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncomendaPratoFactory extends Factory
{
    protected $model = EncomendaPrato::class;

    public function definition()
    {
        return [
            'id_encomenda' => Encomenda::factory(),
            'id_prato' => Prato::factory(),
            'quantidade' => $this->faker->numberBetween(1, 10),
        ];
    }
}
?>