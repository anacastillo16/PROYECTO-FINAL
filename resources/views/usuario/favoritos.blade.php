@extends('layouts.base')

@section('title', 'Favoritos')

@section('header')
    @include('layouts.usuario.header')
@endsection

@section('content')
    <main class="container mt-4 body-bg">
        <div class="d-flex justify-content-center align-items-center m-4">
            <h2>Mis libros favoritos</h2>
        </div>
        

        @if ($favoritos->isEmpty())
            <div class="alert alert-info mt-3" style="background-color: #E6F2E6; color: #2E5D2E; border-color: #C3D9C3;">
                No tienes libros en favoritos.
            </div>
        @else
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @foreach ($favoritos as $book)
                    <div class="col d-flex justify-content-center">
                        <div class="card mb-4 shadow-sm" style="width: 200px;">
                            <a href="{{ route('usuario.books.show', $book->id) }}">
                                <img src="{{ $book->image }}" 
                                     alt="Portada del libro" 
                                     class="card-img-top"
                                     style="height: 300px; width: 200px; object-fit: cover; border-radius: 8px 8px 0 0;" 
                                     onerror="this.onerror=null;this.src='{{ asset('default-book.png') }}';" />
                            </a>
                            <div class="card-body text-center" style="background-color: #F7FAF5;">
                                <h5 class="card-title text-main">{{ $book->autor->name }} {{ $book->autor->lastname }}</h5>

                                <form method="POST" action="{{ route('favoritos.destroy', $book) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button-primary-custom btn-sm" type="submit" style="width: 100%;">
                                        Quitar de favoritos
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-4">
                {{ $favoritos->links() }}
            </div>
        @endif
    </main>
@endsection
