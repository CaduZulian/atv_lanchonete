<?php

use App\Http\Controllers\Clientes;
use App\Http\Controllers\Fornecedores;
use App\Http\Controllers\Ingredientes;
use App\Http\Controllers\Encomendas;
use App\Http\Controllers\Pratos;
use App\Http\Controllers\ReposicaoEstoque;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // categories é uma lista de label e value
    $categories = [
        ['label' => 'Bebidas', 'value' => 'bebidas'],
        ['label' => 'Carnes', 'value' => 'carnes'],
        ['label' => 'Massas', 'value' => 'massas'],
        ['label' => 'Sobremesas', 'value' => 'sobremesas'],
    ];

    return view('home.index', compact('categories'));
})->name('home');

Route::get('/pedidos/listagem', [Encomendas::class, 'listagem'])->name('encomendas.listagem');
Route::get('/pedidos/cadastrar', [Encomendas::class, 'cadastrar'])->name('encomendas.cadastrar');

Route::get('/pratos/listagem', [Pratos::class, 'listagem'])->name('pratos.listagem');
Route::get('/pratos/cadastrar', [Pratos::class, 'cadastrar'])->name('pratos.cadastrar');

Route::get('/clientes/cadastrar', [Clientes::class, 'cadastrar'])->name('clientes.cadastrar');
Route::get('/clientes/listagem', [Clientes::class, 'listagem'])->name('clientes.listagem');

Route::get('/fornecedores/cadastrar', [Fornecedores::class, 'cadastrar'])->name('fornecedores.cadastrar');
Route::get('/fornecedores/listagem', [Fornecedores::class, 'listagem'])->name('fornecedores.listagem');

Route::get('/ingredientes/cadastrar', [Ingredientes::class, 'cadastrar'])->name('ingredientes.cadastrar');
Route::get('/ingredientes/listagem', [Ingredientes::class, 'listagem'])->name('ingredientes.listagem');

Route::get('/pratos/cadastrar', [Pratos::class, 'cadastrar'])->name('pratos.cadastrar');
Route::get('/pratos/listagem', [Pratos::class, 'listagem'])->name('pratos.listagem');

Route::get('/reposicao-estoque/cadastrar', [ReposicaoEstoque::class, 'cadastrar'])->name('reposicao-estoque.cadastrar');
