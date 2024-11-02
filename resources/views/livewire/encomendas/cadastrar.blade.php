<form wire:submit.prevent="salvar" class="cadastrar-page">
    <h2> Cadastrar pedido </h2>

    <x-form.select name="id_cliente" label="Cliente" :options="$clientesOptions" wireChange="atualizarEnderecos" />

    <x-form.select name="id_cliente_endereco" label="Endereço de entrega" :options="$enderecosOptions" />

    <x-ui.status-card status="info">
        <x-slot name="description"> Não encontrou o cliente ou o endereço que deseja? <a href="{{ route('clientes.cadastrar') }}"> Cadastre um novo cliente </a> </x-slot>
    </x-ui.status-card>

    <x-form.input type="date" name="data_encomenda" label="Data do pedido" />

    <section class="cadastrar-page-item">
        <div class="header">
            <h3> Itens do pedido </h3>
            <button type="button" wire:click="addEncomendaPrato" class="button"> Adicionar item </button>
        </div>

        @foreach($encomenda_prato as $index => $prato)
        <div class="content" wire:key="encomendas_prato-{{ $index }}">
            <x-form.select name="encomenda_prato.{{ $index }}.id_prato" label="Prato" :options="$pratosOptions" />

            <x-form.input type="number" name="encomenda_prato.{{ $index }}.quantidade" label="Quantidade" />

            <button type="button" wire:click="removeEncomendaPrato({{ $index }})" class="button button-secondary"> Remover </button>
        </div>
        @endforeach

        <x-ui.status-card status="info">
            <x-slot name="description"> Não encontrou o prato que deseja? <a href="{{ route('pratos.cadastrar') }}"> Cadastre um novo prato </a> </x-slot>
        </x-ui.status-card>
    </section>

    <button type="submit" class="button"> Criar pedido </button>

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