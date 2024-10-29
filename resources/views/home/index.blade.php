<x-layouts.app>
    <div class="home">
        <div class="home-item">
            <div class="home-item-list">

                <x-ui.status-card status="success">
                    <x-slot name="description"> As vendas do mês estão acima da média. </x-slot>
                </x-ui.status-card>

                <x-ui.status-card status="error">
                    <x-slot  name="description"> O produto X está com estoque baixo. Apenas 2 unidades restantes. </x-slot>
                </x-ui.status-card>
            </div>
        </div>

        <div class="home-item">
            <h2> Pedidos recentes </h2>

            <div class="home-item-grid">
                <x-ui.card />
            </div>
        </div>

        <form action="" style="display: flex; flex-direction: column; gap: 1rem">
            <x-form.input type="text" name="name" label="Nome" />

            <x-form.input type="email" name="email" label="E-mail" />

            <x-form.select name="category" label="Categoria" :options="$categories" />

            <button type="submit" class="button"> Enviar </button>
        </form>
</x-layouts.app>