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
                <input type="text" name="search" class="form-control m-2"
                    placeholder="Buscar por título, autor o editorial"
                    style="border-color: #6CBF84;" value="{{ request('search') }}" />
                <button type="submit" class="button-primary-custom m-2">Buscar</button>
                <a href="{{ route('index.usuario') }}" class="button-primary-custom m-2">Ver libros</a>
            </form>

            @if ($noResults)
                <div class="alert-warning-custom text-center m-2" role="alert" style="color:#4A4A4A; background-color:#F7FAF5; padding: 0.5rem; border-radius: 4px;">
                        No se encontró ningún libro.
                </div>
            @endif
        </div>
    </div>

    <main class="container my-5">
        <div class="d-flex justify-content-center align-items-center m-4">
            <h2>Libros disponibles</h2>
        </div>

        <!-- Libros -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
            @foreach ($books as $book)
                <div class="col d-flex justify-content-center">
                    <div class="card shadow-sm text-center" style="width: 200px;">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $book->image }}" alt="{{ $book->title }}" class="card-img-top"
                                style="height: 300px; width: 200px; object-fit: cover;"/>
                        </div>
                        <div class="card-body d-flex flex-column align-items-center" style="background-color: #F7FAF5;">
                            <h6 class="card-subtitle mb-3 text-muted" style="color: #406343;">
                                {{ $book->autor->name }} {{ $book->autor->lastname }}
                            </h6>
                            <a href="{{ route('usuario.books.show', $book->id) }}"
                                class="button-secondary-custom">
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
