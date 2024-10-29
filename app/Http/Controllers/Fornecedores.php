<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Fornecedores
{
    function cadastrar () {
        return view('fornecedores.cadastrar');
    }
}
