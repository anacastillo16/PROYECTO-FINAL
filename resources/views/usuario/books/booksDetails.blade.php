@extends('layouts.base')

@section('title', 'Detalle Libro')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container my-5" style="background-color: #f8f9fa;">
        <h2 class="mb-4 text-center" style="color: #0d6efd;">Detalle del libro</h2>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow p-4" style="background-color: #ffffff; border-color: #dee2e6;">
                    <div class="row g-4">
                        <!-- Imagen del libro -->
                        <div class="col-md-4 text-center">
                            <img src="{{ $book->image }}" alt="Portada del libro" class="img-fluid rounded"
                                style="height: 400px; object-fit: cover;">
                        </div>

                        <!-- Detalles del libro -->
                        <div class="col-md-8" style="color: #212529;">
                            <h3 class="mb-3" style="color: #0d6efd;">{{ $book->title }}</h3>

                            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>

                            <p>
                                <strong>Autor:</strong>
                                <a href="{{ route('usuario.autors.show', $book->autor->id) }}" target="_blank" style="color: #0d6efd;">
                                    {{ $book->autor->name }} {{ $book->autor->lastname }}
                                </a>
                            </p>

                            <p class="fw-bold">Descripción:</p>
                            <p>{{ $book->description }}</p>

                            <!-- Botones -->
                            <div class="mt-4 d-flex gap-2 align-items-start">
                                <a href="{{ route('index.usuario') }}" class="btn btn-secondary" 
                                   style="background-color: #6c757d; border-color: #6c757d; color: #ffffff;">
                                   Ver libros
                                </a>

                                @auth
                                    @if(auth()->user()->favoriteBooks->contains($book->id))
                                        <form action="{{ route('favoritos.destroy', $book) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning" 
                                                    style="background-color: #ffc107; border-color: #ffc107; color: #212529;">
                                                ★ Quitar de favoritos
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('favoritos.store', $book) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-outline-warning" 
                                                    style="color: #ffc107; border-color: #ffc107;">
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
    </main>
@endsection
