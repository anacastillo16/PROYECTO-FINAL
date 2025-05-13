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
        <a href="{{ route('index.trabajador') }}">Index</a> 
        <a href="{{ route('editorials.create') }}">Crear editorial </a>       
        <h2>Bienvenido {{ Auth::user()->name }}</h2>
    </header>
    <main>
        <h2>Editoriales disponibles</h2>
        <ul>
            @foreach ($editorials as $editorial)
                <li>
                    <strong>{{ $editorial->name }} </strong><br>
                    <a href="{{ route('editorials.show', $editorial->id) }}">Ver detalles</a>
                </li>
            @endforeach
        </ul>
    </main>
</body>
</html>