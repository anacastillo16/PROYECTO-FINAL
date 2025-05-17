<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    @include('layouts.trabajador.header')
    <main>
        <h2>Autores disponibles</h2>
        <ul>
            @foreach ($autors as $autor)
                <li>
                    <strong>{{ $autor->name }} {{ $autor->lastname }}</strong><br>
                    <a href="{{ route('autors.show', $autor->id) }}">Ver detalles</a>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>