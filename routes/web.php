<?php

use App\Http\Controllers\Clientes;
use App\Http\Controllers\Fornecedores;
use App\Http\Controllers\Ingredientes;
use App\Http\Controllers\Encomendas;
use App\Http\Controllers\Pratos;
use App\Http\Controllers\ReposicoesEstoque;
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

Route::get('/pedidos', [Encomendas::class, 'listar'])->name('encomendas');
Route::get('/pedidos/cadastrar', [Encomendas::class, 'cadastrar'])->name('encomendas.cadastrar');

Route::get('/clientes', [Clientes::class, 'listar'])->name('clientes');
Route::get('/clientes/cadastrar', [Clientes::class, 'cadastrar'])->name('clientes.cadastrar');

Route::get('/fornecedores', [Fornecedores::class, 'listar'])->name('fornecedores');
Route::get('/fornecedores/cadastrar', [Fornecedores::class, 'cadastrar'])->name('fornecedores.cadastrar');

Route::get('/ingredientes', [Ingredientes::class, 'listar'])->name('ingredientes');
Route::get('/ingredientes/cadastrar', [Ingredientes::class, 'cadastrar'])->name('ingredientes.cadastrar');

Route::get('/pratos', [Pratos::class, 'listar'])->name('pratos');
Route::get('/pratos/cadastrar', [Pratos::class, 'cadastrar'])->name('pratos.cadastrar');

Route::get('/reposicao-estoque', [ReposicoesEstoque::class, 'listar'])->name('reposicao-estoque');
Route::get('/reposicao-estoque/cadastrar', [ReposicoesEstoque::class, 'cadastrar'])->name('reposicao-estoque.cadastrar');
