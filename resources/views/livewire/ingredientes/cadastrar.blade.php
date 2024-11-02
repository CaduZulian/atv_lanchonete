<form wire:submit.prevent="salvar" class="cadastrar-page">
    <h2> Cadastrar Ingrediente </h2>

    <x-form.input type="text" name="nome_ingrediente" label="Nome do ingrediente" />

    <x-form.input type="number" name="quantidade_ingrediente" label="Quantidade" />

    <section class="cadastrar-page-item">
        <div class="header">
            <h3> Fornecedores </h3>
            <button type="button" wire:click="addFornecedor" class="button"> Adicionar Fornecedor </button>
        </div>

        @foreach($fornecedores as $index => $fornecedor)
        <div class="content" wire:key="fornecedor-{{ $index }}">
            <x-form.select name="fornecedores.{{ $index }}" label="Fornecedor" :options="$fornecedoresOptions" />
            <button type="button" wire:click="removeFornecedor({{ $index }})" class="button button-secondary"> Remover </button>
        </div>
        @endforeach

        <x-ui.status-card status="info">
            <x-slot name="description"> Não encontrou o fornecedor que deseja? <a href="{{ route('fornecedores.cadastrar') }}" target="_blank">Clique aqui</a> para cadastrar um novo fornecedor. </x-slot>
        </x-ui.status-card>
    </section>

    <button type="submit" class="button"> Criar ingrediente </button>

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