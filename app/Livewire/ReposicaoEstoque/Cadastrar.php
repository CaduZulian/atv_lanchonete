<?php

namespace App\Livewire\ReposicaoEstoque;

use App\Models\Ingrediente;
use App\Models\IngredienteFornecedor;
use App\Models\ReposicaoEstoque;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nota_fiscal;
    public $data_compra;
    public $id_ingrediente;
    public $id_ingrediente_fornecedor;
    public $valor_ingrediente;
    public $quantidade;

    public $ingredientesOptions = [];
    public $fornecedoresOptions = [];

    // Regras de validação
    protected $rules = [
        'nota_fiscal' => 'required|string',
        'data_compra' => 'required|date',
        'id_ingrediente' => 'required|integer',
        'id_ingrediente_fornecedor' => 'required|integer',
        'valor_ingrediente' => 'required|numeric',
        'quantidade' => 'required|integer',
    ];

    // Mensagens de validação
    protected $messages = [
        'nota_fiscal.required' => 'O campo nota fiscal é obrigatório',
        'nota_fiscal.string' => 'O campo nota fiscal deve ser uma string',
        'data_compra.required' => 'O campo data da compra é obrigatório',
        'data_compra.date' => 'O campo data da compra deve ser uma data',
        'id_ingrediente.required' => 'O campo ingrediente é obrigatório',
        'id_ingrediente.integer' => 'O campo ingrediente deve ser um número inteiro',
        'id_ingrediente_fornecedor.required' => 'O campo fornecedor é obrigatório',
        'id_ingrediente_fornecedor.integer' => 'O campo fornecedor deve ser um número inteiro',
        'valor_ingrediente.required' => 'O campo valor do ingrediente é obrigatório',
        'valor_ingrediente.numeric' => 'O campo valor do ingrediente deve ser um número',
        'quantidade.required' => 'O campo quantidade é obrigatório',
        'quantidade.integer' => 'O campo quantidade deve ser um número inteiro',
    ];

    public function mount()
    {
        $this->data_compra = Carbon::now()->toDateString();
        $this->ingredientesOptions = Ingrediente::all()
            ->pluck('nome_ingrediente', 'id')
            ->map(function ($item, $key) {
                return [
                    'value' => $key,
                    'label' => $item
                ];
            })
            ->toArray();
    }

    public function atualizarFornecedores()
    {
        $this->id_ingrediente_fornecedor = null;
        $this->fornecedoresOptions = IngredienteFornecedor::with('fornecedor')
            ->where('id_ingrediente', '=', $this->id_ingrediente)
            ->get()
            ->pluck('fornecedor.nome_fornecedor', 'fornecedor.id')
            ->map(function ($item, $key) {
                return [
                    'value' => $key,
                    'label' => $item,
                ];
            })
            ->toArray();
    }

    public function salvar()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $reposicao_estoque = ReposicaoEstoque::create([
                    'nota_fiscal' => $this->nota_fiscal,
                    'data_compra' => $this->data_compra,
                    'id_ingrediente_fornecedor' => $this->id_ingrediente_fornecedor,
                    'valor_ingrediente' => $this->valor_ingrediente,
                    'quantidade' => $this->quantidade,
                ]);

                if (!$reposicao_estoque) {
                    throw new \Exception('Erro ao cadastrar a reposição de estoque');
                }
            });

            session()->flash('message', 'Reposição de estoque cadastrada com sucesso');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar a reposição de estoque');
        }
    }

    public function render()
    {
        return view('livewire.reposicao-estoque.cadastrar');
    }
}
