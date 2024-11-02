<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ingrediente;
use Illuminate\Http\Request;

class Ingredientes
{
    function listar() {
        $ingredientes = Ingrediente::all();

        return view('ingredientes.listar', compact('ingredientes'));
    }

    function cadastrar () {
        return view('ingredientes.cadastrar');
    }
}
