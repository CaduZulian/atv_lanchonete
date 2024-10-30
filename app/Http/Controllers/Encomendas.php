<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Encomendas
{
    public function listagem()
    {
        return view('encomendas.listagem');
    }

    public function cadastrar()
    {
        return view('encomendas.cadastrar');
    }
}
