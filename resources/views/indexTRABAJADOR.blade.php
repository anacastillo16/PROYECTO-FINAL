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
        <h3>Index Trabajador</h3>
        <h2>Bienvenido {{ Auth::user()->name }}</h2>
        <a href="{{ route('books.create') }}">Crear libro </a>
        <a href="{{ route('autors.index') }}">Ver autores </a>
        <a href="{{ route('editorials.index') }}">Ver editoriales </a>
    </header>
    <main>
        <h2>Libros disponibles</h2>
        <ul>
            @foreach ($books as $book)
                <li>
                    <strong>{{ $book->title }}</strong> - {{ $book->autor->name }} {{ $book->autor->lastname }} <br>
                    <a href="{{ route('books.show', $book->id) }}">Ver detalles</a>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>