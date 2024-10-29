<form wire:submit.prevent="salvar" class="cadastrar-cliente">
    <h2> Cadastrar Prato </h2>

    <x-form.input type="text" name="nome_prato" label="Nome do prato" />

    <x-form.input type="number" name="valor" label="Valor" />

    <section class="cadastrar-cliente-item">
        <div class="header">
            <h3> Ingredientes </h3>
            <button type="button" wire:click="addIngrediente" class="button"> Adicionar Ingrediente </button>
        </div>

        @foreach($ingredientes as $index => $ingrediente)
        <div class="content" wire:key="ingrediente-{{ $index }}">
            <x-form.select name="ingredientes.{{ $index }}" label="Ingrediente" :options="$ingredientesOptions" />
            <button type="button" wire:click="removeIngrediente({{ $index }})" class="button button-secondary"> Remover </button>
        </div>
        @endforeach

        <x-ui.status-card status="info">
            <x-slot name="description"> Não encontrou o ingrediente que deseja? <a href="{{ route('ingredientes.cadastrar') }}" target="_blank">Clique aqui</a> para cadastrar um novo ingrediente. </x-slot>
        </x-ui.status-card>
    </section>

    <button type="submit" class="button"> Criar prato </button>

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