@extends('layouts.base')

@section('title', 'Biblioteca')

@section('header')
    <!-- Cabecera pública -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary py-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Título -->
                <a class="navbar-brand text-white fw-bold" href="{{ route('index.public') }}">Biblioteca</a>

                <!-- Botones -->
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Registrarse</a>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')
    <!-- Buscador -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('index.public') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Buscar por título..." />
                    <button type="submit" class="btn btn-primary ms-2">Buscar</button>
                    <a href="{{ route('index.public') }}" class="btn btn-primary ms-2">Ver libros</a>
                </form>
                @if ($noResults)
                    <div class="alert alert-warning text-center mt-3" role="alert">
                        No se encontró ningún libro con ese título.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Libros -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Libros disponibles</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($books as $book)
                <div class="col d-flex justify-content-center">
                    <div class="card shadow-sm text-center" style="width: 200px;">
                        <img src="{{ $book->image }}" alt="Portada del libro" class="card-img-top"
                             style="height: 300px; width: 200px; object-fit: cover;" />
                        <div class="card-body d-flex flex-column align-items-center">
                            <h6 class="card-subtitle mb-3 text-muted">
                                {{ $book->autor->name }} {{ $book->autor->lastname }}
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $books->links() }}
        </div>
    </div>
@endsection