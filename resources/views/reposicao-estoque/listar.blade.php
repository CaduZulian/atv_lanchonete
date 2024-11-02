<x-layouts.app>
    <div class="listar-page">
        <div class="header">
            <h2> Reposição de Estoque </h2>

            <a href="{{ route('reposicao-estoque.cadastrar') }}" class="button">
                Cadastrar Reposição de Estoque
            </a>
        </div>

        <x:ui.table :columns="['Nota Fiscal', 'Data', 'Fornecedor', 'Ingredientes', 'Quantidade', 'Valor unitário', 'Valor total']">
            @foreach($reposicoesEstoque as $reposicaoEstoque)
                <tr>
                    <td>
                        {{ $reposicaoEstoque->nota_fiscal }}
                    </td>

                    <td>
                        {{ $reposicaoEstoque->data_compra }}
                    </td>

                    <td>
                        {{ $reposicaoEstoque->ingredienteFornecedor->fornecedor->nome_fornecedor }}
                    </td>

                    <td>
                        {{ $reposicaoEstoque->ingredienteFornecedor->ingrediente->nome_ingrediente }}
                    </td>

                    <td>
                        {{ $reposicaoEstoque->quantidade }}
                    </td>

                    <td>
                        R$ {{ number_format($reposicaoEstoque->valor_ingrediente, 2, ',', '.') }}
                    </td>

                    <td>
                        R$ {{ number_format($reposicaoEstoque->valor_total, 2, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </x:ui.table>
    </div>
</x-layouts.app>