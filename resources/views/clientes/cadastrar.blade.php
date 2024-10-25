<x-layouts.app>
    <form wire:submit="salvarCliente" class="cadastrar-cliente">
        <livewire:input type="text" name="name" label="Nome do cliente" />

        <section class="cadastrar-cliente-item">
            <div class="header">
                <h2> Contato </h2>

                <button type="button" wire:click="addContact" class="button"> Adicionar contato </button>
            </div>

            @foreach($telefones as $index => $telefone)
                <div style="display: flex; gap: 1rem">
                    <livewire:input type="text" name="telefones.{{ $index }}.phone" label="Telefone" />

                    <button type="button" wire:click="telefones({{ $index }})"> Remover </button>
                </div>
            @endforeach
        </section>

        <section>
            <div>
                <h2> Endereço </h2>

                <button type="button" wire:click="addAddress"> Adicionar endereço </button>
            </div>

            <livewire:input type="text" name="street" label="Rua" />

            <livewire:input type="text" name="number" label="Número" />

            <livewire:input type="text" name="neighborhood" label="Bairro" />

            <livewire:input type="text" name="city" label="Cidade" />

            <livewire:input type="text" name="state" label="Estado" />
        </section>

        <button type="submit" class="button" > Criar cliente </button>
    </form>
</x-layouts.app>
