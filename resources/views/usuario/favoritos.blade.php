@extends('layouts.base')

@section('title', 'Favoritos')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container mt-4">
        <h2>Mis libros favoritos</h2>

        @if ($favoritos->isEmpty())
            <div class="alert alert-info mt-3">No tienes libros en favoritos.</div>
        @else
            <div class="row">
                @foreach ($favoritos as $book)
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card mb-4" style="width: 200px;">
                            <a href="{{ route('usuario.books.show', $book->id) }}">
                                <img src="{{ $book->image }}" class="card-img-top" alt="{{ $book->title }}"
                                     style="height: 300px; width: 200px; object-fit: cover;">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text">{{ $book->autor->name }} {{ $book->autor->lastname }}</p>

                                <form method="POST" action="{{ route('favoritos.destroy', $book) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Quitar de favoritos</button>
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
