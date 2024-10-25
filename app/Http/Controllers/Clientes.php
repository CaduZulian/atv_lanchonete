<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class Clientes
{
    function cadastrar () {
        $cliente = ['nome' => ''];
        $telefones = [
            ['numero' => '']
        ];
        $enderecos = [
            ['rua' => '', 'numero' => '', 'bairro' => '', 'cidade' => '', 'estado' => '']
        ];

        function adicionarTelefone () {
            $telefones[] = ['numero' => ''];
        }

        function adicionarEndereco () {
            $enderecos[] = ['rua' => '', 'numero' => '', 'bairro' => '', 'cidade' => '', 'estado' => ''];
        }

        function salvarCliente ($cliente, $telefones, $enderecos) {
            // Salvar cliente
            // Salvar telefones
            // Salvar endereços
            alert('Cliente salvo com sucesso!');
        }

        return view('clientes.cadastrar', compact('cliente', 'telefones', 'enderecos'));
    }
}
