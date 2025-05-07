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
    </header>
    <main>
        <h2>Detalles del libro:  {{ $book->title }}</h2>
        <p>{{ $book->ISBN }}</p>
        <p>{{ $book->autor->name }} {{ $book->autor->lastname }}</p>
        <p>{{ $book->description }}</p>
        <img src="{{ $book->image }}" alt="Imagen libro" width="200" height="300">
    </main>
</body>
</html>