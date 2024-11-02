<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use App\Models\ReposicaoEstoque;
use Illuminate\Http\Request;

class Fornecedores
{
    function listar()
    {
        $fornecedores = Fornecedor::with("ingredienteFornecedor")->get();

        return view('fornecedores.listar', compact('fornecedores'));
    }

    function cadastrar()
    {
        return view('fornecedores.cadastrar');
    }
}
