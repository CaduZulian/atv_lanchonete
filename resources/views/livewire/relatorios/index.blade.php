<div class="listar-page">
    <div class="header">
        <h2> Relatórios </h2>

        <div style='display: flex; gap: 1rem'>
            <button class="button" wire:click="defineRelatorio('vendas')">
                Relatório de vendas
            </button>

            <button class="button" wire:click="defineRelatorio('compras')">
                Relatório de compras
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
            <h2> Relatório de venda </h2>
        </div>

        <x:ui.table :columns="['Nome', 'Preço', 'Ingredientes']">

        </x:ui.table>
    @endif

    @if ($relatorio == 'compras')
        <div class="header">
            <h2> Relatório de compra </h2>
        </div>

        <x:ui.table :columns="['Nome', 'Preço', 'Ingredientes']">

        </x:ui.table>
    @endif
</div>