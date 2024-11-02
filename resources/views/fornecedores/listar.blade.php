<x-layouts.app>
    <div class="listar-page">
        <div class="header">
            <h2> Fornecedores </h2>

            <a href="{{ route('fornecedores.cadastrar') }}" class="button">
                Cadastrar Fornecedor
            </a>
        </div>

        <x:ui.table :columns="['Nome', 'Ingredientes']">
            @foreach($fornecedores as $fornecedor)
                <tr>
                    <td>
                        {{ $fornecedor->nome_fornecedor }}
                    </td>

                    <td>
                        @foreach($fornecedor->ingredienteFornecedor as $ingredienteFornecedor)
                            {{ $ingredienteFornecedor->ingrediente->nome_ingrediente }}
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