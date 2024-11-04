<?php

namespace App\Livewire\Relatorios;

use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $relatorio = 'vendas';

    public $mesAno;

    public $relatorioCompra = [];
    public $relatorioVenda = [];

    function mount() {
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
        // Lógica para gerar relatório de compra
    }

    function gerarRelatorioVenda()
    {
        // Lógica para gerar relatório de venda
    }

    public function render()
    {
        return view('livewire.relatorios.index');
    }
}
