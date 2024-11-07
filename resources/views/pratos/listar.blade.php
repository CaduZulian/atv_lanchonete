<x-layouts.app>
    <div class="listar-page">
        <div class="header">
            <h2> Pratos </h2>

            <a href="{{ route('pratos.cadastrar') }}" class="button">
                Cadastrar Prato
            </a>
        </div>

        <x:ui.table :columns="['Nome', 'Preço', 'Ingredientes']">
            @foreach($pratos as $prato)
                <tr>
                    <td>
                        {{ $prato->nome_prato }}
                    </td>

                    <td>
                        R$ {{ number_format($prato->valor, 2, ',', '.') }}
                    </td>

                    <td>
                        @foreach($prato->pratoIngrediente as $pratoIngrediente)
                            {{ $pratoIngrediente->ingrediente->nome_ingrediente }}

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