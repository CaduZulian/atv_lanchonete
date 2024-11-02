<form wire:submit.prevent="salvar" class="cadastrar-page">
    <h2> Cadastrar Fornecedor </h2>

    <x-form.input type="text" name="nome_fornecedor" label="Nome do fornecedor" />

    <button type="submit" class="button"> Criar fornecedor </button>

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