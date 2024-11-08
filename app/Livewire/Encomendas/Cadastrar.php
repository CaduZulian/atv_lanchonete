<?php

namespace App\Livewire\Encomendas;

use App\Models\Cliente;
use App\Models\Encomenda;
use App\Models\EncomendaPrato;
use App\Models\Ingrediente;
use App\Models\Prato;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cadastrar extends Component
{
    public $id_cliente;
    public $id_cliente_endereco;
    public $data_encomenda;
    public $encomenda_prato = [
        [
            'id_prato' => '',
            'quantidade' => ''
        ]
    ];

    public $clientesOptions = [];
    public $enderecosOptions = [];
    public $pratosOptions = [];

    // Regras de validação
    protected $rules = [
        'id_cliente' => 'required|integer',
        'id_cliente_endereco' => 'required|integer',
        'data_encomenda' => 'required|date',
        'encomenda_prato.*.id_prato' => 'required|integer',
        'encomenda_prato.*.quantidade' => 'required|integer',
    ];

    // Mensagens de validação
    protected $messages = [
        'id_cliente.required' => 'O campo cliente é obrigatório',
        'id_cliente.integer' => 'O campo cliente deve ser um número inteiro',
        'id_cliente_endereco.required' => 'O campo endereço é obrigatório',
        'id_cliente_endereco.integer' => 'O campo endereço deve ser um número inteiro',
        'data_encomenda.required' => 'O campo data da encomenda é obrigatório',
        'data_encomenda.date' => 'O campo data da encomenda deve ser uma data',
        'encomenda_prato.*.id_prato.required' => 'O campo prato é obrigatório',
        'encomenda_prato.*.id_prato.integer' => 'O campo prato deve ser um número inteiro',
        'encomenda_prato.*.quantidade.required' => 'O campo quantidade é obrigatório',
        'encomenda_prato.*.quantidade.integer' => 'O campo quantidade deve ser um número inteiro',
    ];

    public function mount()
    {
        $this->data_encomenda = Carbon::now()->toDateString();
        $this->clientesOptions = Cliente::all()
            ->pluck('nome_cliente', 'id')
            ->map(function ($item, $key) {
                return [
                    'value' => $key,
                    'label' => $item
                ];
            })
            ->toArray();
        $this->pratosOptions = Prato::all()
            ->pluck('nome_prato', 'id')
            ->map(function ($item, $key) {
                return [
                    'value' => $key,
                    'label' => $item
                ];
            })
            ->toArray();
    }

    public function atualizarEnderecos()
    {
        $this->id_cliente_endereco = null;
        $this->enderecosOptions = Cliente::find($this->id_cliente)
            ->clienteEndereco
            ->pluck('endereco', 'id')
            ->map(function ($item, $key) {
                return [
                    'value' => $key,
                    'label' => $item->rua . ', ' . $item->numero_casa . ' - ' . $item->bairro . ' - ' . $item->cidade
                ];
            })
            ->toArray();
    }

    public function addEncomendaPrato()
    {
        $this->encomenda_prato[] = [
            'id_prato' => '',
            'quantidade' => ''
        ];
    }

    public function removeEncomendaPrato($index)
    {
        unset($this->encomenda_prato[$index]);
        $this->encomenda_prato = array_values($this->encomenda_prato);
    }

    public function salvar()
    {
        $this->validate();

        try {
            $pratos_quantidade_invalida = Ingrediente::select('pratos_ingredientes.id_prato', 'quantidade_ingrediente')
                ->join('pratos_ingredientes', 'ingredientes.id', '=', 'pratos_ingredientes.id_ingrediente')
                ->whereIn('pratos_ingredientes.id_prato', array_column($this->encomenda_prato, 'id_prato'))
                ->where('quantidade_ingrediente', '<', array_column($this->encomenda_prato, 'quantidade'))
                ->get();

            if ($pratos_quantidade_invalida->count() > 0) {
                throw new \Exception('Existem pratos com quantidade de ingredientes insuficiente');
            }

            DB::transaction(function () {
                $encomenda = Encomenda::create([
                    'id_cliente_endereco' => $this->id_cliente_endereco,
                    'data_encomenda' => $this->data_encomenda,
                ]);

                if (!$encomenda) {
                    throw new \Exception('Erro ao cadastrar a encomenda');
                }

                foreach ($this->encomenda_prato as $prato) {
                    $encomenda_prato = EncomendaPrato::create([
                        'id_encomenda' => $encomenda->id,
                        'id_prato' => $prato['id_prato'],
                        'quantidade' => $prato['quantidade'],
                    ]);

                    if (!$encomenda_prato) {
                        throw new \Exception('Erro ao cadastrar o prato da encomenda');
                    }
                }
            });

            session()->flash('message', 'Encomenda cadastrada com sucesso');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar a encomenda: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.encomendas.cadastrar');
    }
}
