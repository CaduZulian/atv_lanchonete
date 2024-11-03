<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Encomenda;
use App\Models\Ingrediente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Home
{
    public function index()
    {
        $encomendas = Encomenda::with(
            'clienteEndereco',
            'clienteEndereco.endereco',
            'clienteEndereco.cliente',
            'clienteEndereco.cliente.clienteTelefone',
            'encomendaPrato',
            'encomendaPrato.prato',
        )
        ->orderBy('data_encomenda', 'desc')
        ->where('data_encomenda', '>=', Carbon::now()->subDays(7))
        ->get();

        $encomendas = $encomendas->map(function ($encomenda) {
            $encomenda->valor_total = $encomenda->encomendaPrato->sum(function ($encomendaPrato) {
                return $encomendaPrato->prato->valor;
            });

            return $encomenda;
        });

        $estoqueBaixo = Ingrediente::where('quantidade_ingrediente', '<', 10)->get();

        return view('home.index', compact('encomendas', 'estoqueBaixo'));
    }
}
