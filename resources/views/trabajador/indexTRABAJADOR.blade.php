@extends('layouts.base')

@section('title', 'Biblioteca - Trabajador')

@section('header')
    @include('layouts.trabajador.header')
@endsection

@section('content')
    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('index.trabajador') }}" method="GET" class="d-flex">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Buscar por título..."
                    value="{{ request('search') }}"
                    style="background-color: #f8f9fa; border-color: #ced4da; color: #212529;"
                />
                <button type="submit" class="btn btn-primary ms-2" style="background-color: #0d6efd; border-color: #0d6efd;">
                    Buscar
                </button>
                <a href="{{ route('index.trabajador') }}" class="btn btn-primary ms-2" style="background-color: #0d6efd; border-color: #0d6efd;">
                    Ver libros
                </a>
            </form>

            @if (isset($noResults) && $noResults)
                <div class="alert alert-warning text-center mt-3" role="alert" style="background-color: #fff3cd; color: #664d03; border-color: #ffeeba;">
                    No se encontró ningún libro con ese título.
                </div>
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0" style="color: #0d6efd;">Libros disponibles</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearLibroModal" style="background-color: #198754; border-color: #198754;">
            Crear libro
        </button>
    </div>

    <!-- Modal Crear Libro -->
    <div
        class="modal fade"
        id="crearLibroModal"
        tabindex="-1"
        aria-labelledby="crearLibroModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #ffffff;">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearLibroModalLabel" style="color: #0d6efd;">Crear nuevo libro</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar"
                    ></button>
                </div>
                <div class="modal-body" style="color: #212529;">
                    <form method="POST" action="{{ route('trabajador.books.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="isbn" class="form-label" style="color: #212529;">ISBN</label>
                            <input
                                type="text"
                                name="isbn"
                                id="isbn"
                                class="form-control @error('isbn') is-invalid @enderror"
                                value="{{ old('isbn') }}"
                                required
                                style="background-color: #f8f9fa; border-color: #ced4da; color: #212529;"
                            />
                            @error('isbn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label" style="color: #212529;">Título</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}"
                                required
                                style="background-color: #f8f9fa; border-color: #ced4da; color: #212529;"
                            />
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label" style="color: #212529;">URL de la portada</label>
                            <input
                                type="text"
                                name="image"
                                id="image"
                                class="form-control @error('image') is-invalid @enderror"
                                value="{{ old('image') }}"
                                required
                                style="background-color: #f8f9fa; border-color: #ced4da; color: #212529;"
                            />
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="autor_id" class="form-label" style="color: #212529;">Autor</label>
                            <select
                                name="autor_id"
                                id="autor_id"
                                class="form-select @error('autor_id') is-invalid @enderror"
                                required
                                style="background-color: #f8f9fa; border-color: #ced4da; color: #212529;"
                            >
                                <option value="" disabled {{ old('autor_id') ? '' : 'selected' }}>
                                    Selecciona un autor
                                </option>
                                @foreach ($autores as $autor)
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
                            <label for="description" class="form-label" style="color: #212529;">Descripción</label>
                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="form-control @error('description') is-invalid @enderror"
                                required
                                style="background-color: #f8f9fa; border-color: #ced4da; color: #212529;"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #6c757d; border-color: #6c757d; color: white;">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary" style="background-color: #0d6efd; border-color: #0d6efd;">
                                Crear libro
                            </button>
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
                <div class="card shadow-sm text-center" style="width: 200px; background-color: #ffffff; border-color: #dee2e6;">
                    <div class="d-flex justify-content-center">
                        <img
                            src="{{ $book->image }}"
                            alt="Portada del libro"
                            class="card-img-top"
                            style="height: 300px; width: 200px; object-fit: cover;"
                        />
                    </div>
                    <div class="card-body d-flex flex-column align-items-center" style="color: #212529;">
                        <h6 class="card-subtitle mb-3 text-muted" style="color: #6c757d;">
                            {{ $book->autor->name }} {{ $book->autor->lastname }}
                        </h6>
                        <a href="{{ route('trabajador.books.show', $book->id) }}" class="btn btn-outline-primary mt-auto" style="color: #0d6efd; border-color: #0d6efd;">
                            Ver detalles
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Links de paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
@endsection

@push('scripts')
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modalEl = document.getElementById('crearLibroModal');
                if (modalEl) {
                    var modal = new bootstrap.Modal(modalEl);
                    modal.show();
                }
            });
        </script>
    @endif
@endpush
