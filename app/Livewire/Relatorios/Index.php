<?php

namespace App\Livewire\Relatorios;

use App\Models\Encomenda;
use App\Models\EncomendaPrato;
use App\Models\ReposicaoEstoque;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Livewire\Component;

class Index extends Component
{
    public $relatorio = 'vendas';

    public $mesAno;

    public $relatorioCompra = [];
    public $relatorioVenda = [];

    function mount()
    {
        $this->mesAno = Carbon::now()->format('Y-m');
    }

    public function defineRelatorio($relatorio)
    {
        $this->relatorio = $relatorio;
    }

    public function filtrar()
    {
        switch ($this->relatorio) {
            case 'compras':
                $this->gerarRelatorioCompra();
                break;

            case 'vendas':
                $this->gerarRelatorioVenda();
                break;

            default:
                break;
        }
    }

    function gerarRelatorioCompra()
    {
        $this->relatorioCompra = ReposicaoEstoque::select('ingredientes.nome_ingrediente', 'fornecedores.nome_fornecedor', 'quantidade', DB::raw('SUM(valor_ingrediente * quantidade) as valor_total'))
            ->join('ingredientes_fornecedores', 'reposicao_estoque.id_ingrediente_fornecedor', '=', 'ingredientes_fornecedores.id')
            ->join('ingredientes', 'ingredientes_fornecedores.id_ingrediente', '=', 'ingredientes.id')
            ->join('fornecedores', 'ingredientes_fornecedores.id_fornecedor', '=', 'fornecedores.id')
            ->whereYear('data_compra', explode('-', $this->mesAno)[0])
            ->whereMonth('data_compra', explode('-', $this->mesAno)[1])
            ->groupBy('ingredientes.nome_ingrediente')
            ->groupBy('fornecedores.nome_fornecedor')
            ->groupBy('quantidade')
            ->orderByDesc('valor_total')
            ->get();
    }

    function gerarRelatorioVenda()
    {
        $this->relatorioVenda = Encomenda::select('pratos.nome_prato', 'pratos.valor', DB::raw('SUM(encomendas_prato.quantidade) as total_vendido'))
            ->join('encomendas_prato', 'encomendas.id', '=', 'encomendas_prato.id_encomenda')
            ->join('pratos', 'encomendas_prato.id_prato', '=', 'pratos.id')
            ->whereYear('data_encomenda', explode('-', $this->mesAno)[0])
            ->whereMonth('data_encomenda', explode('-', $this->mesAno)[1])
            ->groupBy('pratos.nome_prato')
            ->groupBy('pratos.valor')
            ->orderByDesc('total_vendido')
            ->get();
    }

    public function render()
    {
        $this->gerarRelatorioVenda();

        return view('livewire.relatorios.index');
    }
}
