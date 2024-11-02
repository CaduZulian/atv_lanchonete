<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReposicaoEstoque;
use Illuminate\Http\Request;

class ReposicoesEstoque
{
    public function listar()
    {
        $reposicoesEstoque = ReposicaoEstoque::with(
            'ingredienteFornecedor',
            'ingredienteFornecedor.fornecedor',
            'ingredienteFornecedor.ingrediente',
        )->get();

        $reposicoesEstoque = $reposicoesEstoque->map(
            function ($reposicao) {
                $reposicao->valor_total = $reposicao->valor_ingrediente * $reposicao->quantidade;

                return $reposicao;
            }
        );

        return view('reposicao-estoque.listar', compact('reposicoesEstoque'));
    }

    public function cadastrar()
    {
        return view('reposicao-estoque.cadastrar');
    }
}
