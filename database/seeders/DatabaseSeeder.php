<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Encomenda;
use App\Models\Endereco;
use App\Models\EncomendaEndereco;
use App\Models\Prato;
use App\Models\EncomendaPrato;
use App\Models\Ingrediente;
use App\Models\PratoIngrediente;
use App\Models\Fornecedor;
use App\Models\ReposicaoEstoque;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criando Clientes
        Cliente::factory(10)->create()->each(function ($cliente) {
            // Criando Encomendas para cada Cliente
            $encomenda = Encomenda::factory()->create([
                'id_clientes' => $cliente->id,
            ]);

            // Criando Endereços e associando às Encomendas
            $endereco = Endereco::factory()->create();
            EncomendaEndereco::factory()->create([
                'id_encomendas' => $encomenda->id,
                'id_enderecos' => $endereco->id,
            ]);

            // Criando Pratos e associando às Encomendas
            Prato::factory(5)->create()->each(function ($prato) use ($encomenda) {
                EncomendaPrato::factory()->create([
                    'id_encomendas' => $encomenda->id,
                    'id_pratos' => $prato->id,
                ]);

                // Criando Ingredientes e associando aos Pratos
                Ingrediente::factory(3)->create()->each(function ($ingrediente) use ($prato) {
                    PratoIngrediente::factory()->create([
                        'id_pratos' => $prato->id,
                        'id_ingredientes' => $ingrediente->id,
                    ]);
                });
            });
        });

        // Criando Fornecedores
        Fornecedor::factory(5)->create()->each(function ($fornecedor) {
            // Criando Ingredientes e associando às Reposições de Estoque
            Ingrediente::factory(3)->create()->each(function ($ingrediente) use ($fornecedor) {
                ReposicaoEstoque::factory()->create([
                    'id_fornecedores' => $fornecedor->id,
                    'id_ingredientes' => $ingrediente->id,
                ]);
            });
        });
    }
}
