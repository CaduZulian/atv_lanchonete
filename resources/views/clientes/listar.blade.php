<x-layouts.app>
    <div class="listar-page">
        <div class="header">
            <h2> Clientes </h2>

            <a href="{{ route('clientes.cadastrar') }}" class="button">
                Cadastrar Cliente
            </a>
        </div>

        <x:ui.table :columns="['Nome', 'Telefones', 'Endereços']">
            @foreach($clientes as $cliente)
                <tr>
                    <td>
                        {{ $cliente->nome_cliente }}
                    </td>

                    <td>
                        @foreach($cliente->clienteTelefone as $telefone)
                            {{ $telefone->telefone_cliente }}
                            @if(!$loop->last)
                                <br>
                            @endif
                        @endforeach
                    </td>

                    <td>
                        @foreach($cliente->clienteEndereco as $clienteEndereco)
                            {{ $clienteEndereco->endereco->rua . ', ' . $clienteEndereco->endereco->numero_casa . ' - ' . $clienteEndereco->endereco->bairro . ' - ' . $clienteEndereco->endereco->cidade }}
                            @if(!$loop->last)
                                <br>
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </x:ui.table>
    </div>
</x-layouts.app>