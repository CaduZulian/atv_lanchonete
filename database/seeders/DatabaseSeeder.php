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
        // Clientes com telefones e endereços
        Cliente::factory()
            ->has(ClienteTelefone::factory()->count(2))  // 2 telefones por cliente
            ->has(ClienteEndereco::factory()->count(1))  // 1 endereço por cliente
            ->count(10)  // Criar 10 clientes
            ->create();

        // Endereços adicionais
        Endereco::factory()->count(5)->create();

        // Pratos
        Prato::factory()
            ->has(PratoIngrediente::factory()->count(3)) // 3 ingredientes por prato
            ->count(5) // Criar 5 pratos
            ->create();

        // Ingredientes
        Ingrediente::factory()->count(10)->create();

        // Fornecedores com ingredientes
        Fornecedor::factory()
            ->has(IngredienteFornecedor::factory()->count(2)) // 2 ingredientes por fornecedor
            ->count(5)  // Criar 5 fornecedores
            ->create();

        // Encomendas e pratos por encomenda
        Encomenda::factory()
            ->has(EncomendaPrato::factory()->count(3)) // 3 pratos por encomenda
            ->count(10) // Criar 10 encomendas
            ->create();

        // Reposição de estoque
        ReposicaoEstoque::factory()->count(15)->create();
    }
}
