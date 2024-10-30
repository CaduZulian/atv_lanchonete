<?php

namespace App\Livewire\Ingredientes;

use App\Models\Fornecedor;
use App\Models\Ingrediente;
use App\Models\IngredienteFornecedor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nome_ingrediente;
    public $quantidade_ingrediente;
    public $fornecedores = [''];

    public $fornecedoresOptions = [];

    public function mount()
    {
        $this->fornecedoresOptions = Fornecedor::all()
            ->pluck('nome_fornecedor', 'id')
            ->map(function ($item, $key) {
                return [
                    'value' => $key,
                    'label' => $item
                ];
            })
            ->toArray();
    }

    // Regras de validação
    protected $rules = [
        'nome_ingrediente' => 'required|string|max:100',
        'quantidade_ingrediente' => 'required|integer',
        'fornecedores.*' => 'required|integer'
    ];

    // Mensagens de validação
    protected $messages = [
        'nome_ingrediente.required' => 'O campo nome é obrigatório',
        'nome_ingrediente.string' => 'O campo nome deve ser um texto',
        'nome_ingrediente.max' => 'O campo nome deve ter no máximo 100 caracteres',
        'quantidade_ingrediente.required' => 'O campo quantidade é obrigatório',
        'quantidade_ingrediente.integer' => 'O campo quantidade deve ser um número inteiro',
        'fornecedores.*.required' => 'O campo fornecedor é obrigatório',
        'fornecedores.*.integer' => 'O campo fornecedor deve ser um número inteiro',
    ];

    public function addFornecedor()
    {
        $this->fornecedores[] = '';
    }

    public function removeFornecedor($index)
    {
        unset($this->fornecedores[$index]);
    }

    public function salvar()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $ingrediente = Ingrediente::create([
                    'nome_ingrediente' => $this->nome_ingrediente,
                    'quantidade_ingrediente' => $this->quantidade_ingrediente,
                ]);

                if (!$ingrediente) {
                    throw new \Exception("Erro ao criar o ingrediente");
                }

                foreach ($this->fornecedores as $fornecedor) {
                    $ingredienteFornecedor = IngredienteFornecedor::create([
                        'id_ingrediente' => $ingrediente->id,
                        'id_fornecedor' => $fornecedor
                    ]);

                    if (!$ingredienteFornecedor) {
                        throw new \Exception("Erro ao associar fornecedores ao ingrediente");
                    }
                }
                
                if (!$ingrediente) {
                    throw new \Exception("Erro ao associar fornecedores ao ingrediente");
                }
            });

            session()->flash('message', 'Ingrediente cadastrado com sucesso!');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar ingrediente: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.ingredientes.cadastrar');
    }
}
