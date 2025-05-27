<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Biblioteca</title>
    @vite(['resources/js/app.js'])
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    @include('layouts.trabajador.header')

    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('index.trabajador') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Buscar por título..." />
                <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                <a href="{{ route('index.trabajador') }}" class="btn btn-primary ms-2">Ver libros</a>
            </form>
            
            @if ($noResults)
                <div class="alert alert-warning text-center mt-3" role="alert">
                    No se encontró ningún libro con ese título.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Libros disponibles</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearLibroModal">
                Crear libro
            </button>
        </div>

        <!-- Modal Crear Libro -->
        <div class="modal fade" id="crearLibroModal" tabindex="-1" aria-labelledby="crearLibroModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearLibroModalLabel">Crear nuevo libro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('books.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" name="isbn" id="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') }}" required />
                                @error('isbn')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required />
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">URL de la portada</label>
                                <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required />
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="autor_id" class="form-label">Autor</label>
                                <select name="autor_id" id="autor_id" class="form-select @error('autor_id') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('autor_id') ? '' : 'selected' }}>Selecciona un autor</option>
                                    @foreach($autores as $autor)
                                    <option value="{{ $autor->id }}" {{ old('autor_id') == $autor->id ? 'selected' : '' }}>
                                        {{ $autor->name }} {{ $autor->lastname }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('autor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Crear libro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
    </main>

    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalEl = document.getElementById('crearLibroModal');
            if (modalEl) {
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    </script>
    @endif
</body>

</html>