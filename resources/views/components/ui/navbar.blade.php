<nav class="navbar">
  <div class="item">
    <a href="{{ route('home') }}">
      <img src="{{ asset('icons/logo.png') }}" alt="Logo" />
    </a>
  </div>

  <ul>
    <li><a href="{{ route('encomendas') }}">Pedidos</a></li>
    <li><a href="{{ route('clientes') }}">Clientes</a></li>
    <li><a href="{{ route('fornecedores') }}">Fornecedores</a></li>
    <li><a href="{{ route('ingredientes') }}">Ingredientes</a></li>
    <li><a href="{{ route('pratos') }}">Pratos</a></li>
    <li><a href="{{ route('reposicao-estoque') }}">Reposição de Estoque</a></li>
  </ul>

  <div class="item">
    <img src="{{ asset('icons/avatar.png') }}" alt="Avatar" />
  </div>
</nav>