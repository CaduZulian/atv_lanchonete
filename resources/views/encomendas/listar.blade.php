<x-layouts.app>
    <div class="listar-page">
        <div class="header">
            <h2> Pedidos </h2>

            <a href="{{ route('encomendas.cadastrar') }}" class="button">
                Cadastrar Pedido
            </a>
        </div>

        <x:ui.table :columns="['Cliente', 'Telefone', 'Endereço', 'Pratos', 'Valor Total', 'Data']">
            @foreach($encomendas as $encomenda)
                <tr>
                    <td>{{ $encomenda->clienteEndereco->cliente->nome_cliente }}</td>

                    <td>
                        @foreach ($encomenda->clienteEndereco->cliente->clienteTelefone as $clienteTelefone)
                            {{ $clienteTelefone->telefone_cliente }}

                            @if (!$loop->last)
                                <br>
                            @endif
                        @endforeach
                    </td>

                    <td>
                        {{ $encomenda->clienteEndereco->endereco->rua . ', ' . $encomenda->clienteEndereco->endereco->numero_casa . ' - ' . $encomenda->clienteEndereco->endereco->bairro . ' - ' . $encomenda->clienteEndereco->endereco->cidade }}
                    </td>

                    <td>
                        @foreach ($encomenda->encomendaPrato as $encomendaPrato)
                            {{ $encomendaPrato->prato->nome_prato }} ({{ $encomendaPrato->quantidade }})

                            @if (!$loop->last)
                                <br>
                            @endif
                        @endforeach
                    </td>

                    <td>
                        R$ {{ number_format($encomenda->valor_total, 2, ',', '.') }}
                    </td>

                    <td>
                        {{ $encomenda->created_at->format('d/m/Y H:i') }}
                    </td>
                </tr>
            @endforeach
        </x:ui.table>
    </div>
</x-layouts.app>