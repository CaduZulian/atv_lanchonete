<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class Pedidos extends Controller
{
    function listagem () {
        return view('pedidos.listagem');
    } 

    function cadastrar() {
        return view('pedidos.cadastrar');
    }
}
