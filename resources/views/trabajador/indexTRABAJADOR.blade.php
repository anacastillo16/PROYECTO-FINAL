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
                <input type="text" name="search" class="form-control m-2" placeholder="Buscar por título..."
                    value="{{ request('search') }}" />
                <button type="submit" class="button-primary-custom m-2">
                    Buscar
                </button>
                <a href="{{ route('index.trabajador') }}" class="button-primary-custom m-2">
                    Ver libros
                </a>
            </form>

            @if ($noResults)
                <div class="alert-warning-custom text-center m-2" role="alert"
                    style="color:#4A4A4A; background-color:#F7FAF5; padding: 0.5rem; border-radius: 4px;">
                    No se encontró ningún libro con ese título.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">
        <div class="d-flex justify-content-center align-items-center m-4">
            <h2>Libros disponibles</h2>
            <button class="button-primary-custom m-4" data-bs-toggle="modal" data-bs-target="#crearLibroModal">
                Crear libro
            </button>
        </div>

        <!-- Modal Crear Libro -->
        <div class="modal fade" id="crearLibroModal" tabindex="-1" aria-labelledby="crearLibroModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content body-bg">
                    <div class="modal-header">
                        <h5 class="modal-title text-main" id="crearLibroModalLabel">Crear nuevo libro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body text-main">
                        <form method="POST" action="{{ route('trabajador.books.store') }}">
                            @csrf

                            <!-- ISBN -->
                            <div class="mb-3">
                                <label for="isbn" class="form-label" style="color: #4A4A4A;">ISBN</label>
                                <input type="text" name="isbn" id="isbn"
                                    class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') }}"
                                    required style="background-color: #F8F9FA; border-color: #CED4DA; color: #4A4A4A;" />
                                @error('isbn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Título -->
                            <div class="mb-3">
                                <label for="title" class="form-label" style="color: #4A4A4A;">Título</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    required style="background-color: #F8F9FA; border-color: #CED4DA; color: #4A4A4A;" />
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Autor -->
                            <div class="mb-3">
                                <label for="autor_id" class="form-label" style="color: #4A4A4A;">Autor</label>
                                <select name="autor_id" id="autor_id"
                                    class="form-select @error('autor_id') is-invalid @enderror" required
                                    style="background-color: #F8F9FA; border-color: #CED4DA; color: #4A4A4A;">
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

                            <!-- Imagen -->
                            <div class="mb-3">
                                <label for="image" class="form-label" style="color: #4A4A4A;">URL de la portada</label>
                                <input type="text" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}"
                                    required style="background-color: #F8F9FA; border-color: #CED4DA; color: #4A4A4A;" />
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3">
                                <label for="description" class="form-label" style="color: #4A4A4A;">Descripción</label>
                                <textarea name="description" id="description" rows="4"
                                    class="form-control @error('description') is-invalid @enderror" required
                                    style="background-color: #F8F9FA; border-color: #CED4DA; color: #4A4A4A;">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Botones -->
                            <div class="text-end">
                                <button type="button" class="btn button-secondary-custom" data-bs-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn button-primary-custom">
                                    Crear libro
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>

        <!-- Libros -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            @foreach ($books as $book)
                <div class="col">
                    <div class="card shadow-sm text-center"
                        style="width: 200px; background-color: #ffffff; border-color: #dee2e6;">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $book->image }}" 
                                 alt="Portada del libro" 
                                 class="card-img-top"
                                 style="height: 300px; width: 200px; object-fit: cover; border-radius: 8px 8px 0 0;" 
                                 onerror="this.onerror=null;this.src='{{ asset('default-book.png') }}';" />
                        </div>
                        <div class="card-body d-flex flex-column align-items-center text-main">
                            <h6 class="card-subtitle mb-3" style="color: #6c757d;">
                                {{ $book->autor->name }} {{ $book->autor->lastname }}
                            </h6>
                            <a href="{{ route('trabajador.books.show', $book->id) }}"
                                class="btn button-secondary-custom mt-auto">
                                Ver detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    </main>
@push('scripts')
    @if ($errors->any())
        <script>
            window.hasFormErrors = true;
            window.errorModalId = 'crearLibroModal';
        </script>
    @endif
@endpush

@endsection
