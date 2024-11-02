<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReposicaoEstoque
{
    public function cadastrar()
    {
        return view('reposicao-estoque.cadastrar');
    }
}
