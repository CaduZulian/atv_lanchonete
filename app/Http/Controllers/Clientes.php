<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Clientes
{
    function cadastrar () {
        return view('clientes.cadastrar');
    }
}
