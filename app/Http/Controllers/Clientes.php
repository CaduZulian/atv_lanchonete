<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class Clientes
{
    function listar()
    {
        // pegar a lista de clientes com seus telefones e endereços
        $clientes = Cliente::with(
            'clienteTelefone',
            'clienteEndereco',
            'clienteEndereco.endereco'
        )->get();

        return view('clientes.listar', compact('clientes'));
    }

    function cadastrar()
    {
        return view('clientes.cadastrar');
    }
}
