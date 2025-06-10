@extends('layouts.base')

@section('title', 'Favoritos')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container mt-4">
        <h2 style="color: #406343;">Mis libros favoritos</h2>

        @if ($favoritos->isEmpty())
            <div class="alert alert-info mt-3" style="background-color: #E6F2E6; color: #2E5D2E; border-color: #C3D9C3;">
                No tienes libros en favoritos.
            </div>
        @else
            <div class="row justify-content-center">
                @foreach ($favoritos as $book)
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card mb-4 shadow-sm" style="width: 200px; border: 1px solid #4C956C; border-radius: 0.5rem;">
                            <a href="{{ route('usuario.books.show', $book->id) }}">
                                <img src="{{ $book->image }}" class="card-img-top" alt="{{ $book->title }}"
                                     style="height: 300px; width: 200px; object-fit: cover; border-bottom: 1px solid #4C956C;">
                            </a>
                            <div class="card-body text-center" style="background-color: #F7FAF5;">
                                <h5 class="card-title" style="color: #406343;">{{ $book->autor->name }} {{ $book->autor->lastname }}</h5>

                                <form method="POST" action="{{ route('favoritos.destroy', $book) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm" style="background-color: #B33A3A; color: #F7FAF5; border: none;">
                                        Quitar de favoritos
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center">
                {{ $favoritos->links() }}
            </div>
        @endif
    </main>
@endsection
