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
        <h2>Libros</h2>
        <ul>
            @foreach($books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
        
    </main>
</body>
</html>