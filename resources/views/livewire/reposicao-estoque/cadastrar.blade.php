<form wire:submit.prevent="salvar" class="cadastrar-cliente">
    <h2> Cadastrar Reposição de Estoque </h2>

    <x-form.input type="text" name="nota_fiscal" label="Nota fiscal" />

    <x-form.input type="date" name="data_compra" label="Data da compra" />

    <x-form.select name="id_ingrediente" label="Ingrediente" :options="$ingredientesOptions" wireChange="atualizarFornecedores" />

    <x-form.select name="id_ingrediente_fornecedor" label="Fornecedor" :options="$fornecedoresOptions" />

    <x-ui.status-card status="info">
        <x-slot name="description"> Não encontrou o ingrediente ou o fornecedor que deseja? <a href="{{ route('ingredientes.cadastrar') }}"> Clique aqui para cadastrar um novo ingrediente </a> </x-slot>
    </x-ui.status-card>

    <x-form.input type="number" name="valor_ingrediente" label="Valor unitário" />

    <x-form.input type="number" name="quantidade" label="Quantidade" />

    <button type="submit" class="button"> Criar reposição de estoque </button>

    @if (session()->has('message'))
    <x-ui.status-card status="success">
        <x-slot name="description"> {{ session('message') }} </x-slot>
    </x-ui.status-card>
    @endif

    @if (session()->has('error'))
    <x-ui.status-card status="error">
        <x-slot name="description"> {{ session('error') }} </x-slot>
    </x-ui.status-card>
    @endif
</form>