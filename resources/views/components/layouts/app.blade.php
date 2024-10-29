<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <x-ui.navbar />

    <main>
        {{ $slot }}
    </main>
</body>

</html>