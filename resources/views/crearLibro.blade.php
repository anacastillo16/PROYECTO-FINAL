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
    </header>
    <h2>Crear nuevo libro</h2>
    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" required><br>

        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="image">URL de la portada:</label>
        <input type="text" name="image" id="image"><br>

        <label for="autor_id">Autor:</label>
        <select name="autor_id" id="autor_id" required>
            @foreach($autores as $autor)
                <option value="{{ $autor->id }}">{{ $autor->name }} {{ $autor->lastname }}</option>
            @endforeach
        </select><br>

        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required></textarea><br>

        <button type="submit">Crear</button>
    </form>
</body>
</html>