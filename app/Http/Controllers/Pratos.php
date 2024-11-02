<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Routing\Controller;

class Pratos extends Controller
{
    function listar() {
        $pratos = Prato::with('pratoIngrediente', 'pratoIngrediente.ingrediente')->get();

        return view('pratos.listar', compact('pratos'));
    }

    function cadastrar() {
        return view('pratos.cadastrar');
    }
}
