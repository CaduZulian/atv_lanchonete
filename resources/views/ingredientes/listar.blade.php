<x-layouts.app>
    <div class="listar-page">
        <div class="header">
            <h2> Ingredientes </h2>

            <a href="{{ route('ingredientes.cadastrar') }}" class="button">
                Cadastrar Ingrediente
            </a>
        </div>

        <x:ui.table :columns="['Nome', 'Quantidade']">
            @foreach($ingredientes as $ingrediente)
                <tr>
                    <td>
                        {{ $ingrediente->nome_ingrediente }}
                    </td>

                    <td>
                        {{ $ingrediente->quantidade_ingrediente }}
                    </td>
                </tr>
            @endforeach
        </x:ui.table>
    </div>
</x-layouts.app>