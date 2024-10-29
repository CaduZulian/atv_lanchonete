<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use App\Models\ClienteEndereco;
use App\Models\ClienteTelefone;
use App\Models\Endereco;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Cadastrar extends Component
{
    public $nome_cliente;
    public $telefones = [''];
    public $enderecos = [
        [
            'rua' => '',
            'bairro' => '',
            'numero_casa' => '',
            'cidade' => ''
        ]
    ];

    // Regras de validação
    protected $rules = [
        'nome_cliente' => 'required|string|max:50',
        'telefones.*' => 'required|string|max:30',
        'enderecos.*.rua' => 'required|string|max:100',
        'enderecos.*.bairro' => 'required|string|max:30',
        'enderecos.*.numero_casa' => 'required|integer',
        'enderecos.*.cidade' => 'required|string|max:100',
    ];

    // Mensagens de validação
    protected $messages = [
        'nome_cliente.required' => 'O campo nome é obrigatório',
        'nome_cliente.string' => 'O campo nome deve ser um texto',
        'nome_cliente.max' => 'O campo nome deve ter no máximo 50 caracteres',
        'telefones.*.required' => 'O campo telefone é obrigatório',
        'telefones.*.string' => 'O campo telefone deve ser um texto',
        'telefones.*.max' => 'O campo telefone deve ter no máximo 30 caracteres',
        'enderecos.*.rua.required' => 'O campo rua é obrigatório',
        'enderecos.*.rua.string' => 'O campo rua deve ser um texto',
        'enderecos.*.rua.max' => 'O campo rua deve ter no máximo 100 caracteres',
        'enderecos.*.bairro.required' => 'O campo bairro é obrigatório',
        'enderecos.*.bairro.string' => 'O campo bairro deve ser um texto',
        'enderecos.*.bairro.max' => 'O campo bairro deve ter no máximo 30 caracteres',
        'enderecos.*.numero_casa.required' => 'O campo número da casa é obrigatório',
        'enderecos.*.numero_casa.integer' => 'O campo número da casa deve ser um número inteiro',
        'enderecos.*.cidade.required' => 'O campo cidade é obrigatório',
        'enderecos.*.cidade.string' => 'O campo cidade deve ser um texto',
        'enderecos.*.cidade.max' => 'O campo cidade deve ter no máximo 100 caracteres',
    ];

    public function addTelefone()
    {
        $this->telefones[] = '';
    }

    public function addEndereco()
    {
        $this->enderecos[] = [
            'rua' => '',
            'bairro' => '',
            'numero_casa' => '',
            'cidade' => ''
        ];
    }

    public function removeTelefone($index)
    {
        unset($this->telefones[$index]);
        $this->telefones = array_values($this->telefones);
    }

    public function removeEndereco($index)
    {
        unset($this->enderecos[$index]);
        $this->enderecos = array_values($this->enderecos);
    }

    public function salvar()
    {
        $this->validate();

        try {
            DB::transaction(function () {

                $cliente = Cliente::create([
                    'nome_cliente' => $this->nome_cliente
                ]);

                if (!$cliente) {
                    throw new \Exception("Erro ao criar o cliente");
                }

                foreach ($this->telefones as $telefone) {
                    $telefoneCriado = ClienteTelefone::create([
                        'id_cliente' => $cliente->id,
                        'telefone_cliente' => $telefone
                    ]);

                    if (!$telefoneCriado) {
                        throw new \Exception("Erro ao criar o telefone: $telefone");
                    }
                }

                foreach ($this->enderecos as $endereco) {
                    $novoEndereco = Endereco::create($endereco);

                    if (!$novoEndereco) {
                        throw new \Exception("Erro ao criar o endereço: " . json_encode($endereco));
                    }

                    $clienteEndereco = ClienteEndereco::create([
                        'id_cliente' => $cliente->id,
                        'id_endereco' => $novoEndereco->id
                    ]);

                    if (!$clienteEndereco) {
                        throw new \Exception("Erro ao criar o relacionamento cliente-endereço");
                    }
                }
            });

            session()->flash('message', 'Cliente cadastrado com sucesso!');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar cliente: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.clientes.cadastrar');
    }
}
