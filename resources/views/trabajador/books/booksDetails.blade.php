@extends('layouts.base')

@section('title', 'Detalle Libro - Trabajador')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
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
                                <a href="{{ route('trabajador.autors.show', $book->autor->id) }}" target="_blank">
                                    {{ $book->autor->name }} {{ $book->autor->lastname }}
                                </a>
                            </p>

                            <p class="fw-bold">Descripción:</p>
                            <p>{{ $book->description }}</p>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modificarLibroModal">
                                    Modificar libro
                                </button>

                                <!-- Botón para abrir modal eliminar libro -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteBookModal">
                                    Borrar
                                </button>

                                <a href="{{ route('index.trabajador') }}" class="btn btn-secondary">Ver libros</a>
                            </div>

                            <!-- Modal para modificar libro -->
                            <div class="modal fade" id="modificarLibroModal" tabindex="-1"
                                aria-labelledby="modificarLibroModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modificarLibroModalLabel">Modificar libro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('trabajador.books.update', $book->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="mb-3">
                                                    <label for="isbn" class="form-label">ISBN</label>
                                                    <input type="text" name="isbn" id="isbn"
                                                        class="form-control  @error('isbn') is-invalid @enderror"
                                                        value="{{ old('isbn', $book->isbn) }}" required>
                                                    @error('isbn')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Título</label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                        value="{{ old('title', $book->title) }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image" class="form-label">URL de la portada</label>
                                                    <input type="text" name="image" id="image" class="form-control"
                                                        value="{{ old('image', $book->image) }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="autor_id" class="form-label">Autor</label>
                                                    <select name="autor_id" id="autor_id" class="form-select" required>
                                                        @foreach($autores as $autor)
                                                            <option value="{{ $autor->id }}"
                                                                {{ old('autor_id', $book->autor_id) == $autor->id ? 'selected' : '' }}>
                                                                {{ $autor->name }} {{ $autor->lastname }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <label for="description" class="form-label">Descripción</label>
                                                    <textarea name="description" id="description" rows="5" class="form-control" required>{{ old('description', $book->description) }}</textarea>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ route('trabajador.books.show', $book->id) }}"
                                                        class="btn btn-outline-secondary">Cancelar</a>
                                                    <button type="submit" class="btn btn-primary">Guardar
                                                        cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal de confirmación para borrar libro -->
                            <div class="modal fade" id="confirmDeleteBookModal" tabindex="-1"
                                aria-labelledby="confirmDeleteBookModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteBookModalLabel">¿Estás segura?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            Esta acción eliminará el libro de forma permanente. ¿Deseas continuar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>

                                            <form action="{{ route('trabajador.books.destroy', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Sí, eliminar libro</button>
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
@endsection

@push('scripts')
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalEl = document.getElementById('modificarLibroModal');
            if (modalEl) {
                var modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        });
    </script>
    @endif
@endpush