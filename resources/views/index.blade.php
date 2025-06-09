@extends('layouts.base')

@section('title', 'Biblioteca')

@section('header')
    <!-- Cabecera pública -->
    <header>
        <nav class="navbar navbar-expand-lg py-4 body-bg" style="box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <!-- Título -->
                <a href="{{ route('index.public') }}" class="navbar-brand fw-bold text-main" style="font-size: 1.5rem; text-decoration: none;">
                    Biblioteca
                </a>

                <!-- Botones -->
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="button-secondary-custom btn-sm" style="padding: 0.3rem 0.75rem; font-size: 0.9rem;">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}" class="button-secondary-custom btn-sm" style="padding: 0.3rem 0.75rem; font-size: 0.9rem;">
                        Registrarse
                    </a>
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
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por título..." 
                        class="form-control input-custom" />
                    <button type="submit" class="button-primary-custom ms-2">
                        Buscar
                    </button>
                    <a href="{{ route('index.public') }}" class="button-primary-custom ms-2">
                        Ver libros
                    </a>
                </form>

                @if ($noResults)
                    <div class="alert-warning-custom text-center mt-3" role="alert">
                        No se encontró ningún libro con ese título.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Libros -->
    <div class="container my-5 body-bg text-main">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0" style="color: #4A4A4A;">Libros disponibles</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach ($books as $book)
                <div class="col d-flex justify-content-center">
                    <div class="card shadow-sm text-center" style="width: 200px; border-radius: 8px; background-color: #F7FAF5;">
                        <img src="{{ $book->image }}" alt="Portada del libro" class="card-img-top"
                             style="height: 300px; width: 200px; object-fit: cover; border-radius: 8px 8px 0 0;" />
                        <div class="card-body d-flex flex-column align-items-center">
                            <h6 class="card-subtitle mb-3" style="color: #6CBF84; font-weight: 600;">
                                {{ $book->autor->name }} {{ $book->autor->lastname }}
                            </h6>
                            <p class="card-title text-main fw-bold" style="font-size: 1rem;">
                                {{ $book->title }}
                            </p>
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
