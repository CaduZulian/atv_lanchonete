<form wire:submit.prevent="salvar" class="cadastrar-cliente">
    <h2> Cadastrar Cliente </h2>

    <x-form.input type="text" name="nome_cliente" label="Nome do cliente" />

    <section class="cadastrar-cliente-item">
        <div class="header">
            <h3> Contatos </h3>
            <button type="button" wire:click="addTelefone" class="button"> Adicionar Telefone </button>
        </div>

        @foreach($telefones as $index => $telefone)
        <div class="content" wire:key="telefone-{{ $index }}">
            <x-form.input type="text" name="telefones.{{ $index }}" placeholder="Telefone" label="Telefone" />
            <button type="button" wire:click="removeTelefone({{ $index }})" class="button button-secondary"> Remover </button>
        </div>
        @endforeach
    </section>

    <section class="cadastrar-cliente-item">
        <div class="header">
            <h3> Endereços </h3>
            <button type="button" wire:click="addEndereco" class="button"> Adicionar Endereço </button>
        </div>

        @foreach($enderecos as $index => $endereco)
        <div class="content" wire:key="endereco-{{ $index }}">
            <x-form.input type="text" name="enderecos.{{ $index }}.rua" placeholder="Rua" label="Rua" />
            <x-form.input type="number" name="enderecos.{{ $index }}.numero_casa" placeholder="Número" label="Número" />
            <x-form.input type="text" name="enderecos.{{ $index }}.bairro" placeholder="Bairro" label="Bairro" />
            <x-form.input type="text" name="enderecos.{{ $index }}.cidade" placeholder="Cidade" label="Cidade" />
            <button type="button" wire:click="removeEndereco({{ $index }})" class="button button-secondary"> Remover </button>
        </div>
        @endforeach
    </section>

    <button type="submit" class="button"> Criar cliente </button>

    @if (session()->has('message'))
    <x-status-card status="success" title="Sucesso" description="{{ session('message') }}" />
    @endif

    @if (session()->has('error'))
    <x-status-card status="error" title="Erro" description="{{ session('error') }}" />
    @endif
</form>