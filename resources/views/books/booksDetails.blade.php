<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Libro</title>
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
                            <img src="{{ $book->image }}" alt="Portada del libro" class="img-fluid rounded"
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
                            <div class="mt-4 d-flex gap-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modificarLibroModal">
                                    Modificar libro
                                </button>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de que deseas borrar este libro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                                <a href="{{ route('index.trabajador') }}" class="btn btn-secondary">Volver al
                                    listado</a>
                            </div>



                            <!-- Modal -->
                            <div class="modal fade" id="modificarLibroModal" tabindex="-1"
                                aria-labelledby="crearLibroModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modificarLibroModal">Modificar libro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('books.update', $book->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="isbn" class="form-label">ISBN</label>
                                                    <input type="text" name="isbn" id="isbn" class="form-control"
                                                        value="{{ $book->isbn }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Título</label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                        value="{{ $book->title }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image" class="form-label">URL de la portada</label>
                                                    <input type="text" name="image" id="image" class="form-control"
                                                        value="{{ $book->image }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="autor_id" class="form-label">Autor</label>
                                                    <select name="autor_id" id="autor_id" class="form-select" required>
                                                        @foreach($autores as $autor)
                                                            <option value="{{ $autor->id }}" {{ $book->autor_id == $autor->id ? 'selected' : '' }}>
                                                                {{ $autor->name }} {{ $autor->lastname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="description" class="form-label">Descripción</label>
                                                    <textarea name="description" id="description" rows="5"
                                                        class="form-control"
                                                        required>{{ $book->description }}</textarea>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('books.show', $book->id) }}"
                                                        class="btn btn-outline-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-primary">Guardar
                                                        cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>