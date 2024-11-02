<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\ClienteTelefone;
use App\Models\Endereco;
use App\Models\ClienteEndereco;
use App\Models\Encomenda;
use App\Models\Prato;
use App\Models\EncomendaPrato;
use App\Models\Ingrediente;
use App\Models\PratoIngrediente;
use App\Models\Fornecedor;
use App\Models\IngredienteFornecedor;
use App\Models\ReposicaoEstoque;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory()
            ->has(ClienteTelefone::factory()->count(2))
            ->has(ClienteEndereco::factory()
                ->has(Endereco::factory()->count(1))
                ->count(2))
            ->count(10)
            ->create();

        IngredienteFornecedor::factory()
            ->has(Fornecedor::factory()->count(1))
            ->has(Ingrediente::factory()->count(1))
            ->count(10)
            ->create();

        IngredienteFornecedor::all()->each(function ($ingredienteFornecedor) {
            ReposicaoEstoque::factory()
                ->for($ingredienteFornecedor)
                ->count(2)
                ->create();
        });

        Prato::factory()
            ->count(10)
            ->create()
            ->each(function ($prato) {
                Ingrediente::inRandomOrder()->take(3)->get()->each(function ($ingrediente) use ($prato) {
                    PratoIngrediente::factory()->create([
                        'id_prato' => $prato->id,
                        'id_ingrediente' => $ingrediente->id,
                    ]);
                });
            });

        ClienteEndereco::all()->each(function ($clienteEndereco) {
            $encomenda = Encomenda::factory()->for($clienteEndereco)->create();

            Prato::inRandomOrder()->take(3)->get()->each(function ($prato) use ($encomenda) {
                EncomendaPrato::factory()->create([
                    'id_encomenda' => $encomenda->id,
                    'id_prato' => $prato->id,
                ]);
            });
        });
    }
}
