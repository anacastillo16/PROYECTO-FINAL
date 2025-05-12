<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <header>
        <h1>Biblioteca</h1>
        <a href="{{ route('index.trabajador') }}">Index</a>
        <a href="{{ route('autors.index') }}">Ver autores </a>
    </header>
    <main>
        <h2>Detalles del autor:  {{ $autor->name }}</h2>
        <p>{{ $autor->dni }}</p>
        <p>{{ $autor->name }}</p>
        <p>{{ $autor->lastname }}</p>
        <p>{{ $autor->phone }}</p>
        <p>{{ $autor->email }}</p>
        <p>{{ $autor->editorial->name }}</p>

        <a href=" {{ route('autors.edit', $autor->id) }}">Modificar</a>
        <form action="{{ route('autors.destroy', $autor->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Borrar" class="delete">
        </form>
    </main>
</body>
</html>