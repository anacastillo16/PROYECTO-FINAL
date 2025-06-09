@extends('layouts.base')

@section('title', 'Detalle Libro')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container my-5 body-bg p-4 rounded" style="min-height: 80vh;">
        <h2 class="mb-4 text-center text-main fw-bold">Detalle del libro</h2>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow" style="background-color: #F7FAF5;">
                    <div class="row g-4 p-4">
                        <!-- Imagen del libro -->
                        <div class="col-md-4 text-center">
                            <img src="{{ $book->image }}" alt="Portada del libro" class="img-fluid rounded"
                                style="height: 400px; object-fit: cover; ">
                        </div>

                        <!-- Detalles del libro -->
                        <div class="col-md-8 text-main">
                            <h3 class="mb-3 fw-bold" style="color: #406343;">{{ $book->title }}</h3>

                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>

                            <p>
                                <strong>Autor:</strong>
                                <a href="{{ route('usuario.autors.show', $book->autor->id) }}" target="_blank" class="link-custom">
                                    {{ $book->autor->name }} {{ $book->autor->lastname }}
                                </a>
                            </p>

                            <p class="fw-bold">Descripción:</p>
                            <p>{{ $book->description }}</p>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2 align-items-start">
                                <a href="{{ route('index.usuario') }}" class="button-secondary-custom">
                                    Ver libros
                                </a>

                                @auth
                                    @if(auth()->user()->favoriteBooks->contains($book->id))
                                        <form action="{{ route('favoritos.destroy', $book) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="button-secondary-custom">
                                                ★ Quitar de favoritos
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('favoritos.store', $book) }}" method="POST">
                                            @csrf
                                            <button class="button-secondary-custom">
                                                ☆ Añadir a favoritos
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Añadir reseñas -->
    </main>
@endsection
