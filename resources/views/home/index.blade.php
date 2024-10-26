<x-layouts.app>
    <div class="home">
        <div class="home-item">
            <div class="home-item-list">
                <x-status-card status="success" title="Vendas do mês" description="As vendas do mês estão acima da média." />
                <x-status-card status="warning" title="Estoque baixo" description="O produto X está com estoque baixo. Apenas 2 unidades restantes." />
            </div>
        </div>

        <div class="home-item">
            <h2> Pedidos recentes </h2>

            <div class="home-item-grid">
                <x-card />
            </div>
        </div>

        <form action="" style="display: flex; flex-direction: column; gap: 1rem">
            <x-form.input type="text" name="name" label="Nome" />

            <x-form.input type="email" name="email" label="E-mail" />

            <x-form.select name="category" label="Categoria" :options="$categories" />

            <button type="submit" class="button" > Enviar </button>
        </form>
</x-layouts.app>