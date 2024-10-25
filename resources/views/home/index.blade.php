<x-layouts.app>
    <div class="home">
        <div class="home-item">
            <div class="home-item-list">
                <livewire:status-card status="success" title="Vendas do mês" description="As vendas do mês estão acima da média." />
                <livewire:status-card status="warning" title="Estoque baixo" description="O produto X está com estoque baixo. Apenas 2 unidades restantes." />
            </div>
        </div>

        <div class="home-item">
            <h2> Pedidos recentes </h2>

            <div class="home-item-grid">
                <livewire:card />
            </div>
        </div>

        <form action="" style="display: flex; flex-direction: column; gap: 1rem">
            <livewire:input type="text" name="name" label="Nome" />

            <livewire:input type="email" name="email" label="E-mail" />

            <livewire:select name="category" label="Categoria" :options="$categories" />
            <button type="submit" class="button" > Enviar </button>

        </form>
</x-layouts.app>