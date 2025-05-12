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
    <h2>Crear nuevo libro</h2>
    <form method="POST" action="{{ route('autors.update', $autor->id) }}">
        @csrf
        @method('PUT')
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" value="{{ $autor->dni }}" required ><br>

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $autor->name }}" required><br>

        <label for="lastname">Apellidos:</label>
        <input type="text" name="lastname" id="lastname" value="{{ $autor->lastname }}"><br>

        <label for="phone">Teléfono:</label>
        <input type="phone" name="phone" id="lastname" value="{{ $autor->phone }}"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $autor->email }}"><br>

        <label for="editorial_id">Editorial:</label>
        <select name="editorial_id" id="editorial_id" required>
            @foreach($editoriales as $editorial)
                <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
            @endforeach
        </select><br>

        <button type="submit">Modificar</button>
    </form>
</body>
</html>