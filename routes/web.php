<?php

use App\Http\Controllers\Clientes;
use App\Http\Controllers\Pedidos;
use App\Http\Controllers\Pratos;

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

Route::get('/pedidos/listagem', [Pedidos::class, 'listagem'])->name('pedidos.listagem');
Route::get('/pedidos/cadastrar', [Pedidos::class, 'cadastrar'])->name('pedidos.cadastrar');

Route::get('/pratos/listagem', [Pratos::class, 'listagem'])->name('pratos.listagem');
Route::get('/pratos/cadastrar', [Pratos::class, 'cadastrar'])->name('pratos.cadastrar');

Route::get('/clientes/cadastrar', [Clientes::class, 'cadastrar'])->name('clientes.cadastrar');
