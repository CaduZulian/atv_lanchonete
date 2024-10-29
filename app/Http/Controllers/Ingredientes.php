<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Ingredientes
{
    function cadastrar () {
        return view('ingredientes.cadastrar');
    }
}
