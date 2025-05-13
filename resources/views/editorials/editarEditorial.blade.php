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
    <h2>Crear nuevo editorial</h2>
    <form method="POST" action="{{ route('editorials.update', $editorial->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $editorial->name }}" required><br>

        <label for="address">Dirección:</label>
        <input type="text" name="address" id="address" value="{{ $editorial->address }}" required><br>

        <button type="submit">Modificar</button>
    </form>
</body>
</html>