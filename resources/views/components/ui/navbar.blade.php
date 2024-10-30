<nav class="navbar">
  <div class="item">
    <a href="{{ route('home') }}">
      <img src="{{ asset('icons/logo.png') }}" alt="Logo" />
    </a>
  </div>

  <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('clientes.cadastrar') }}">Cadastrar clientes</a></li>
    <li><a href="{{ route('fornecedores.cadastrar') }}">Cadastrar fornecedores</a></li>
    <li><a href="{{ route('ingredientes.cadastrar') }}">Cadastrar ingredientes</a></li>
    <li><a href="{{ route('encomendas.cadastrar') }}">Cadastrar pedidos</a></li>
  </ul>

  <div class="item">
    <img src="https://avatar.iran.liara.run/public" alt="Avatar" />
  </div>
</nav>