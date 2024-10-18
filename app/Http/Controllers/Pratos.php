<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class Pratos extends Controller
{
    function listagem () {
        return view('pratos.listagem');
    } 

    function cadastrar() {
        return view('pratos.cadastrar');
    }
}
