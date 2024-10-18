<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <nav>
            <div class="item">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('icons/logo.png') }}" alt="Logo" />
                </a>
            </div>

            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('pedidos.listagem') }}">Listar pedidos</a></li>
                <li><a href="{{ route('pratos.listagem') }}">Listar pratos</a></li>
            </ul>

            <div class="item">
                <img src="https://avatar.iran.liara.run/public" alt="Avatar" />
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>
    </body>
</html>
