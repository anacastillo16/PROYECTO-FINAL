<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.trabajador.header')

    <main class="container my-5">
        <h2 class="mb-4 text-center">Libros disponibles</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($books as $book)
                <div class="col">
                    <div class="card shadow-sm text-center" style="width: 200px; ">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $book->image }}" alt="Portada del libro" class="card-img-top"
                                style="height: 300px; width: 200px; object-fit: cover;">
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h6 class="card-subtitle mb-3 text-muted">
                                {{ $book->autor->name }} {{ $book->autor->lastname }}
                            </h6>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-outline-primary mt-auto">Ver
                                detalles</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </main>
</body>

</html>