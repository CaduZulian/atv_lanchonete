<?php

namespace App\Livewire\Fornecedores;

use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Cadastrar extends Component
{
    
        public $nome_fornecedor;
    
        // Regras de validação
        protected $rules = [
            'nome_fornecedor' => 'required|string|max:100',
        ];
    
        // Mensagens de validação
        protected $messages = [
            'nome_fornecedor.required' => 'O campo nome é obrigatório',
            'nome_fornecedor.string' => 'O campo nome deve ser um texto',
            'nome_fornecedor.max' => 'O campo nome deve ter no máximo 100 caracteres',
        ];
    
        public function salvar()
        {
            $this->validate();
    
            try {
                DB::transaction(function () {

                    $fornecedor = Fornecedor::create([
                        'nome_fornecedor' => $this->nome_fornecedor,
                    ]);

                    if (!$fornecedor) {
                        throw new \Exception("Erro ao criar o fornecedor");
                    }
                });
    
                session()->flash('message', 'Fornecedor cadastrado com sucesso!');
                $this->reset();
            } catch (\Exception $e) {
                session()->flash('error', 'Erro ao cadastrar fornecedor: ' . $e->getMessage());
            }
        }
    public function render()
    {
        return view('livewire.fornecedores.cadastrar');
    }
}
