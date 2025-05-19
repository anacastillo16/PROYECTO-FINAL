<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Libro</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('layouts.trabajador.header')

    <main class="container my-5">
        <h2 class="mb-4 text-center">Detalle del libro</h2>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow p-4">
                    <div class="row g-4">
                        <!-- Imagen del libro -->
                        <div class="col-md-4 text-center">
                            <img src="{{ $book->image }}" alt="Portada del libro"
                                 class="img-fluid rounded"
                                 style="height: 400px; object-fit: cover;">
                        </div>

                        <!-- Detalles del libro -->
                        <div class="col-md-8">
                            <h3 class="mb-3">{{ $book->title }}</h3>

                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>

                            <p>
                                <strong>Autor:</strong>
                                <a href="{{ route('autors.show', $book->autor->id) }}" target="_blank">
                                    {{ $book->autor->name }} {{ $book->autor->lastname }}
                                </a>
                            </p>

                            <p><strong>Descripción:</strong></p>
                            <p>{{ $book->description }}</p>

                            <!-- Botones -->
                            <div class="mt-4 d-flex flex-wrap gap-2">
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">
                                    Modificar
                                </a>

                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                      onsubmit="return confirm('¿Estás seguro de que deseas borrar este libro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
