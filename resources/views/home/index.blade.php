<x-layouts.app>
    <div class="home">
        @if ($estoqueBaixo->count() > 0)
            <div class="home-item">
                <div class="home-item-list">
                    @foreach ($estoqueBaixo as $ingrediente)
                        <x-ui.status-card status="error">
                            <x-slot name="description"> O ingrediente {{ $ingrediente->nome_ingrediente }} está com estoque baixo.
                                Apenas {{ $ingrediente->quantidade_ingrediente }} unidades restantes. </x-slot>
                        </x-ui.status-card>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="home-item">
            <h2> Pedidos recentes </h2>

            <div class="home-item-list">
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
                                {{ $encomenda->data_encomenda }}
                            </td>
                        </tr>
                    @endforeach
                </x:ui.table>
            </div>
        </div>
    </div>
</x-layouts.app>