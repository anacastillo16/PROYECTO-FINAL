<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    @vite(['resources/js/app.js'])
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    @include('layouts.usuario.header')
    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('index.usuario') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Buscar por título, autor o editorial" />
                <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                <a href="{{ route('index.usuario') }}" class="btn btn-primary ms-2">Ver libros</a>
            </form>
            
            @if ($noResults)
                <div class="alert alert-warning text-center mt-3" role="alert">
                    No se encontró ningún libro.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Libros disponibles</h2>
        </div>

        <!-- Libros -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($books as $book)
            <div class="col">
                <div class="card shadow-sm text-center" style="width: 200px;">
                    <div class="d-flex justify-content-center">
                        <img src="{{ $book->image }}" alt="Portada del libro" class="card-img-top" style="height: 300px; width: 200px; object-fit: cover;" />
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <h6 class="card-subtitle mb-3 text-muted">{{ $book->autor->name }} {{ $book->autor->lastname }}</h6>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-outline-primary mt-auto">Ver detalles</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Links de paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    </main>
</body>
</html>