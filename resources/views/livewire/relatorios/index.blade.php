<div class="listar-page">
    <div class="header">
        <h2> Relatórios </h2>

        <div style='display: flex; gap: 1rem'>
            <button class="button" wire:click="defineRelatorio('vendas')">
                Pratos mais pedidos
            </button>

            <button class="button" wire:click="defineRelatorio('compras')">
                Ingredientes mais comprados
            </button>
        </div>
    </div>

    <form wire:submit.prevent="filtrar" class="form">
        <x:form.input label="Mês" name="mesAno" type="month" />

        <button class="button">
            Gerar relatório
        </button>
    </form>

    @if ($relatorio == 'vendas')
        <div class="header">
            <h2> Relatório de pratos mais vendidos </h2>
        </div>

        <x:ui.table :columns="['Prato', 'Preço', 'Total vendido']">
            @foreach ($relatorioVenda as $venda)
                <tr>
                    <td> {{ $venda->nome_prato }} </td>
                    <td>
                        R$ {{ number_format($venda->valor, 2, ',', '.') }}
                    </td>
                    <td> {{ $venda->total_vendido }} </td>
                </tr>
            @endforeach
        </x:ui.table>
    @endif

    @if ($relatorio == 'compras')
        <div class="header">
            <h2> Relatório de compra </h2>
        </div>

        <x:ui.table :columns="['Ingrediente', 'Fornecedor', 'Quantidade', 'Valor total gasto']">
            @foreach ($relatorioCompra as $compra)
                <tr>
                    <td> {{ $compra->nome_ingrediente }} </td>
                    <td> {{ $compra->nome_fornecedor }} </td>
                    <td> {{ $compra->quantidade }} </td>
                    <td>
                        R$ {{ number_format($compra->valor_total, 2, ',', '.') }}
                    </td>
                </tr>
            @endforeach

        </x:ui.table>
    @endif
</div>