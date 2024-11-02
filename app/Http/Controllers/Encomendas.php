<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Encomenda;
use Illuminate\Http\Request;

class Encomendas
{
    public function listar()
    {
        $encomendas = Encomenda::with(
            'clienteEndereco',
            'clienteEndereco.endereco',
            'clienteEndereco.cliente',
            'clienteEndereco.cliente.clienteTelefone',
            'encomendaPrato',
            'encomendaPrato.prato',
        )->orderBy('data_encomenda', 'desc')->get();

        $encomendas = $encomendas->map(function ($encomenda) {
            $encomenda->valor_total = $encomenda->encomendaPrato->sum(function ($encomendaPrato) {
                return $encomendaPrato->prato->valor;
            });

            return $encomenda;
        });

        return view('encomendas.listar', compact('encomendas'));
    }

    public function cadastrar()
    {
        return view('encomendas.cadastrar');
    }
}
