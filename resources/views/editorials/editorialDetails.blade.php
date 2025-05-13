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
        <a href="{{ route('editorials.index') }}">Ver editoriales </a>
    </header>
    <main>
        <h2>Detalles de la editorial:  {{ $editorial->name }}</h2>
        <p>{{ $editorial->name }}</p>
        <p>{{ $editorial->address }}</p>

        <a href=" {{ route('editorials.edit', $editorial->id) }}">Modificar</a>
        <form action="{{ route('editorials.destroy', $editorial->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Borrar" class="delete">
        </form>
    </main>
</body>
</html>