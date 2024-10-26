<nav class="navbar">
  <div class="item">
    <a href="{{ route('home') }}">
      <img src="{{ asset('icons/logo.png') }}" alt="Logo" />
    </a>
  </div>

  <ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('pedidos.listagem') }}">Listar pedidos</a></li>
    <li><a href="{{ route('pratos.listagem') }}">Listar pratos</a></li>
    <li><a href="{{ route('clientes.cadastrar') }}">Cadastrar clientes</a></li>
  </ul>

  <div class="item">
    <img src="https://avatar.iran.liara.run/public" alt="Avatar" />
  </div>
</nav>