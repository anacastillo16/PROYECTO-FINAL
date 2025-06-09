@extends('layouts.base')

@section('title', 'Biblioteca')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <!-- Buscador -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('index.usuario') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control"
                    placeholder="Buscar por título, autor o editorial"
                    style="border-color: #4C956C;" value="{{ request('search') }}" />
                <button type="submit" class="btn" style="background-color: #4C956C; color: #F7FAF5; margin-left: 0.5rem;">Buscar</button>
                <a href="{{ route('index.usuario') }}" class="btn" style="background-color: #406343; color: #F7FAF5; margin-left: 0.5rem;">Ver libros</a>
            </form>

            @if ($noResults)
                <div class="alert alert-warning text-center mt-3" role="alert"
                    style="background-color: #FFF3CD; color: #856404; border-color: #FFEEBA;">
                    No se encontró ningún libro.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0" style="color: #406343;">Libros disponibles</h2>
        </div>

        <!-- Libros -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
            @foreach ($books as $book)
                <div class="col d-flex justify-content-center">
                    <div class="card shadow-sm text-center" style="width: 200px; border-radius: 0.5rem; border: 1px solid #4C956C;">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $book->image }}" alt="{{ $book->title }}" class="card-img-top"
                                style="height: 300px; width: 200px; object-fit: cover; border-bottom: 1px solid #4C956C;" />
                        </div>
                        <div class="card-body d-flex flex-column align-items-center" style="background-color: #F7FAF5;">
                            <h6 class="card-subtitle mb-3 text-muted" style="color: #406343;">
                                {{ $book->autor->name }} {{ $book->autor->lastname }}
                            </h6>
                            <a href="{{ route('usuario.books.show', $book->id) }}"
                                class="btn btn-outline-success mt-auto"
                                style="border-color: #4C956C; color: #4C956C;">
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
@endsection
