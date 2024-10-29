<?php

namespace App\Livewire\Pratos;

use App\Models\Ingrediente;
use App\Models\Prato;
use App\Models\PratoIngrediente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nome_prato;
    public $valor;
    public $ingredientes = [''];

    public $ingredientesOptions = [];

    public function mount()
    {
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

    // Regras de validação
    protected $rules = [
        'nome_prato' => 'required|string|max:100',
        'valor' => 'required|numeric',
        'ingredientes.*' => 'required|integer'
    ];

    // Mensagens de validação
    protected $messages = [
        'nome_prato.required' => 'O campo nome é obrigatório',
        'nome_prato.string' => 'O campo nome deve ser um texto',
        'nome_prato.max' => 'O campo nome deve ter no máximo 100 caracteres',
        'valor.required' => 'O campo preço é obrigatório',
        'valor.numeric' => 'O campo preço deve ser um número',
        'ingredientes.*.required' => 'O campo ingrediente é obrigatório',
        'ingredientes.*.integer' => 'O campo ingrediente deve ser um número inteiro',
    ];

    public function addIngrediente()
    {
        $this->ingredientes[] = '';
    }

    public function removeIngrediente($index)
    {
        unset($this->ingredientes[$index]);
    }

    public function salvar()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $prato = Prato::create([
                    'nome_prato' => $this->nome_prato,
                    'valor' => str_replace(',', '.', $this->valor)
                ]);

                if (!$prato) {
                    throw new \Exception("Erro ao criar o prato");
                }

                foreach ($this->ingredientes as $ingrediente) {
                    $ingrediente = PratoIngrediente::create([
                        'id_prato' => $prato->id,
                        'id_ingrediente' => $ingrediente
                    ]);

                    if (!$ingrediente) {
                        throw new \Exception("Erro ao associar ingrediente ao prato");
                    }
                }
                
                if (!$prato) {
                    throw new \Exception("Erro ao associar ingredientes ao prato");
                }
            });

            session()->flash('message', 'Prato cadastrado com sucesso!');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao cadastrar prato: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pratos.cadastrar');
    }
}
